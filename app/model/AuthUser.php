<?php

namespace App\Model;

class AuthUser {

    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function email() {
        return $this->email;
    }

}