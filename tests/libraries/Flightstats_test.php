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
}
