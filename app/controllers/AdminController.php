<?php

use Janssen\Forms\SignupForm;
use Janssen\Forms\LoginForm;
use Janssen\Forms\JuezForm;
use Janssen\Forms\CuentoForm;

class AdminController extends Controller
{
    /*function __construct(SignupForm $signupForm,LoginForm $loginForm)
    {
            $this->signupForm = $signupForm;
            $this->loginForm = $loginForm;
    }*/
    function __construct(SignupForm $signupForm,LoginForm $loginForm,JuezForm $juezForm,CuentoForm $cuentoForm)
    {
        $this->juezForm = $juezForm;
        $this->cuentoForm = $cuentoForm;

    }


    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    public function index()
    {
        $user=User::all();
        return View::make('admin.account.Admin.dashboard',['users'=>$user]);

    }

    public function cuentos()
    {
        $user=User::all();
        return View::make('admin.account.Admin.cuentos',['users'=>$user]);
    }

    public function historias()
    {
        $user=User::all();
        return View::make('admin.account.Admin.historias',['users'=>$user]);
    }

    public function preselect()
    {
        return View::make('admin.account.Admin.preselect');
    }

    public function finalist()
    {
        return View::make('admin.account.Admin.finalist');
    }

    public function report()
    {
        return View::make('admin.account.Admin.report');
    }
    /////////////////////////////////////NEW JUEZ//////////////////////////
    public function new_juez_index(){
        return View::make('admin.account.Admin.new_juez');

    }
    public function new_juez(){
        $this->juezForm->validate(Input::all());

        $user = User::create([
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            'type' => '1',//Input::get('select_type'),
            'active' => 1

        ]);
        $user->details()->save(new UserDetail([
            'name' => Input::get('name'),
            'lastname' => Input::get('lastname'),

            'rol' => 'juez'
        ]));
        return Redirect::back()->with('mensaje_request','<span class=success_message>Juez Registrado Correctamente</span>');
    }
    ///////////////////////////////////////NEW CUENTO//////////////////////////
    public function new_cuento_index(){
        return View::make('admin.account.Admin.new_cuento');
    }
    public function new_cuento(){
        $this->cuentoForm->validate(Input::all());
       $user=Auth::user();
        $cuento= $user->cuentos()->save(new Cuento([
            'title' => Input::get('title'),
            'name' => Input::get('name'),
            'category' => Input::get('category'),
            'age' => Input::get('age'),
            'state' => Input::get('state'),
            'text' => Input::get('text'),

        ]));

        //////SUBIR IMAGENES///////
        if(Input::hasfile('image')){
               foreach(Input::file('image') as $image){
                   $imagename =time().str_random(5).$image->getClientOriginalName();
                   $upload_flag=$image->move('public/cuentos_images',$imagename);
                       if($upload_flag){
                           $cuento->images()->save(new Image([
                                'path'=>$imagename
                           ]));
                       }else{

                       }
               }
        }else{
            $cuento->images()->save(new Image([
                'path'=>'imagen_nodisponible.jpg'
            ]));
        }
      return Redirect::back()->with('mensaje_request','<span class=success_message>Cuento Registrado Correctamente</span>');

    }
    ///////////////////////////////////////////EDIT CUENTO////////////////////////////////////
    public function edit_cuento_index($cuento_id){
        $cuento=Cuento::find($cuento_id);
        return View::make('admin.account.Admin.edit_cuento',['cuento'=>$cuento]);
    }
    public function edit_cuento($cuento_id){
        $cuento=Cuento::find($cuento_id);
        $cuento->title=Input::get('title');
        $cuento->name=Input::get('name');
        $cuento->category=Input::get('category');
        $cuento->age=Input::get('age');
        $cuento->state=Input::get('state');
        $cuento->save();
        //IF HAS IMAGE FILE//
        if(Input::hasfile('image')){
            foreach($cuento->images as $images){
                File::delete('public/cuentos_images/'.$images->path);
                $images->delete();
            }
            foreach(Input::file('image') as $image){
                $imagename =time().str_random(5).$image->getClientOriginalName();
                $upload_flag=$image->move('public/cuentos_images',$imagename);
                if($upload_flag){
                    $cuento->images()->save(new Image([
                        'path'=>$imagename
                    ]));
                }else{

                }
            }


        } //END IF HAS IMAGE FILE//



        return Redirect::back()->with('mensaje_request','<span class=success_message>Cuento Actualizado Correctamente</span>');
    }
    //////////////////////////////////////////DELETE CUENTO/////////////////////////////////
    public function delete_cuento(){
        $cuento=Cuento::find(Input::get('id_cuento'));
        foreach($cuento->images as $images){
            File::delete('public/cuentos_images/'.$images->path);
            $images->delete();
        }
        $cuento->delete();
        return '<span class=success_message>Cuento eliminado</span>';
            //return 'borrado';
    }
//////////////////////////////////////////EDIT ADMIN////////////////////////////////
    public function edit_admin_index($user_id){
        $user=User::find($user_id);
        return View::make('admin.account.Admin.edit_admin',['user'=>$user]);
        //return View::make('admin.account.Admin.edit_user');
    }
    public function edit_admin($user_id){
        $user=User::find($user_id);
        $user->details->name=Input::get('name');
        $user->details->lastname=Input::get('lastname');
        $user->details->save();

        return Redirect::back()->with('mensaje_request','<span class=success_message>Administador Actualizado Correctamente</span>');
        //return View::make('admin.account.Admin.edit_user');
    }

//////////////////////////////////////////EDIT JUEZ////////////////////////////////
    public function edit_juez_index($user_id){
            $user=User::find($user_id);
        return View::make('admin.account.Admin.edit_juez',['user'=>$user]);
        //return View::make('admin.account.Admin.edit_user');
    }
    public function edit_juez($user_id){
        $user=User::find($user_id);
        $user->details->name=Input::get('name');
        $user->details->lastname=Input::get('lastname');
        $user->details->save();

        return Redirect::back()->with('mensaje_request','<span class=success_message>Juez Actualizado Correctamente</span>');
        //return View::make('admin.account.Admin.edit_user');
    }

  /////////////////////////EDIT PADRES o DOCTOREES////////////////
    public function edit_pd_index($user_id){
        $user=User::find($user_id);
        return View::make('admin.account.Admin.edit_pd',['user'=>$user]);
        //return View::make('admin.account.Admin.edit_user');
    }
    public function edit_pd($user_id){
        $user=User::find($user_id);

        $user->details->name=Input::get('name');
        $user->details->lastname=Input::get('lastname');
        $user->details->phone=Input::get('phone');
        $user->details->mobile=Input::get('mobile');
        $user->details->institution=Input::get('select_institution');
        $user->details->address=Input::get('address');
        $user->details->rol=Input::get('select_type');
        $user->details->save();

        return Redirect::back()->with('mensaje_request','<span class=success_message>Usuario Actualizado Correctamente</span>');
        //return View::make('admin.account.Admin.edit_user');
    }







/////////////////////////////DELETE USER///////////////////
     public function delete_user(){


        $user=User::find(Input::get('id_user'));
         if($user->delete()){
             return '<span class=success_message>Usuario eliminado</span>';
         }else{
             return '<span class=error_message>Error al tratar de eliminar</span>';
         }


     }



}
