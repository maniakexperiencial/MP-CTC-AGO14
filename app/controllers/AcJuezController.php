<?php

use Janssen\Forms\SignupForm;
use Janssen\Forms\LoginForm;

class AcJuezController extends Controller
{
    /*function __construct(SignupForm $signupForm,LoginForm $loginForm)
    {
            $this->signupForm = $signupForm;
            $this->loginForm = $loginForm;
    }*/


    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    public function index()
    {
        return View::make('admin.account.Juez.cuentos');
    }

    public function preselect()
    {
        return View::make('admin.account.Juez.preselect');
    }

    public function finalist()
    {
        return View::make('admin.account.Juez.finalist');
    }




}
