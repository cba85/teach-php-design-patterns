<?php

abstract class Event implements SplSubject
{
    protected $storage;

    public function __construct()
    {
        $this->storage = new SplObjectStorage;
    }

    public function attach(SplObserver $observer)
    {
        $this->storage->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        if (!$this->storage->contains($observer)) {
            return;
        }
        $this->storage->detach($observer);
    }

    public function notify()
    {
        if (!count($this->storage)) {
            return;
        }

        foreach($this->storage as $observer) {
            $observer->update($this);
        }
    }
}

class MailingListSignUp extends Event
{
    public $user;

    public function __construct($user)
    {
        parent::__construct();
        $this->user = $user;
    }
}

class UpdateMailingStatusInDatabase implements SplObserver
{
    public function update(SplSubject $event)
    {
        echo "Update user in database: " . $event->user->id;
    }
}

class SubscribeUserToService implements SplObserver
{
    public function update(SplSubject $event)
    {
        echo "Subscribe user to service: " . $event->user->email;
    }
}

class user
{
    public $id = 1;
    public $email = "clement@example.com";
}

$user = new User;

$event = new MailingListSignUp($user);
//$test = new UpdateMailingStatusInDatabase;
$event->attach(new UpdateMailingStatusInDatabase);
$event->attach(new SubscribeUserToService);
$event->notify();