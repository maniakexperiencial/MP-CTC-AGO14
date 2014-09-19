<?php
/**
 * Created by PhpStorm.
 * User: Maquina Sentadillas
 * Date: 8/22/14
 * Time: 2:41 AM
 */

namespace Janssen\Forms;


use Laracasts\Validation\FormValidator;


class SignupForm extends FormValidator{

    protected $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'email'         => 'required|email|unique:users',
        'password'     =>   'required|confirmed|Min:8',
        'phone'       => 'required|numeric',
        'mobile'       => 'required|numeric',
        'terms'       => 'required'
    ];
} 