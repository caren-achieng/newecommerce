<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\ApiUserModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ReflectionException;
use function getSignedJWTForUser;
use function helper;

class Auth extends BaseController
{
    /**
     * Register a new user
     *
     * @throws ReflectionException
     */
    public function register(): ResponseInterface
    {
        $rules = [
            'first_name' => 'required|min_length[3]|max_length[20]',
            'last_name'  => 'required|min_length[3]|max_length[20]',
            'email'      => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
            'password'   => 'required|min_length[8]|max_length[255]',
            'gender'     => 'required',
        ];

        if(!$this->validate($rules)) {
            return $this->getResponse($this->validator->getErrors(), ResponseInterface::HTTP_BAD_REQUEST);
        }

        $input = $this->request->getVar();
        $input['role'] = (new RoleModel)->where('role_name', 'api_user')->first()['role_id'];

        $userModel = new UserModel();
        $userModel->save($input);

//        echo "<pre>"; print_r($userModel); die;

//        dd($userModel->user_id);

        return $this->getJWTForUser($input['email'], ResponseInterface::HTTP_CREATED);
    }

    /**
     * Authenticate Existing User
     */
    public function login(): ResponseInterface
    {
        $rules = [
            'email'    => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|min_length[8]|max_length[255]'
        ];

        $input = $this->request->getVar();

        if(!$this->validate($rules)) {
            return $this->getResponse($this->validator->getErrors(), ResponseInterface::HTTP_BAD_REQUEST);
        }

        $model = new UserModel();
        $user = $model->findUserByEmailAddress($input['email']);

        if(!password_verify($input['password'], $user['password'])) {
            return $this->getResponse(['error' => "Invalid credentials"], ResponseInterface::HTTP_BAD_REQUEST);
        }

        return $this->getJWTForUser($input['email']);
    }

    private function getJWTForUser(string $email, int $responseCode = ResponseInterface::HTTP_OK): ResponseInterface
    {
        try {
            $model = new UserModel();
            $user = $model->findUserByEmailAddress($email);

            $apiUser = new ApiUserModel;
            $apiUser->save([
                'username' => $email,
                'key'      => uniqid(more_entropy: true),
                'added_by' => $user['user_id']
            ]);

            unset($user['password']);

            helper('jwt');

            return $this->getResponse([
                'message'      => 'User authenticated successfully',
                'user'         => [
                    'username' => $email,
                    'key'      => uniqid(more_entropy: true),
                    'added_by' => $user['user_id']
                ],
                'access_token' => getSignedJWTForUser($email)
            ]);
        } catch (Exception $exception) {
            return $this->getResponse(['error' => $exception->getMessage(),], $responseCode);
        }
    }
}
