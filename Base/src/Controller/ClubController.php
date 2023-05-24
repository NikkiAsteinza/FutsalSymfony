<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Category;

class ClubController  extends AbstractController{
    // #[Route("/", name:"home")]
    // public function home(EntityManagerInterface $doctrine)
    // {
    //     $categoriesRepo = $doctrine->getRepository(Category::class);
    //     $allCategories = $categoriesRepo->findAll();
    //     return $this->render(
    //         "home.html.twig",
    //         ["allCategories"=> $allCategories]
    //     );
    // }
}?>