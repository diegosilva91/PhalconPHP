<?php
declare(strict_types=1);

use Phalcon\Mvc\Router;
class CharacterController extends ControllerBase
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
     * @Route("/character/showID/{id}", name="character_id")
     * @param $id
     */
    public function showIDAction($id){
        $api=new Api('https://rickandmortyapi.com/api/','character');
        echo $api->getPage($id);
        $this->view->setMainView("api");
        $this->view->disable();
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

