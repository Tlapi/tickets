<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Article
 *
 * @ORM\Entity(repositoryClass="\Application\Repository\Events")
 * @ORM\Table(name="events")
 * @property integer $id
 * @package Application\Entity
 */
class Event
{
    /**
     * @ORM\Id
	 * @ORM\Column(type="integer");
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string");
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(type="datetime");
     * @var string
     */
    protected $date;
    
    public function __construct() 
    {
        $this->inserted = new \DateTime("now");
    }
    
    /**
     * getID
     *
     * @return int
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * getName
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * getDescription
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->main_description;
    }
    
    /**
     * getDate
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
    * Exchange array - used in ZF2 form
    *
    * @param array $data An array of data
    */
    public function exchangeArray($data)
    {
        $this->id = (isset($data['id']))? $data['id'] : null;
    }

    /**
    * Get an array copy of object
    *
    * @return array
    */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}