<?php


namespace app\models;
use mdm\admin\models\User as UserModel;


class User extends UserModel
{
    public function getAccount()
    {
        return $this->hasOne(Account::className() , ['user_id' => 'id']);
    }
}