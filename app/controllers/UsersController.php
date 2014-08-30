<?php

use Janssen\Forms\SignupForm;
use Janssen\Forms\LoginForm;

class UsersController extends Controller
{
    function __construct(SignupForm $signupForm,LoginForm $loginForm)
    {
            $this->signupForm = $signupForm;
            $this->loginForm = $loginForm;
    }


    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    public function login_index()
    {
        if(Auth::check()){
            return Redirect::route('redirect');
        }
        return View::make('admin.index');
    }

    public function signup_index()
    {
        if(Auth::check()){
            return Redirect::route('redirect');
        }
        return View::make('admin.signup');
    }





    public function login()
    {
        $this->loginForm->validate(Input::all());

        /*if(Auth::attempt(Input::only('email','password'))){
            return Redirect::route('redirect'); //Auth::user();
        }*/
        $remember=(Input::has('remember'))?true : false;
        if(Auth::attempt(['email'=>Input::get('email'),'password'=>Input::get('password'),'active' =>1  ],$remember)){
            return Redirect::route('redirect'); //Auth::user();
        }
        return Redirect::back()->withInput()->with('mensaje_request','<span class=error>Usuario y/o contraseña incorrectos</span>');
    }

    public function login_destroy()
    {
        Auth::logout();
        return Redirect::route('loginUser_route');
    }

    public function signup()
    {


        $this->signupForm->validate(Input::all());

        $code=str_random(60);

        $user = User::create([
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            'type' => '2',//Input::get('select_type'),
            'code' => $code,
            'active' => 0

        ]);
        $user->details()->save(new UserDetail([
            'name' => Input::get('name'),
            'lastname' => Input::get('lastname'),
            'phone' => Input::get('phone'),
            'mobile' => Input::get('mobile'),
            'institution' => Input::get('select_institution'),
            'address' => Input::get('address'),
            'rol' => Input::get('select_type')
        ]));

        if($user){

            Mail::send('emails.activate',['link'=>URL::route('account_activate',$code),'nombre'=>Input::get('name')],function($message) use ($user){
                $message->to($user->email,$user->name)->subject('Activa tu cuenta');
            });
            return Redirect::route('register_success');
        }

        //Auth::loginUsingId($user->id);

        //return Redirect::route('loginUser_route');

    }
    /////////////REGISTER SUCCESS MESSAGE///////
    public function register_success(){
        return View::make('admin.register_success');
    }
    /////////////REGISTER CONFIRMED MESSAGE///////
    public function register_confirmed(){
        return View::make('admin.register_confirmed');
    }

///////////////////////////////REDIRECT USERS///////////////////////////
    public function redirect_user(){
        switch(Auth::user()->type){
            case '0':
                return Redirect::route('dashboard_admin');
                break;
            case '1':
                return Redirect::route('dashboard_juez');
                break;
            case '2':
                return Redirect::route('dashboard_pd');
                break;
            default;
        }
    }
//////////////////////////////////LOG OUT////////////////////
    public function log_out(){

        Auth::logout();
        return Redirect::route('loginUser_route');
    }

//////////////////////////////////////ACTIVATE USER/////////////
    public function getActivate($code){
        $user=User::where('code','=',$code)->where('active','=','0');
        if($user->count()){
            $user=$user->first();
            $user->active=1;
            $user->code="";
            if($user->save()){
                return Redirect::route('register_confirmed')->with('mail',$user->email);
            }
        }else{
            return 'Algo salio mal';

        }

        //return $code;
    }


}
