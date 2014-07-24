<?php

namespace Sites\Admin\Common\StaticPageManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdminCommonStaticPageManagerBundle:Default:index.html.twig');
    }
}
