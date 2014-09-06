<?php
/**
 * Created by PhpStorm.
 * User: Maquina Sentadillas
 * Date: 8/22/14
 * Time: 2:41 AM
 */

namespace Janssen\Forms;


use Laracasts\Validation\FormValidator;


class PassForm extends FormValidator{

    protected $rules = [
        'password'     =>   'required|confirmed',
        /*'image'=> 'mimes:jpeg,bmp,png |required',*/
    ];
} 