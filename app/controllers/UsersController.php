<?php

use Janssen\Forms\SignupForm;
use Janssen\Forms\LoginForm;
use Janssen\Forms\PassForm;

class UsersController extends Controller
{
    function __construct(SignupForm $signupForm,LoginForm $loginForm,PassForm $passForm)
    {
            $this->signupForm = $signupForm;
            $this->loginForm = $loginForm;
            $this->passForm = $passForm;
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


    ////////////////////LIKES CUENTOS/////////////////////
    public function likes(){
        $status=Input::get('status1');
        $cuento=Cuento::where('id','=',Input::get('document_id'))->first();

      /*  if(!Cookie::has('ip_virtual')){
            $value = Cookie::forever('ip_virtual', Request::getClientIp().str_random(6));
        }
            $liked=Like::where('cuento_id','=',Input::get('document_id'))->where('ip','=',Request::getClientIp())->first();
            if($liked){

                $delete=Like::where('cuento_id','=',Input::get('document_id'))->where('ip','=',Request::getClientIp())->delete();
                return 'eliminado';
            }else{
                $cuento->likes()->save(new Like([
                    'ip'=>Request::getClientIp()
                ]));
                return 'añadido';
            }*/
        $id=Input::get('document_id');
        if(isset($_COOKIE['likeDislike'."_".$id])) // check cookie
            {
                // if exist display message
                /*$delete=Like::where('cuento_id','=',Input::get('document_id'))->where('ip','=',$_COOKIE['likeDislike'."_".$id])->delete();
                setcookie("likeDislike"."_".$id, "", time()-3600);
                return 'eliminado';*/
            }


        else{
            $virtual_ip=Request::getClientIp().str_random(6);
            $cuento->likes()->save(new Like([
                'ip'=>$virtual_ip
            ]));
            $expire=time()+60*60*24*30;
          /*  Cookie::forever("likeDislike"."_".$id,"likeDislike"."_".$id);*/
           /* Cookie::make("likeDislike"."_".$id, "likeDislike"."_".$id, $expire);*/
            setcookie("likeDislike"."_".$id,$virtual_ip, $expire);
            return 'añadido';
             }
            //set cookie






       /* if(Cookie::has('ip_virtual')){

            $delete=Like::where('cuento_id','=',Input::get('document_id'))->where('ip','=',Cookie::get('ip_virtual'))->delete();
            return 'eliminado';
        }else{
            $cuento->likes()->save(new Like([
                'ip'=>Cookie::get('ip_virtual')
            ]));
            return 'añadido';
        }*/



        /*Request::getClientIp();*/
        /*$cuento->images()->save(new Image([
            'path'=>$imagename
        ]));*/
        return 'error algo paso';
    }

    ////////////////////VIEWS CUENTOS/////////////////////
    public function views(){

        $cuento=Cuento::where('id','=',Input::get('document_id'))->first();

       /* $view=CuentoView::where('cuento_id','=',Input::get('document_id'))->where('ip','=',Request::getClientIp())->first();
        if($view){

        }else{
            $cuento->views()->save(new CuentoView([
                'ip'=>Request::getClientIp()
            ]));
            return 'añadido';
        }*/


        $id=Input::get('document_id');
        if(isset($_COOKIE['View'."_".$id])) // check cookie
        {
            // if exist display message
        }

        else{
            $virtual_ip=Request::getClientIp().str_random(6);
            $cuento->views()->save(new CuentoView([
                'ip'=>$virtual_ip
            ]));
            $expire=time()+60*60*24*30;
            /*  Cookie::forever("likeDislike"."_".$id,"likeDislike"."_".$id);*/
            /* Cookie::make("likeDislike"."_".$id, "likeDislike"."_".$id, $expire);*/
            setcookie("View"."_".$id,$virtual_ip, $expire);
            return 'añadido';
        }




        return 'error algo paso';
    }


/////////////////////LIKES HISTORIAS/////////////////////////////
    public function likes_h(){

      $status=Input::get('status1');

        $historia=Historia::where('id','=',Input::get('document_id'))->first();


        $id=Input::get('document_id');
        $cookieName = "likeH_".$id;


        if(isset($_COOKIE[$cookieName])) // check cookie
        {
            /*return array('cockies'=>$_COOKIE, 'id'=>$id);*/
            /*Cookie::make('name', '123', 100);*/
            return 'have cookie';

        }


        else{
            $virtual_ip=Request::getClientIp().str_random(6);
            $historia->likes()->save(new HistoriaLike([
                'ip'=>$virtual_ip
            ]));
            $expire=time()+60*60*24*30;
            setcookie($cookieName,$virtual_ip, $expire,'/');
            return 'añadido';
        }

        return 'error algo paso';
    }


    ////////////////////VIEWS HISTORIAS/////////////////////
    public function views_h(){

        $historia=Historia::where('id','=',Input::get('document_id'))->first();

        /* $view=CuentoView::where('cuento_id','=',Input::get('document_id'))->where('ip','=',Request::getClientIp())->first();
         if($view){

         }else{
             $cuento->views()->save(new CuentoView([
                 'ip'=>Request::getClientIp()
             ]));
             return 'añadido';
         }*/


        $id=Input::get('document_id');
        /*setcookie("ViewH"."_".$id, "", time()-3600);*/
        if(isset($_COOKIE['ViewH'."_".$id])) // check cookie
        {
            // if exist display message
            return 'have cookie';
        }

        else{
            $virtual_ip=Request::getClientIp().str_random(6);
            $historia->views()->save(new HistoriaView([
                'ip'=>$virtual_ip
            ]));
            $expire=time()+60*60*24*30;
            /*  Cookie::forever("likeDislike"."_".$id,"likeDislike"."_".$id);*/
            /* Cookie::make("likeDislike"."_".$id, "likeDislike"."_".$id, $expire);*/
            setcookie("ViewH"."_".$id,$virtual_ip, $expire,'/');
            /*Cookie::queue("ViewH"."_".$id,$virtual_ip,$expire);*/
            return 'añadido';
        }




        return 'error algo paso';
    }














    ///////////////////////////RECOVER PASS/////////
    public function recovpass_index(){

         return View::make('admin.recover_pass');
    }
    public function recovpass(){

        $user=User::where('email','=',Input::get('email'))->first();
        if($user->active==0){

                         return 'primero debes activar tu cuenta';
        }else{


                            $code=str_random(60);
                            $user->code=$code;
                            $user->save();
                            if($user){
                                Mail::send('emails.recoverpass',['link'=>URL::route('recover_code',$code),'nombre'=>Input::get('name')],function($message) use ($user){
                                    $message->to($user->email,$user->name)->subject('Reestablecer contraseña');
                                });
                            }

                            return View::make('admin.recoversend_pass');


        }



    }
    public function getRecover($code){
        $user=User::where('code','=',$code)->where('active','=','1')->first();
            if($user){
                return View::make('admin.change_pass',['email'=>$user->email]);
            }else{
                 return 'codigo invalido o vencido';
            }

    }
    public function changepass($email){
        $this->passForm->validate(Input::all());
            $user=User::where('email','=',$email)->where('active','=','1')->first();
        $user->password=Hash::make(Input::get('password'));
        $user->save();
        return Redirect::route('loginUser_route');
    }



}
