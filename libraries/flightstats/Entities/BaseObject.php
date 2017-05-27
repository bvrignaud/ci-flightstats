<?php

/**
 * Class BaseObject
 * 
 * @package ci-flightstats
 */
class BaseObject
{
    final public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
