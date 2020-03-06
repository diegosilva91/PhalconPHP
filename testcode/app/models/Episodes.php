<?php

namespace App\Models;
use Phalcon\Mvc\Model\Criteria;

class Episodes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $air_date;

    /**
     *
     * @var string
     */
    protected $episode;

    /**
     *
     * @var integer
     */
    protected $id_characters;

    /**
     *
     * @var string
     */
    protected $url;

    /**
     *
     * @var string
     */
    protected $created;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field air_date
     *
     * @param string $air_date
     * @return $this
     */
    public function setAirDate($air_date)
    {
        $this->air_date = $air_date;

        return $this;
    }

    /**
     * Method to set the value of field episode
     *
     * @param string $episode
     * @return $this
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Method to set the value of field id_characters
     *
     * @param integer $id_characters
     * @return $this
     */
    public function setIdCharacters($id_characters)
    {
        $this->id_characters = $id_characters;

        return $this;
    }

    /**
     * Method to set the value of field url
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Method to set the value of field created
     *
     * @param string $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field air_date
     *
     * @return string
     */
    public function getAirDate()
    {
        return $this->air_date;
    }

    /**
     * Returns the value of field episode
     *
     * @return string
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Returns the value of field id_characters
     *
     * @return integer
     */
    public function getIdCharacters()
    {
        return $this->id_characters;
    }

    /**
     * Returns the value of field url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Returns the value of field created
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("db_rick_morty");
        $this->setSource("episodes");
        $this->belongsTo('id_characters', 'App\Models\Characters', 'id', ['alias' => 'Characters']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Episodes[]|Episodes|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Episodes|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
