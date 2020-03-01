<?php
declare(strict_types=1);

use Phalcon\Mvc\Router;
use Phalcon\Mvc\Model\Criteria;
class CharacterController extends \Phalcon\Mvc\Controller
{
    /**
     * @Route("/character", name="character_list")
     */
    public function indexAction(){

        $api=new Api('https://rickandmortyapi.com/api/','character');
//        echo $api->getAll();
//        var_dump($api->AllPage());
        echo $api->allPage();
        $this->view->setMainView("api");
        $this->view->disable();
//        echo $api->getPage(2);
    }

    /**
     *
     * @Route("/character/{id}", name="character_id")
     * @param $id
     */
    public function showIDAction($id){
        $api=new Api('https://rickandmortyapi.com/api/','character');
        echo $api->getPage($id);
        $this->view->setMainView("api");
        $this->view->disable();
    }

}

