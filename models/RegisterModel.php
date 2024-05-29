<?php

namespace app\models;

use app\core\Model;
class RegisterModel extends Model
{
    public string $firstName;
    public string $lasttName;
    public string $email;
    public string $password;
    public string $Confirmedpassword;

    public function register()
    {
        return 'create new user';
    }

    public function rules(): array
    {
        return
        [
            'firstname'=>[self::RULE_REQUIRED],
            'lastname'=>[self::RULE_REQUIRED],
            'email'=>[self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED,[self::RULE_MIN,'min'=>8,'max'=>24]],
            'confirmpassword'=>[self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']],
        ];
    }

}