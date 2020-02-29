<?php
declare(strict_types=1);

 

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class CharactersController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        //
    }

    /**
     * Searches for characters
     */
    public function searchAction()
    {
        $numberPage = $this->request->getQuery('page', 'int', 1);
        $parameters = Criteria::fromInput($this->di, 'Characters', $_GET)->getParams();
        $parameters['order'] = "id";

        $characters = Characters::find($parameters);
        if (count($characters) == 0) {
            $this->flash->notice("The search did not find any characters");

            $this->dispatcher->forward([
                "controller" => "characters",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $characters,
            'limit'=> 10,
            'page' => $numberPage,
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        //
    }

    /**
     * Edits a character
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {
            $character = Characters::findFirstByid($id);
            if (!$character) {
                $this->flash->error("character was not found");

                $this->dispatcher->forward([
                    'controller' => "characters",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $character->id;

            $this->tag->setDefault("id", $character->id);
            $this->tag->setDefault("name", $character->name);
            $this->tag->setDefault("status", $character->status);
            $this->tag->setDefault("species", $character->species);
            $this->tag->setDefault("type", $character->type);
            $this->tag->setDefault("gender", $character->gender);
            $this->tag->setDefault("origin", $character->origin);
            $this->tag->setDefault("location", $character->location);
            $this->tag->setDefault("image_url", $character->image_url);
            $this->tag->setDefault("url", $character->url);
            $this->tag->setDefault("created", $character->created);
            
        }
    }

    /**
     * Creates a new character
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "characters",
                'action' => 'index'
            ]);

            return;
        }

        $character = new Characters();
        $character->name = $this->request->getPost("name", "int");
        $character->status = $this->request->getPost("status", "int");
        $character->species = $this->request->getPost("species", "int");
        $character->type = $this->request->getPost("type", "int");
        $character->gender = $this->request->getPost("gender", "int");
        $character->origin = $this->request->getPost("origin", "int");
        $character->location = $this->request->getPost("location", "int");
        $character->imageUrl = $this->request->getPost("image_url", "int");
        $character->url = $this->request->getPost("url", "int");
        $character->created = $this->request->getPost("created", "int");
        

        if (!$character->save()) {
            foreach ($character->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "characters",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("character was created successfully");

        $this->dispatcher->forward([
            'controller' => "characters",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a character edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "characters",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $character = Characters::findFirstByid($id);

        if (!$character) {
            $this->flash->error("character does not exist " . $id);

            $this->dispatcher->forward([
                'controller' => "characters",
                'action' => 'index'
            ]);

            return;
        }

        $character->name = $this->request->getPost("name", "int");
        $character->status = $this->request->getPost("status", "int");
        $character->species = $this->request->getPost("species", "int");
        $character->type = $this->request->getPost("type", "int");
        $character->gender = $this->request->getPost("gender", "int");
        $character->origin = $this->request->getPost("origin", "int");
        $character->location = $this->request->getPost("location", "int");
        $character->imageUrl = $this->request->getPost("image_url", "int");
        $character->url = $this->request->getPost("url", "int");
        $character->created = $this->request->getPost("created", "int");
        

        if (!$character->save()) {

            foreach ($character->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "characters",
                'action' => 'edit',
                'params' => [$character->id]
            ]);

            return;
        }

        $this->flash->success("character was updated successfully");

        $this->dispatcher->forward([
            'controller' => "characters",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a character
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $character = Characters::findFirstByid($id);
        if (!$character) {
            $this->flash->error("character was not found");

            $this->dispatcher->forward([
                'controller' => "characters",
                'action' => 'index'
            ]);

            return;
        }

        if (!$character->delete()) {

            foreach ($character->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "characters",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("character was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "characters",
            'action' => "index"
        ]);
    }
}
