<?php

namespace App\Controller;
use App\Repository\CommentRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class CommentAdminController extends AbstractController
{
    /**
     * @Route("/comment/admin", name="comment_admin")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index( Request $request )
    {
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
        return new Response('Comment');
    }
}
