<?php 

namespace App\Manager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\RedirectController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectionManager extends RedirectController
{
    public function myRedirectAction(Request $request, string $targetPage)
    {
        return $this->redirectAction($request, $targetPage);
    }
}