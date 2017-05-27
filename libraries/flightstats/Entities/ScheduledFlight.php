<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require_once 'BaseObject.php';

/**
 * ScheduledFlight entitie
 * 
 * @author     Benoit VRIGNAUD <https://github.com/bvrignaud>
 * @license    MIT License
 * @link       https://github.com/bvrignaud/ci-flightstats
 */
class ScheduledFlight extends BaseObject
{
    /**
     * @var string
     */
    public $carrierFsCode;
    
    /**
     * @var string
     */
    public $flightNumber;
    
    /**
     * @var string
     */
    public $departureAirportFsCode;
    
    /**
     * @var string
     */
    public $arrivalAirportFsCode;
    
    /**
     * @var Airport
     */
    public $arrivalAirport;
    
    /**
     * @var Airport
     */
    public $departureAirport;
    
    /**
     * @var int
     */
    public $stops;
    
    /**
     * @var DateTime
     */
    private $departureTime;
    
    /**
     * @var DateTime
     */
    public $arrivalTime;
    
    /**
     * @var string
     */
    public $flightEquipmentIataCode;
    
    /**
     * @var boolean
     */
    public $isCodeshare;
    
    /**
     * @var isWetlease
     */
    public $isWetlease;
    
    /**
     * @var string
     */
    public $serviceType;
    
    /**
     * @var
     */
    public $serviceClasses;
    
    /**
     * @var
     */
    public $trafficRestrictions;
    
    /**
     * @var
     */
    public $codeshares;
    
    /**
     * @var referenceCode
     */
    public $referenceCode;
    
    /**
     * @var
     */
    public $departureTerminal;
    
    /**
     * @var string
     */
    public $arrivalTerminal;
    
    
    public function __get($name)
    {
        return $this->$name;
    }
    
    public function __set($name, $value)
    {
        switch ($name) {
            case 'departureTime':
                $this->departureTime = new DateTime($value);
        }
    }
    
    
    public function getDepartureTime() {
        return $this->departureTime;
    }
    
}
