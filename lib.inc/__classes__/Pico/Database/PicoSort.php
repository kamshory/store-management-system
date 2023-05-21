<?php
namespace Pico\Database;

class PicoSort
{
    private $orderBy = "";
    private $orderType = "";

    public function __construct($orderBy, $orderType)
    {
        $this->setOrderBy($orderBy);
        $this->setOrderType($orderType);
    }

    /**
     * Get the value of orderBy
     */ 
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * Set the value of orderBy
     *
     * @return  self
     */ 
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;

        return $this;
    }

    /**
     * Get the value of orderType
     */ 
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * Set the value of orderType
     *
     * @return  self
     */ 
    public function setOrderType($orderType)
    {
        $orderType = trim($orderType);
        if(strcasecmp($orderType, 'desc') === 0)
        {
            $this->orderType = 'DESC';
        }
        else
        {
            $this->orderType = 'ASC';
        }
        return $this;
    }
    public function __toString()
    {
        return $this->getOrderBy()." ".$this->getOrderType();
    }
}