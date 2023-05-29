<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use App\Manager\UserManager;
use App\Manager\RedirectionManager;
use App\Form\UserRegistrationType;
use App\Entity\Club;


use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class UserController  extends AbstractController{
    #[Route("/registro", name:"registro")]
    public function createUser(
        EntityManagerInterface $doctrine,
        Request $request,
        UserPasswordHasherInterface $hasher,
        UserManager $manager,
        RedirectionManager $redirector)
    {
        $form = $this->createForm(UserRegistrationType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            
            $clubCif = $form->get('cif')->getData();
            $clubName = $form->get('name')->getData();

            $password = $hasher->hashPassword($user,$user->getPassword());
            $user->setPassword($password);

            $newFilename = $this->uploadEmblem($form);

            $doctrine->flush();
            $newCLub = new Club($clubCif,$clubName);
            $newCLub->setEmblem($newFilename);
           
            $user->setClub($newCLub);
            $doctrine->persist($user);
            $doctrine->persist($newCLub);
            $doctrine->flush();
            $manager->sendEmail($user, "Texto hardcodeado");
            return $this->render("clubs/club.html.twig", ['club'=>$newCLub]);
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
                
                $newFilename = $form->get('name')->getData().'.'.$emblemFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $targetDir = 'specific/'.$form->get('name')->getData()."/branding";
                    if ( !is_dir($targetDir )) {
                        mkdir('specific/'.$form->get('name')->getData()."/branding", 0700, true);       
                    }
                    $emblemFile->move(
                        $targetDir,
                        $newFilename
                    );
                    return $targetDir;
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
            }
    }
}
?>