<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Entities/Airport.php';
require_once 'Entities/ScheduledFlight.php';

/**
 * Flightstats Api client
 *
 * @author     Benoit VRIGNAUD <https://github.com/bvrignaud>
 * @license    MIT License
 * @link       https://github.com/bvrignaud/ci-flightstats
 */
class FlightstatsApi
{
    private $appId;
    private $appKey;
    private $languageCode;
    
    public function __construct()
    {
        $CI =& get_instance();
        $CI->config->load('flightstats');
        $this->appId = $CI->config->item('flightstats_appId');
        $this->appKey = $CI->config->item('flightstats_appKey');
        $this->languageCode = $CI->config->item('flightstats_languageCode');
    }
    
    
    /**
     * Get Scheduled Flight(s) by carrier and flight number, departing on the given date.
     *
     * @link https://developer.flightstats.com/api-docs/scheduledFlights/v1
     * @param string $carrier
     * @param string $flightnumber
     * @param DateTime $departure
     * @return ScheduledFlight
     */
    public function getScheduleDepartureByFlightNumber($carrier, $flightnumber, DateTime $departure)
    {
        $client  = new SoapClient('https://api.flightstats.com/flex/schedules/docs/v1/lts/soap/scheduledFlightsService.wsdl');
        $params = array(
            'appId' => $this->appId,
            'appKey' => $this->appKey,
            'carrier' => $carrier,
            'flightnumber' => $flightnumber,
            'year' => $departure->format('Y'),
            'month' => $departure->format('m'),
            'day' => $departure->format('d'),
            'extendedOptions' => 'languageCode:'.$this->languageCode,
        );
        $reponse = $client->byFlight_Departing($params);
        if (!isset($reponse->return->scheduledFlights->scheduledFlight)) {
            return null;
        }
        $flight = new ScheduledFlight($reponse->return->scheduledFlights->scheduledFlight);
        if ($flight->departureAirportFsCode == $reponse->return->appendix->airports->airport[0]->fs) {
            $flight->departureAirport = new Airport($reponse->return->appendix->airports->airport[0]);
            $flight->arrivalAirport = new Airport($reponse->return->appendix->airports->airport[1]);
        } else {
            $flight->departureAirport = new Airport($reponse->return->appendix->airports->airport[1]);
            $flight->arrivalAirport = new Airport($reponse->return->appendix->airports->airport[0]);
        }
        $flight->flightEquipment = new Equipment($reponse->return->appendix->equipments->equipment);
        
        return $flight;
    }


    /**
     * Get all aiports
     * @return Airport[]
     */
    public function getAirports()
    {
        $client  = new SoapClient('https://api.flightstats.com/flex/airports/docs/v1/lts/soap/airportsService.wsdl');
         
        $params = [
            'appId' => $this->appId,
            'appKey' => $this->appKey,
            'extendedOptions' => 'languageCode:'.$this->languageCode,
        ];
         
        $reponse = $client->allAirports($params);

        foreach ($reponse->return as $airport) {
            $airports[] = new Airport($airport);
        }
        return $airports;
    }
    
    
    /**
     * Extract flight number and carrier code from a human flight number
     * @param string $humanFlightNumber
     * @return string[]|NULL - ex: AF3321 return ['carrier' => 'AF, 'flightnumber' => '3321']
     */
    public static function extractDataFromFlightNumber($humanFlightNumber)
    {
        if (preg_match('/^([a-zA-Z]+)([0-9]+)$/u', $humanFlightNumber, $data)) {
            if (strlen($data[1]) > 1) {
                $infos = [
                    'carrier' => $data[1],
                    'flightnumber' => $data[2],
                ];
            } else {
                $tmp = str_replace(' ', '', $humanFlightNumber);
                $infos = [
                    'carrier' => substr($tmp, 0, 2),
                    'flightnumber' => substr($tmp, 2),
                ];
            }
            return $infos;
        } else {
            return null;
        }
    }
    
}
