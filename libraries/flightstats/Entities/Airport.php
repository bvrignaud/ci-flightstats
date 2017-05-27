<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseObject.php';

/**
 * Airport entitie
 *
 * @author     Benoit VRIGNAUD <https://github.com/bvrignaud>
 * @license    MIT License
 * @link       https://github.com/bvrignaud/ci-flightstats
 */
class Airport extends BaseObject
{
    /**
     * @var string
     */
    public $fs;
    
    /**
     * @var string
     */
    public $iata;
    
    /**
     * @var string
     */
    public $icao;
    
    /**
     * @var string
     */
    public $faa;
    
    /**
     * @var string
     */
    public $name;
    
    /**
     * @var string
     */
    public $city;
    
    /**
     * @var string
     */
    public $cityCode;
    
    /**
     * @var string
     */
    public $stateCode;
    
    /**
     * @var string
     */
    public $postalCode;
    
    /**
     * @var string
     */
    public $countryCode;
    
    /**
     * @var string
     */
    public $countryName;
    
    /**
     * @var string
     */
    public $regionName;
    
    /**
     * @var string
     */
    public $timeZoneRegionName;
    
    /**
     * @var string
     */
    public $weatherZone;
    
    /**
     * @var
     */
    public $classification;
    
    /**
     * @var
     */
    public $active;
    
    /**
     * @var
     */
    public $longitude;
    
    /**
     * @var
     */
    public $latitude;
    
    /**
     * @var int
     */
    public $elevationFeet;
    
    /**
     * @var
     */
    public $weatherUrl;
    
    /**
     * @var
     */
    public $delayIndexUrl;
    
    /**
     * @var string
     */
    public $street1;
    
    /**
     * @var string
     */
    public $street2;
    
    /**
     * @var
     */
    public $utcOffsetHours;
    
}
