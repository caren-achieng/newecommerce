<?php

namespace App\Models;
use CodeIgniter\Model;
use Exception;

class UserModel extends Model
{

    protected $table = 'tbl_users';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['first_name', 'last_name', 'email', 'password', 'gender', 'role'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data)
    {
        if(isset($data['data']['password'])) $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }

    /**
     * @throws Exception
     */
    public function findUserByEmailAddress(string $emailAddress): object|array
    {
        $user = $this->asArray()->where(['email' => $emailAddress])->first();

        if(!$user) throw new Exception('User does not exist for specified email address');

        return $user;
    }
}
