<?php
// Strategy Interface
interface  PaymentGateway
{
    public function pay($amount);
}

class PayByDcCc implements PaymentGateway
{
    public function pay($amount)
    {
        echo "Paying by Debit/Credit card: " . $amount.PHP_EOL;
    }
}

class PayByPayPal implements PaymentGateway
{
    public function pay($amount)
    {
        echo "Paying by PayPal: " . $amount.PHP_EOL;
    }
}

// Context
class Order {
    private $paymentGateway;

//    public function __construct(PaymentGateway $paymentGateway) {
//        $this->paymentGateway = $paymentGateway;
//    }

    public function setPaymentGateway(PaymentGateway $paymentGateway) {
        $this->paymentGateway = $paymentGateway;
    }

    public function pay($amount) {
        $this->paymentGateway->pay($amount);
    }
}

// Client code
$order = new Order();
$order->setPaymentGateway(new PayByDcCc());

// perform the task at hand
$order->pay(100);

// Client code for using a different strategy
$order = new Order();
$order->setPaymentGateway(new PayByPayPal());

$order->pay(170);