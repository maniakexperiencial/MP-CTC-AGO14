<?php
/**
 * Created by PhpStorm.
 * User: Maquina Sentadillas
 * Date: 8/22/14
 * Time: 2:41 AM
 */

namespace Janssen\Forms;


use Laracasts\Validation\FormValidator;


class VideoForm extends FormValidator{

    protected $rules = [
        'title' => 'required',
        'name' => 'required',
        'category' => 'required',
        'age' => 'required',
        'state' => 'required',
        'code' => 'required',

    ];
} 