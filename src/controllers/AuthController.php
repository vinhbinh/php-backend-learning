<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $secret = "MY_SECRET_KEY";

    public function register()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid data']);
            return;
        }

        $user = new User();
        $user->createWithPassword(
            $data['name'],
            $data['email'],
            password_hash($data['password'], PASSWORD_BCRYPT)
        );

        echo json_encode(['message' => 'Registered']);
    }

    public function login()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $user = (new User())->findByEmail($data['email']);

        if (!$user || !password_verify($data['password'], $user['password'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Invalid credentials']);
            return;
        }

        $token = base64_encode(json_encode([
            'user_id' => $user['id'],
            'exp' => time() + 3600
        ]));

        echo json_encode(['token' => $token]);
    }
}
