<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthUserApi extends BaseController
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

        if (is_null($user)) {
            return $this->respond(['error' => 'Invalid username or password.'], 401);
        }

        $pwd_verify = password_verify($password, $user['password']);

        if (!$pwd_verify) {
            return $this->respond(['error' => 'Invalid username or password.'], 401);
        }

        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;

        $payload = [
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat,
            "exp" => $exp,
            "email" => $user['email'],
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        $response = [
            'message' => 'Login Successful',
            'token' => $token
        ];

        return $this->respond($response, 200);
    }

    public function options()
    {
        return $this->response->setStatusCode(200);
    }

    public function register()
    {
        $rules = [
            'nama_lengkap' => [
                'rules' => 'required|min_length[4]|max_length[255]'
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[255]|is_unique[tbu_user.username]'
            ],
            'email' => [
                'rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[tbu_user.email]'
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[255]'
            ],
            // 'confirm_password' => [
            //     'label' => 'confirm password',
            //     'rules' => 'matches[password]'
            // ]
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'nama_lengkap'    => $this->request->getVar('nama_lengkap'),
                'username'    => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);

            return $this->respond(['message' => 'Registered Successfully'], 200);
        } else {
            $response = [
                'errors' => $this->validator->getErrors(),
                'message' => 'Invalid Inputs'
            ];
            return $this->fail($response, 409);
        }
    }

    public function logout()
    {
        $token = $this->request->getHeaderLine('Authorization');

        if (empty($token)) {
            return $this->respond(['error' => 'Token not provided.'], 401);
        }

        try {
            $key = getenv('JWT_SECRET');
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
        } catch (\Exception $e) {
            return $this->respond(['error' => 'Invalid token.'], 401);
        }

        $response = [
            'message' => 'Logout Successful'
        ];

        return $this->respond($response, 200);
    }
}
