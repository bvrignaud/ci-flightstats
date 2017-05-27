<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * CI-Flightstats usage exemple
 *
 * @author     Benoit VRIGNAUD <https://github.com/bvrignaud>
 * @license    MIT License
 * @link       https://github.com/bvrignaud/ci-flightstats
 */
class Flightstats_exemple extends CI_Controller
{
    public function __construct()
    {
        $this->load->library('flightstats/flightstatsApi');
    }
	
	
	/**
	 * Recherche un vol en fonction du n° de vol et de la date de départ
	 * Search a schedule flight by carrier and flight number, departing on the given date.
	 */
	public function search()
	{
	    $flight = $this->flightstatsapi->getScheduleDepartureByFlightNumber('AF', '3321', new DateTime());
	    var_dump($flight);
	}
	
	
	public function getAirports()
	{
	    $airports = $this->flightstatsapi->getAirports();
	    var_dump($flight);
	}
	
}
