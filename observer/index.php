<?php

interface Observer
{
    public function handle($event);
}

interface Subject
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

trait Subjectable
{
    protected $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        foreach ($this->observers as $key => $value) {
            if ($value == $observer) {
                unset($this->observers[$key]);
            }
            $this->observers = array_values($this->observers);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $key => $observer) {
            $observer->handle($this);
        }
    }
}

class NewsletterSignUp implements Subject
{
    use Subjectable;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
}

class NewUserSignUp implements Subject
{
    use Subjectable;

    public $admin;

    public function __construct($admin)
    {
        $this->admin = $admin;
    }
}

class User
{
    public $id = 1;
    public $email = "clement@webstart.com";
}

class NewProductsNewsletter implements Observer
{
    public function handle($event)
    {
        echo "{$event->user->email} subscribed to new products newsletter";
    }
}

class NewServicesNewsletter implements Observer
{
    public function handle($event)
    {
        echo "{$event->user->email} subscribed to new services newsletter";
    }
}

$user = new User;
$event = new NewsletterSignUp($user);
$event->attach(new NewProductsNewsletter);
$event->attach(new NewServicesNewsletter);
$event->detach(new NewServicesNewsletter);

$event->notify();
