<?php

function auth() {
    if(isset($_SESSION['user'])) {
        return $_SESSION['user'];
    }
}

function LoggedIn() {
    if(isset($_SESSION['user'])) {
        return 1;
    }
    else {
        return 0;
    }
}

function shortText($text, $n = 80) 
{
    if (strlen($text) > $n) {
        return substr($text, 0, $n) . '...';
    } else {
        return $text;
    }
}

function formatTime($timestamp) {
    echo date('M j Y g:i A', strtotime($timestamp));
}