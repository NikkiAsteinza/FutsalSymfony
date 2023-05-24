<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Category;

class FutsalController  extends AbstractController{
    #[Route("/", name:"home")]
    public function home(EntityManagerInterface $doctrine)
    {
        $categoriesRepo = $doctrine->getRepository(Category::class);
        $allCategories = $categoriesRepo->findAll();
        return $this->render(
            "home.html.twig",
            ["allCategories"=> $allCategories]
        );
    }


    // #[Route("/insert/genders")]
    // public function insertGenders(EntityManagerInterface $doctrine)
    // {
    //     $femenino = new Genders("Femenino");
    //     $masculino = new Genders("Masculino");

    //     $doctrine->persist($femenino);
    //     $doctrine->persist($masculino);
    //     $doctrine->flush();

    //     return new Response("Géneros insertadas correctamente");
    // }
}?>