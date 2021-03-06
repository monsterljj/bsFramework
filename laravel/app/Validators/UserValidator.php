<?php
/**
 * Created by PhpStorm.
 * User: mrcardoso
 * Date: 27/11/15
 * Time: 23:02
 */

namespace App\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{
    protected $rules = [
        'corporate_register_id' => 'required',
        'username' => 'required|uniqueField',
        'name' => 'required|max:255',
        'group' => 'required|validGroup',
        'password' => 'required|confirmed|min:6',
        'email' => 'required|email|max:255|uniqueField',
    ];
    public function prepareRules( $update = false)
    {
        if( $update )
        {
            $this->rules["password"] = 'confirmed|min:6';
        }
    }

    public function setCustomRules($field, $rule)
    {
        unset($this->rules[$field]);
        $this->rules[$field] = $rule;
    }
}