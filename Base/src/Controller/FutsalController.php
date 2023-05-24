<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class FutsalController  extends AbstractController{
    #[Route("/", name:"home")]
    public function home()
    {
        return $this->render(
            "home.html.twig"
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