<?php

namespace Maalls\DBLogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DBLog
 */
class DBLog
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $priority = "info";

    /**
     * @var string
     */
    private $message;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var string
     */
    private $author = "";


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set priority
     *
     * @param string $priority
     * @return DBLog
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return string 
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return DBLog
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return DBLog
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return DBLog
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    public function setCreatedAtValue() {

        $this->created_at = new \Datetime();

    }

    public function log($msg, $priority = "info", $author = "") 
    {

        $this->message = $msg;
        $this->priority = $priority;
        $this->author = $author;

    }
}
