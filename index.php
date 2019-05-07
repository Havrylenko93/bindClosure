<?php

class User
{
    protected $userName = 'Ivan';
}

$punksNotDead = function () {
    return $this->userName;
};

$user = new User();
$newPunk = Closure::bind($punksNotDead, $user, 'User');

echo $newPunk(); // Ivan
