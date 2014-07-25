<?php

namespace Sites\Zoo\BaseBundle\Controller;

use Sites\Admin\Common\StaticPageManagerBundle\Entity\StaticPage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $page = new StaticPage();
        $page->setFavicon("/img/favicons/icon.png");
        $page->setTitle("Un titre");
        $page->setKeywords("Lorem, ipsum, dolor, sit, amet, consectetur, adipiscing, elit, Ut, quis");
        $page->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada mi accumsan, porttitor nulla a, tempor arcu. Suspendisse consequat eros rhoncus ullamcorper laoreet. Duis sagittis augue a facilisis dignissim. Vestibulum suscipit augue felis, ut accumsan nunc hendrerit eu.");
        return $this->render('ZooBaseBundle:Default:index.html.twig', ["page"=>$page]);
    }
}
