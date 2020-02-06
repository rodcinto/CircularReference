<?php
namespace Example;

use Example\Hotel;

class Guest
{
    public $name;
    private $currentHotel;

    public function setCurrentHotel(Hotel $hotel)
    {
        $this->currentHotel = $hotel;
    }

    public function getCurrentHotel()
    {
        return $this->currentHotel;
    }
}
