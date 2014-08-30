<?php
/**
 * Created by PhpStorm.
 * User: Maquina Sentadillas
 * Date: 8/22/14
 * Time: 2:41 AM
 */

namespace Janssen\Forms;


use Laracasts\Validation\FormValidator;


class JuezForm extends FormValidator{

    protected $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'email'         => 'required|email|unique:users',
        'password'     =>   'required|confirmed',

    ];
} 