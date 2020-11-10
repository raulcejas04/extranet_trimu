<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use Psr\Log\LoggerInterface; 

//class AccountController extends AbstractController
class AccountController extends BaseController
{
    /**
     * @Route("/account", name="account")
     * @IsGranted("ROLE_USER")
     */
    public function index(LoggerInterface $logger)
    {
        $logger->debug('Checking account page for '.$this->getUser()->getEmail());
        //dd($this->getUser()->getEmail());

        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }
}
