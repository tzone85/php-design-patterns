<?php

// Base Component
interface Pizza {
    public function getDesc(): String;
    public function getCost(): int;
}

// Concrete Component
class Margherita implements Pizza {
    public function getDesc(): String {
        return "Margherita";
    }

    public function getCost(): int
    {
        return 100.00;
    }
}

class VeggieParadise implements Pizza {
    public function getDesc(): String {
        return "Veggie Paradise";
    }

    public function getCost(): int
    {
        return 200.00;
    }
}

// Base Decorator
class PizzaToppings implements Pizza {
    protected $pizza;

    public function __construct(Pizza $pizza) {
        $this->pizza = $pizza;
    }

    public function getDesc(): String {
        return $this->pizza->getDesc();
    }

    public function getCost(): int
    {
        return $this->pizza->getCost();
    }
}

// Concrete Decorator
class ExtraCheese extends PizzaToppings
{
    public function getDesc(): string
    {
        return parent::getDesc() . ", Extra Cheese";
    }

    public function getCost(): int
    {
        return parent::getCost() + 50;
    }

}

class Jalapeno extends PizzaToppings
{
    public function getDesc(): string
    {
        return parent::getDesc() . ", Jalapeno";
    }

    public function getCost(): int
    {
        return parent::getCost() + 70;
    }
}

function clientCode(Pizza $pizza) {
    echo "Pizza ordered: " . $pizza->getDesc() . "\n";
    echo "Total cost: " . $pizza->getCost() . "\n";
}

$pizza = new Margherita();
$pizza = new ExtraCheese($pizza);
$pizza = new Jalapeno($pizza); // Margherita + Extra Cheese + Jalapeno

clientCode($pizza);