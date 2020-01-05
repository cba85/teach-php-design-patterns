<?php

class Lesson
{
    public $active = true;

    public function __construct($active = true)
    {
        $this->active = $active;
    }
}

class User
{
    public $active = true;

    public function __construct($active = true)
    {
        $this->active = $active;
    }
}

class IsActive
{
    public function isSatisfiedBy($item)
    {
        return $item->active === true;
    }
}

$lesson = new Lesson(true);

/*
if ($lesson->active) {
    echo "Active";
}
*/

$specification = (new IsActive)->isSatisfiedBy($lesson);
print_r($specification);

$user = new User(true);
$specification = (new IsActive)->isSatisfiedBy($user);
print_r($specification);
