<?php
/**
 * Origin of thi file : https://github.com/lartie/FlightStatsApi/blob/master/src/Core/Objects/Equipment.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseObject.php';

/**
 * The Equipment Response is returned for the following request type: Equipment
 *
 * Class Equipment
 *
 */
class Equipment extends BaseObject
{
    protected $iata;
    protected $name;
    protected $turboProp;
    protected $jet;
    protected $widebody;
    protected $regional;
    /**
     * @return mixed
     */
    public function getIata()
    {
        return $this->iata;
    }
    /**
     * @param mixed $iata
     */
    public function setIata($iata)
    {
        $this->iata = $iata;
    }
    /**
     * @return mixed
     */
    public function getJet()
    {
        return $this->jet;
    }
    /**
     * @param mixed $jet
     */
    public function setJet($jet)
    {
        $this->jet = $jet;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * @return mixed
     */
    public function getRegional()
    {
        return $this->regional;
    }
    /**
     * @param mixed $regional
     */
    public function setRegional($regional)
    {
        $this->regional = $regional;
    }
    /**
     * @return mixed
     */
    public function getTurboProp()
    {
        return $this->turboProp;
    }
    /**
     * @param mixed $turboProp
     */
    public function setTurboProp($turboProp)
    {
        $this->turboProp = $turboProp;
    }
    /**
     * @return mixed
     */
    public function getWidebody()
    {
        return $this->widebody;
    }
    /**
     * @param mixed $widebody
     */
    public function setWidebody($widebody)
    {
        $this->widebody = $widebody;
    }
    
}
