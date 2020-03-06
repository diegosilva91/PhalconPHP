<?php
declare(strict_types=1);
use App\Forms\SearchForm;
use Phalcon\Mvc\Router;


class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->view->setTemplateAfter('main');
        $this->view->form=new SearchForm();
    }
    public function indexAction(){
        $this->view->setTemplateAfter('index');
        $this->view->setMainView("index");
        $activeItem="";
        $this->view->activeItem = $activeItem;

        if($this->request->isPost()){
            $dataSent=$this->request->getPost();
        }
        $name=$dataSent['name'];
        if($name){
//            var_dump($name);
//            $this->view->disable();
        }
//        $url = new Url();
//        echo $this->url->getBaseUri();
//        echo $url->getBaseUri();
    }
    public function episodeAction(){
        $activeItem="episode";
        $this->view->activeItem = $activeItem;
        $this->view->setMainView("main");
//        $this->view->disable();
//        echo "episode";
    }
    public function characterAction(){
        $this->view->setMainView("main");
        $activeItem="character";
        $this->view->activeItem = $activeItem;
    }
    public function locationAction(){
        $this->view->setMainView("main");
        $activeItem="location";
        $this->view->activeItem = $activeItem;
    }

}

