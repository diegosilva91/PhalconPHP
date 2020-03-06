<?php
declare(strict_types=1);

use Phalcon\Mvc\Router;
use Phalcon\Mvc\Model\Criteria;
class LocationController extends ControllerBase{
    public function indexAction(){
        $this->view->setMainView("api");
        $this->view->disable();
        $api=new Api('https://rickandmortyapi.com/api/','location');
        echo $api->allPage();
//        $this->view->setVar('response', $response);
    }
    /**
     *
     * @Route("/location/search/{name}", name="character_searchName")
     * @param $name
     * @param $response
     */
    public function searchAction($name){
        $this->view->disable();
        if(isset($_POST['word'])) $name=$_POST['word'];
        if($name){
            $api=new Api('https://rickandmortyapi.com/api/','location');
            $data=$api->search($name,"name");
        }
        else{
            $api=new Api('https://rickandmortyapi.com/api/','location');
            echo $api->allPage();
        }
        foreach ($data as $item){
            if (!(is_numeric($item)))  $new_data[]=$item;
        }
        if(empty($data)) $new_data=$data;
        $response["results"]=$new_data;
        echo json_encode($response);
    }
}