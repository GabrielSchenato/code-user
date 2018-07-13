<?php

namespace CodePress\CodeUser\Event;

/**
 * 
 *
 * @author gabriel
 */
class UserCreatedEvent
{

    private $user;
    private $plainPassword;

    public function __construct($user, $plainPassword)
    {
        $this->user = $user;
        $this->plainPassword = $plainPassword;
    }

    function getPlainPassword()
    {
        return $this->plainPassword;
    }

    function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    function getUser()
    {
        return $this->user;
    }

    function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

}
