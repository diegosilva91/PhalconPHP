<?php
declare(strict_types=1);


require_once '../../vendor/autoload.php';
use Phalcon\Http\Client\Request;
//use Phalcon\Mvc\User\Component;

//use GuzzleHttp\Client;
//use GuzzleHttp\Psr7\Request;
//use GuzzleHttp\Psr7\Response;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
// get available provider Curl or Stream
        $provider = Request::getProvider();
        $provider->setBaseUri('https://rickandmortyapi.com/api/character');
        $provider->header->set('Accept', 'application/json');
        $response = $provider->get('');

//        $client = new \GuzzleHttp\Client();
//        $response = $client->request('GET', 'https://rickandmortyapi.com/api/character');

        $this->view->setVar('response', $response);
    }

}

