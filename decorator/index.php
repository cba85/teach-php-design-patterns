<?php

/*
class Subscription
{
    private $cost;

    public function setCost($cost)
    {
        $this->cost += $cost;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function base() // Essentiel
    {
        return 7.99;
    }

    public function standardOffer() // Standard
    {
        return 4;
    }

    public function familyOffer() // Family
    {
        return 8;
    }
}

$subscription = new Subscription;
$subscription->setCost($subscription->base());
$subscription->setCost($subscription->familyOffer());
echo $subscription->getCost();
*/

interface SubscriptionInterface
{
    public function price();
    public function name();
}

class Subscription implements SubscriptionInterface
{
    public function price()
    {
        return 7.99;
    }

    public function name()
    {
        return "Essentiel";
    }
}


abstract class SubscriptionOption implements SubscriptionInterface
{
    protected $subscription;

    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }

    abstract public function price();

    abstract public function name();
}

class StandardSubscription extends SubscriptionOption
{
    protected $price = 4;
    protected $name = "Standard";

    public function price()
    {
        return $this->subscription->price() + $this->price;
    }

    public function name()
    {
        return "{$this->subscription->name()} + option {$this->name}";
    }
}

class FamilySubscription extends SubscriptionOption
{
    protected $price = 8;
    protected $name = "Family";

    public function price()
    {
        return $this->subscription->price() + $this->price;
    }

    public function name()
    {
        return "{$this->subscription->name()} + option {$this->name}";
    }
}

$subscription = new Subscription;
$subscription = new StandardSubscription(new Subscription);
$subscription = new FamilySubscription(new Subscription);
echo $subscription->name();
echo $subscription->price();
