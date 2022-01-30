<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class WalletModel extends Model
{
    protected $table = 'tbl_wallet';
    protected $primaryKey = 'wallet_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['customer_id', 'amount_available','is_deleted'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getWallets($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['wallet_id' => $id])
            ->first();
    }

    public function getWalletAtUser($uid)
    {
        return $this->asArray()
            ->where(['customer_id' => $uid])
            ->first();
    }
}
