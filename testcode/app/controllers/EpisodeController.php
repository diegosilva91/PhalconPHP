<?php
declare(strict_types=1);
use Phalcon\Mvc\Router;

require '../../vendor/autoload.php';

class EpisodeController extends \Phalcon\Mvc\Controller
{

    public function indexAction(){
        $this->view->setMainView("api");
        $this->view->disable();
        $api=new Api('https://rickandmortyapi.com/api/','episode');
        echo $api->allPage();
//        $this->view->setVar('response', $response);
    }

}

