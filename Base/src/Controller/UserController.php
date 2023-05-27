<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use App\Manager\UserManager;
use App\Form\UserRegistrationType;
use App\Entity\Club;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;


class UserController  extends AbstractController{
    #[Route("/registro", name:"registro")]
    public function createUser(
        EntityManagerInterface $doctrine,
        Request $request,
        UserPasswordHasherInterface $hasher,
        UserManager $manager)
    {
        $form = $this->createForm(UserRegistrationType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();

            $password = $hasher->hashPassword($user,$user->getPassword());
            $user->setPassword($password);


            $newFilename = $this->uploadEmblem($form);

            $doctrine->persist($user);

            
            // $mailer = new MailerController();
            // $mailer.sendMail();
            $doctrine->flush();
            $newCLub = new Club($newFilename,$form->get('name')->getData(),$user->getPhone());
            $manager->sendEmail($user, "Texto hardcodeado");//, $newCLub->getName());
            //$doctrine->persist($newCLub);
        }

        return $this->render("security/registration.html.twig", ['registrationForm'=>$form]);
    }


    #[Route("/user", name:"user")]
    public function goToUserPage(
        EntityManagerInterface $doctrine)
    {
        // $categoriesRepo = $doctrine->getRepository(Category::class);
        // $allCategories = $categoriesRepo->findAll();
        return $this->render("security/user.html.twig");//, ['registrationForm'=>$form]);
    }

    function uploadEmblem($form){
        $emblemFile = $form->get('emblem')->getData();

            // this condition is needed because the 'emblem' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($emblemFile) {
                //$originalFilename = pathinfo($emblemFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                
                $newFilename = uniqid().'.'.$emblemFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $targetDir = 'specific/'.$form->get('name')->getData()."/emblem";
                    if ( !is_dir($targetDir )) {
                        mkdir('specific/'.$form->get('name')->getData()."/emblem", 0700, true);       
                    }
                    $emblemFile->move(
                        $targetDir,
                        $newFilename
                    );
                    return $newFilename;
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
            }
    }
}
?>