<?php

/**
 * Flightstats tests
 *
 * @author     Benoit VRIGNAUD <https://github.com/bvrignaud>
 * @license    MIT License
 * @link       https://github.com/bvrignaud/ci-flightstats
 */
class Flightstats_test extends TestCase
{
    public function setUp()
    {
        $this->obj = new FlightstatsApi();
    }
    
    public function test_getScheduleDepartureByFlightNumber()
    {
        $flight = $this->obj->getScheduleDepartureByFlightNumber('AF', '3321', new DateTime('2017-08-31'));
        $this->assertInstanceOf('ScheduledFlight', $flight);
        $this->assertEquals($flight->departureAirportFsCode, $flight->departureAirport->fs);
        $this->assertEquals($flight->arrivalAirportFsCode, $flight->arrivalAirport->fs);
    }
    
    public function test_extractDataFromFlightNumber()
    {
        $data = FlightstatsApi::extractDataFromFlightNumber('AF3321');
        $this->assertEquals(['carrier' => 'AF', 'flightnumber' => '3321'], $data);
        
        $data = FlightstatsApi::extractDataFromFlightNumber('UA54');
        $this->assertEquals(['carrier' => 'UA', 'flightnumber' => '54'], $data);
        
        $data = FlightstatsApi::extractDataFromFlightNumber('JAF3685');
        $this->assertEquals(['carrier' => 'JAF', 'flightnumber' => '3685'], $data);
        
        $data = FlightstatsApi::extractDataFromFlightNumber('AF8');
        $this->assertEquals(['carrier' => 'AF', 'flightnumber' => '8'], $data);
        
        $data = FlightstatsApi::extractDataFromFlightNumber('A53056');
        $this->assertEquals(['carrier' => 'A5', 'flightnumber' => '3056'], $data);
    }
    
    public function test_getDuration()
    {
        $flight = $this->obj->getScheduleDepartureByFlightNumber('AF', '7', new DateTime('2017-06-18'));
        $this->assertEquals('7h 25m', $flight->getDuration()->format('%hh %im'));
    }
}
