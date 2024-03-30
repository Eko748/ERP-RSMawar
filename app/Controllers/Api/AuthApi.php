<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class AuthApi extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
    }

    public function login()
    {
        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return $this->failUnauthorized('Invalid email or password');
        }

        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;

        $payload = [
            "iss" => "Issuer of the JWT",
            "iat" => $iat,
            "exp" => $exp,
            "id_user" => $user['id_user'],
            "email" => $user['email'],
            "username" => $user['username']
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        return $this->respond([
            'message' => 'Login successful',
            'token' => $token,
            'id_user' => $user['id_user'],
            'username' => $user['username'],
            'email' => $user['email']
        ]);
    }


    public function options()
    {
        return $this->response->setStatusCode(200);
    }

    // public function login()
    // {
    //     $validation = \Config\Services::validation();
    //     $validation->setRules([
    //         'email' => 'required|valid_email',
    //         'password' => 'required|min_length[6]',
    //     ]);

    //     if (!$validation->withRequest($this->request)->run()) {
    //         return $this->failValidationErrors($validation->getErrors());
    //     }

    //     $email = $this->request->getPost('email');
    //     $password = $this->request->getPost('password');

    //     if ($email === 'user@example.com' && $password === 'password') {
    //         $token = $this->generateToken($email);

    //         return $this->respond(['token' => $token]);
    //     } else {
    //         $errors = [];
    //         if ($email !== 'user@example.com') {
    //             $errors['email'] = 'Invalid email';
    //         }
    //         if ($password !== 'password') {
    //             $errors['password'] = 'Invalid password';
    //         }
    //         return $this->failUnauthorized('Invalid email or password', null, $errors);
    //     }
    // }


    private function generateToken($email)
    {
        $key = \Config\Services::jwt()->key;
        $issuedAt = time();
        $expirationTime = $issuedAt + \Config\Services::jwt()->ttl;

        $payload = array(
            'email' => $email,
            'iat' => $issuedAt,
            'exp' => $expirationTime
        );

        return JWT::encode($payload, $key, 'HS256');
    }
}
