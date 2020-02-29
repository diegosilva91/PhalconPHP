<?php
declare(strict_types=1);

require_once '../../vendor/autoload.php';
use Phalcon\Http\Client\Request;
use Phalcon\Mvc\Router;
//use GuzzleHttp\Client;
//use GuzzleHttp\Psr7\Request;
//use GuzzleHttp\Psr7\Response;

class ListController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->disable();
// get available provider Curl or Stream
        $provider = Request::getProvider();
        $provider->setBaseUri('https://rickandmortyapi.com/api/episode');
        $provider->header->set('Accept', 'application/json');
        $response = $provider->get('');
//        $client = new \GuzzleHttp\Client();
//        $response = $client->request('GET', 'https://rickandmortyapi.com/api/character');

//        var_dump(json_decode($response->body));FOR DATABASE

        echo $response->body;
        $response=json_decode($response->body)->results;
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

//        $this->view->setVar('response', $response);





}

}

