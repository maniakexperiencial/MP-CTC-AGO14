<?php
/**
 * Created by PhpStorm.
 * User: Maquina Sentadillas
 * Date: 8/22/14
 * Time: 2:41 AM
 */

namespace Janssen\Forms;


use Laracasts\Validation\FormValidator;


class LoginForm extends FormValidator{

    protected $rules = [

        'email'         => 'required|email',
        'password'     =>   'required',

    ];
} 