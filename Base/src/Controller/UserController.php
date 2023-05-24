<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use App\Form\UserRegistrationType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController  extends AbstractController{
    #[Route("/registro", name:"registro")]
    public function createUser(
        EntityManagerInterface $doctrine,
        Request $request, UserPasswordHasherInterface $hasher)
    {
        $form = $this->createForm(UserRegistrationType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();

            $password = $hasher->hashPassword($user,$user->getPassword());
            $user->setPassword($password);
            $doctrine->persist($user);
            $doctrine->flush();
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
}?>