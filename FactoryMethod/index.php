<?php

// The product interface declares the operations that all concrete products must implement
interface Transport
{
    public function ready(): void;
    public function dispatch(): void;
    public function deliver(): void;
}

// Concrete product provide various implementations of the product interface
class TruckTransport implements Transport
{
    public function ready(): void
    {
        echo "Courier is ready to be sent to the truck \n";
    }

    public function dispatch(): void
    {
        echo "Courier is on your way on the truck \n";
    }

    public function deliver(): void
    {
        echo "Courier from the truck is delivered to you \n";
    }
}

// Concrete products provide various implementations of the product interface
class PlaneTransport implements Transport
{
    public function ready(): void
    {
        echo "Courier is ready to be sent to Plane \n";
    }

    public function dispatch(): void
    {
        echo "Courier is on your way on the plane dispatched \n";
    }

    public function deliver(): void
    {
        echo "Courier from the plane is delivered to you \n";
    }
}

// The Creator class, declares the factory method
abstract class Courier
{

    // Factory method
    abstract function getCourierTransport(): Transport;

    public function sendCourier(): void
    {
        $transport = $this->getCourierTransport();
        $transport->ready();
        $transport->dispatch();
        $transport->deliver();
    }
}

// Concrete creator override the factory method and change the type of object created
class AirCourier extends Courier
{
    public function getCourierTransport(): Transport
    {
        return new PlaneTransport();
    }
}

// Concrete creator override the factory method and change the type of object created
class GroundCourier extends Courier
{
    public function getCourierTransport(): Transport
    {
        return new TruckTransport();
    }
}

// This client code works with an instance of a concrete create or subclass
function deliverCourier(Courier $courier): void
{
    $courier->sendCourier();
}

echo "Test Courier \n";
deliverCourier(new GroundCourier());

echo "Test Courier \n";
deliverCourier(new AirCourier());
