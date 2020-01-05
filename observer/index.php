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

// STEP 1
/*
class MailingListSignUp implements Subject
{

    protected $observers = [];

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        for ($i = 0; $i < count($this->observers); $i++) {
            if ($this->observers[$i] == $observer) {
                unset($this->observers[$i]);
            }
            $this->observers = array_values($this->observers);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle($this);
        }
    }
}
*/

// STEP 2
trait Subjectable
{
    protected $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        for ($i = 0; $i < count($this->observers); $i++) {
            if ($this->observers[$i] == $observer) {
                unset($this->observers[$i]);
            }
            $this->observers = array_values($this->observers);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle($this);
        }
    }
}

// STEP 2
class MailingListSignUp implements Subject
{
    use Subjectable;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
}

// STEP 2
class Login implements Subject
{
    use Subjectable;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
}

class UpdateMailingStatusInDatabase implements Observer
{
    public function handle($event)
    {
        echo "Update status in database: " . $event->user->id;
    }
}

class SubscribeUserToService implements Observer
{
    public function handle($event)
    {
        echo "Subscribe user to MailChimp: " . $event->user->email;
    }
}

class User
{
    public $id = 1;
    public $email = "clement@example.com";
}

$user = new User;

$event = new MailingListSignUp($user);
$event->attach(new UpdateMailingStatusInDatabase);
$event->attach(new SubscribeUserToService);

//$event->detach(new UpdateMailingStatusInDatabase);
//var_dump($event);

$event->notify();
