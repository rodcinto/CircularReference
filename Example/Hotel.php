<?php
namespace Example;

use Example\Guest;

class Hotel
{
    public $name;
    private $guests = [];

    public function addGuest(Guest $guest)
    {
        $guest->setCurrentHotel($this);
        $this->guests[] = $guest;
    }

    public function getLastGuest()
    {
        return end($this->guests);
    }
}
