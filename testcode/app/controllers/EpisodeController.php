<?php
declare(strict_types=1);
use Phalcon\Mvc\Router;

class EpisodeController extends ControllerBase
{

    public function indexAction(){
        $this->view->setMainView("api");
        $this->view->disable();
        $api=new Api('https://rickandmortyapi.com/api/','episode');
        echo $api->allPage();
//        $this->view->setVar('response', $response);
    }

    /**
     *
     * @Route("/episode/search/{name}", name="character_searchName")
     * @param $name
     * @param $response
     */
    public function searchAction($name){
        $this->view->disable();
//        if($this->request->isPost()) {
            if(isset($_POST['word'])) $name=$_POST['word'];
//            $dataSent=$this->request->getPost();
//            $name=$dataSent['name'];
//        echo $name;
            if($name){
                $api=new Api('https://rickandmortyapi.com/api/','episode');
                $data=$api->search($name,"name");
            }
            else{
                $api=new Api('https://rickandmortyapi.com/api/','episode');
                echo $api->allPage();
            }
//        for(element=0;element<arrays.length-1;element++){
//            if(arrays[element].substr(0,Pais.length).toLowerCase() == Pais){
//      (strpos(strtolower( $res2["$i"]["3"]), strtolower($texto)) !== false)
//        for($i=0;$i<count($data);$i++){
        foreach ($data as $item){
            if (!(is_numeric($item)))  $new_data[]=$item;
//            if(substr(strtolower($data[$i]),0,strlen($name))===$name){
//                $data[0].=substr($data[$i],0,strlen($name)).substr($data[$i],strlen($name)).",";
//            }
        }
        if(empty($data)) $new_data=$data;
//        var_dump($new_data);
       $response["results"]=$new_data;
        echo json_encode($response);
    }
}


