<?php

use Janssen\Forms\SignupForm;
use Janssen\Forms\LoginForm;

class AcPdController extends Controller
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
        return View::make('admin.account.Pd.dashboard');
    }

    ///////////////////////////////////////NEW Historia//////////////////////////
    public function new_historia_index(){
       /* $user=Auth::user();
        $type="";
        switch($user->details->rol){
            case 'padre':
                $type="padres";
                break;
            case 'doctor':
                $type="doctores";
                break;
            default:
                break;

        }*/
        return View::make('admin.account.Pd.new_historia');
    }

    public function new_historia(){
        $user=Auth::user();
        $category="";
        switch($user->details->rol){
            case 'padre':
                $category="padres";
                break;
            case 'doctor':
                $category="doctores";
                break;
            default:
                break;

        }
        $user->historias()->save(new Historia([
            'title' => Input::get('title'),
            'name' => Input::get('name'),
            'category' => $category,
            'state' => Input::get('state'),
            'text' => Input::get('text'),
        ]));
        return Redirect::back()->with('mensaje_request','<span class=success_message>Historia Registrado Correctamente</span>');
    }




}
