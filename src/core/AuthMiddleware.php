<?php

class AuthMiddleware
{
    public static function handle()
    {
        $headers = getallheaders();

        if (!isset($headers['Authorization'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }

        $token = str_replace('Bearer ', '', $headers['Authorization']);
        $payload = json_decode(base64_decode($token), true);

        if (!$payload || $payload['exp'] < time()) {
            http_response_code(401);
            echo json_encode(['error' => 'Token expired or invalid']);
            exit;
        }

        return $payload;
    }
}
