<?php

/*

class Subscription
{
    public $cost;

    public function price()
    {
        return 5;
    }

    public function priceWithSupport()
    {
        return 2;
    }

    public function setCost($cost)
    {
        $this->cost += $cost;
    }

    public function getCost()
    {
        return $this->cost;
    }
}

$subscription = new Subscription;
//echo $subscription->price();
$subscription->setCost($subscription->price());
$subscription->setCost($subscription->priceWithSupport());
echo $subscription->getCost();

*/

interface SubscriptionInterface
{
    public function price();
    public function description();
}

class BasicSubscription implements SubscriptionInterface
{
    public function price()
    {
        return 5;
    }

    public function description()
    {
        return 'Basic subscription';
    }
}

abstract class SubscriptionFeature implements SubscriptionInterface
{
    protected $subscription;

    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }

    abstract public function price();
    abstract public function description();
}

class AdditionalSpaceFeature extends SubscriptionFeature
{
    public function price()
    {
        //return 3;
        return $this->subscription->price() + 3;
    }

    public function description()
    {
        //return 'Additional space';
        return $this->subscription->description() . ' + Additional space';
    }
}

class SupportFeature extends SubscriptionFeature
{
    public function price()
    {
        //return 1;
        return $this->subscription->price() + 1;
    }

    public function description()
    {
        //return 'Support';
        return $this->subscription->description() . ' + Support';
    }
}

//$subscription = new BasicSubscription;

//$subscription = new AdditionalSpaceFeature(new BasicSubscription);

//$subscription = new SupportFeature(new AdditionalSpaceFeature(new BasicSubscription));

$subscription = new BasicSubscription;
$subscription = new SupportFeature($subscription);
$subscription = new AdditionalSpaceFeature($subscription);

echo $subscription->price();
echo $subscription->description();