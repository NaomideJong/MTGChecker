<?php

class homecontroller
{
    public function index()
    {
        require dirname(__DIR__) . '/views/home/index.php';
    }
    public function login()
    {
        require dirname(__DIR__) . '/views/home/login.php';
    }
}