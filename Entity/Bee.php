<?php

namespace BeeGame\Entity;

abstract class Bee
{
    protected $healthPoints = 0;
    
    protected $hitPoints = 0;   
    
    protected $type = 'Bee';

    private $status = 'Alive';

    /**
     * @return number
     */
    public function getHitPoints()
    {
        return $this->hitPoints;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param number $hitPoints
     */
    public function setHitPoints($hitPoints)
    {
        $this->hitPoints = $hitPoints;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getHealthPoints()
    {
        return $this->healthPoints;
    }

    /**
     * @param number $healthPoints
     */
    public function setHealthPoints($healthPoints)
    {
        $this->healthPoints = $healthPoints;
        
        if ($healthPoints <= 0) {
            $this->status = 'Dead';
        }
    }

    public function hit()
    {
        $this->healthPoints = $this->healthPoints - $this->hitPoints;
    }
    public function kill()
    {
        $this->healthPoints = 0;
        $this->status = 'Dead';
    }
    /*
     *  @return bool
     */
    public  function isAlive()
    {
        return (bool) $this->healthPoints <= 0;
        
    }
}