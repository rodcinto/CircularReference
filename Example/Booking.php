<?php
namespace Example;

use Example\Guest;
use Example\Hotel;

class Booking
{
    public function __construct()
    {
        $guest1 = new Guest();
        $guest1->name = 'John Doe';

        $guest2 = new Guest();
        $guest2->name = 'Mr. Robot';

        $hotel = new Hotel();
        $hotel->name = 'Royal Palm Plaza';
        $hotel->addGuest($guest1);
        $hotel->addGuest($guest2);

        if ($guest1->getCurrentHotel() === $guest2->getCurrentHotel() && $guest1->getCurrentHotel() === $hotel) {
            echo "\nCircular Reference is really circular.\n";
        }

        $newHotelName = 'The Palm Royal Plaza';
        $hotel->getLastGuest()->getCurrentHotel()->getLastGuest()->getCurrentHotel()->name = $newHotelName;
        if ($newHotelName === $hotel->name) {
            echo "\nCircular Reference can be linked.\n";
        }

        $clonedHotel = clone $hotel;
        $clonedHotel->name = 'Ibis';
        if ($clonedHotel->getLastGuest()->getCurrentHotel()->name === 'Ibis') {
            echo "\nCloning will NOT update Circular References.\n";
        } else {
            echo "\nCloning WILL update Circular References.\n";
        }

        unset($hotel);
        if (!isset($hotel) && $guest2->getCurrentHOtel()->getLastGuest()->getCurrentHotel()->name === $newHotelName) {
            echo "\nKilling the instance will NOT break the link to the Circular Reference.\n";
        }
    }
}
