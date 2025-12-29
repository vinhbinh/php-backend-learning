<?php

require_once __DIR__ . '/../models/User.php';

class UserController
{
    public function index()
    {
        $user = new User();
        echo json_encode($user->all());
    }

    public function store()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        echo json_encode($data);

        if (empty($data['name']) || empty($data['email'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid data']);
            return;
        }

        $user = new User();
        $user->create($data['name'], $data['email']);

        echo json_encode(['message' => 'User created']);
    }
}
