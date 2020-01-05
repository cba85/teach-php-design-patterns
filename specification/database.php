<?php

class User
{
    public $email = "clement@example.com";
}

class UserRepository
{
    public function getUserByEmail()
    {
        return null;
    }
}

class EmailsIsAvailable
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function isSatisfiedBy($email)
    {
        if ($this->repository->getUserByEmail($email)) {
            return false;
        }
        return true;
    }
}

$userRepository = new UserRepository();
$spec = new EmailsIsAvailable($userRepository);
print_r($spec->isSatisfiedBy('clement@example.com'));