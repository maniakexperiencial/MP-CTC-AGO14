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
        $cuentos=Cuento::paginate(8);
        return View::make('admin.account.Admin.cuentos',['cuentos'=>$cuentos]);
    }

    public function historias()
    {
        $user=User::all();
        $historias=Historia::paginate(4);
        return View::make('admin.account.Admin.historias',['historias'=>$historias]);
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
        $report=array();
        /*NIÑOS*/
        $report[]=array('Nombre','Nombre del Cuento','Edad','Categoria','Estado','Calificacion','Views','Likes');
        $cuentos=Cuento::all();
        foreach($cuentos as $cuento){
            $user=User::where('id','=',$cuento->user_id)->first();
            $average=Preselect::where('type','=','0')->where('status','=','1')->where('document_id','=',$cuento->id)->groupBy('document_id')->avg('average');
            $views=$cuento->views->count();
            $likes=$cuento->likes->count();
            $report[]=array($cuento->name,$cuento->title,  $cuento->age, $cuento->category , $cuento->state,$average,$views, $likes);
        }
        /*PAPAS*/
        $report[]=array(' ',' ',' ',' ',' ',' ');
        $report[]=array(' ',' ',' ',' ',' ',' ');

        $report[]=array('Nombre','Nombre de la Historia','Teléfono','Correo','Estado','Calificacion');
        $historias=Historia::all();
        foreach($historias as $historia){
            $user=User::where('id','=',$historia->user_id)->first();

            if($historia->category=='padres'){
                $average=Preselect::where('type','=','1')->where('status','=','1')->where('document_id','=',$historia->id)->groupBy('document_id')->avg('average');
                $report[]=array($user->details->name,$historia->title,$user->details->phone,$user->email,$historia->state,$average);
            }



        }
        /*DOCTORES*/
        $historias=Historia::all();
        $report[]=array(' ',' ',' ',' ',' ',' ',' ');
        $report[]=array(' ',' ',' ',' ',' ',' ',' ');
         $report[]=array('Nombre','Nombre de la Historia','Teléfono','Correo','Estado','Calificacion','Institucion');
        foreach($historias as $historia){
            $user=User::where('id','=',$historia->user_id)->first();

            if($historia->category=='doctores'){
                $average=Preselect::where('type','=','1')->where('status','=','1')->where('document_id','=',$historia->id)->groupBy('document_id')->avg('average');
                $report[]=array($user->details->name,$historia->title,$user->details->phone,$user->email,$historia->state,$average,$user->details->institution);
            }



        }

        //return $report[0];
            ////////////MAKE DOCUMENT//////////

        $file = fopen(base_path().'/public/documents/d_reporte.csv','w');
        foreach ($report as $row) {

            fputcsv($file, $row);
        }
        fclose($file);
        return Response::download(base_path().'/public/documents/d_reporte.csv');

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
        $cuento->text=Input::get('text');
        $cuento->save();
        //IF HAS IMAGE FILE//
        if(Input::hasfile('image')){
            foreach($cuento->images as $images){
                if($images->path=='imagen_nodisponible.jpg'){

                }else{
                    File::delete('public/cuentos_images/'.$images->path);
                }
                //File::delete('public/cuentos_images/'.$images->path);
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
            if($images->path=='imagen_nodisponible.jpg'){

            }else{
                File::delete('public/cuentos_images/'.$images->path);
            }

            //File::delete('public/cuentos_images/'.$images->path);
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


//////////////////////DETALLE PRESELECT///////////////
public function detalle_preselect($type,$document_id){

 return View::make('admin.account.Admin.preselect_detail',['type'=>$type,'document_id'=>$document_id]);
}

/////////////////////////////////DELETE HISTORIA//////////////////////////////////////
public function delete_historia(){
    $historia=Historia::find(Input::get('id_historia'));
    $historia->delete();
    return '<span class=success_message>Historia eliminada</span>';
}
////////////////////////////EDIT HISTORIA///////////////////////
public function edit_historia_index($idhistoria){
    $historia=Historia::find($idhistoria)->first();
    return View::make('admin.account.Admin.edit_historia',['historia'=>$historia]);
}
public function edit_historia($historia_id){
    $historia=Historia::find($historia_id);
    $historia->title=Input::get('title');
    $historia->name=Input::get('name');
    $historia->state=Input::get('state');
    $historia->text=Input::get('text');
    $historia->save();
    return Redirect::back()->with('mensaje_request','<span class=success_message>Historia Actualizada Correctamente</span>');
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
