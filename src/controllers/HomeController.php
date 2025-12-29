<?php

class HomeController
{
    public function index()
    {
        echo json_encode([
            'message' => 'Welcome to PHP Backend MVC'
        ]);
    }
}
