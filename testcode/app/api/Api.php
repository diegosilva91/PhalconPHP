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
     * Convert content to object
     *
     * @param
     * @return
     */
    private function convert($word,$where){
        $array=[];
        $key=[];
//        var_dump(json_decode($this->response));//FOR DATABASE
        $response=json_decode($this->allPage())->results;
//        var_dump($response);
        return $response;
    }

    /**
     * Return data to search
     *
     * @param $word
     * @param $where
     * @return mixed $data
     */
    public function search($word,$where){
        $data=$this->convert($word,$where);
        $i =0;
        $j=0;
        $column=[];
        $column[0]="";
        $datas=[];
        foreach ($data as $item){
//            var_dump($item);
            $array=(array)$item;
//            var_dump($array);
            foreach ($array as $key =>$value){
//                echo $key.'='.$value.'<br>';
//                var_dump(key($array));
                if(key($array)==$where){
                    $column[$i]=array_push($column,$value);
//                    $column[0].=$value.',';
                    $column[$i+1]=$value;
//                    echo "$word= $value";
//                    if(substr(strtolower($array[$i]),0,strlen($word))===$word){
////                            $column[$i]=substr($data[$i],0,strlen($name)).substr($data[$i],strlen($name)).",";
//                        $column[$j]=$array;
//                        $j++;
//                    }
//                    if(substr(strtolower($value),0,strlen($word))==$word){
                    if(strpos(strtolower( $value), strtolower($word)) !== false){
//                        $column[0].=$value.', ';
//                        var_dump($value);
//                        var_dump($i);
                         $datas[]=array_push($datas,$array);
//                        var_dump($array);
                    }
                    $j++;
                }
                next($array);
            }
            $i++;
        }
        return $datas;
    }
}
