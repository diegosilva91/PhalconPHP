<?php
declare(strict_types=1);
require_once '../../vendor/autoload.php';
use Phalcon\Http\Client\Request;
use Phalcon\Mvc\Router;
//use GuzzleHttp\Client;
//use GuzzleHttp\Psr7\Request;
//use GuzzleHttp\Psr7\Response;

class Api{

    public $url;
    public $type;
    public $response;
    private $provider;
    public function __construct($url,$type){
        $this->url=$url;
        $this->type=$type;
        // get available provider Curl or Stream
        $provider = Request::getProvider();
        $provider->setBaseUri($this->url);
        $provider->header->set('Accept', 'application/json');
        $this->provider=$provider;
//        $client = new \GuzzleHttp\Client();
//        $response = $client->request('GET', 'https://rickandmortyapi.com/api/character');
    }
    /**
     * Get a specific pages from the API
     *
     * @param $page
     * @return $this->response
     */
    public function getPage($page){
        $response =$this->provider->get(
            $this->type,
            [
                'page' => $page,
            ]
        );
        $this->response=$response->body;
        return $this->response;
    }
    /**
     * Get all pages from the API
     *
     * @return $this->response
     */
    public function allPage(){
        $response =$this->provider->get(
            $this->type);
        $this->response=$response->body;
        return $this->response;
    }
    /**
     * Get page or pages from the API
     *
     * @param $pages
     * @return $this->response
     */
    public function getPages($pages){
//        $page="";
//        for ($i=1;$i<=20;$i++) {
//            $page.=$i.",";
//        }
        $response =$this->provider->get(
            'character/'.$pages
        );
        $this->response=$response->body;
        return $this->response;
//        return $pages;
    }

    /**
     *
     *
     */
    private function convert(){
//        var_dump(json_decode($this->response));//FOR DATABASE
        $response=json_decode($this->response)->results;
//        var_dump($response);
        foreach ($response as $item){
//            var_dump($item);
//            $item=>episode;
//            var_dump($item->characters);
//            echo "<br>character".$item->id."<br>";
//            foreach ($item->characters as $characters){
//                echo $characters."\n";
//            }
        }
    }

}
