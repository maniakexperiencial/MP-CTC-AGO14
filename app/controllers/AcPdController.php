<?php

use Janssen\Forms\SignupForm;
use Janssen\Forms\LoginForm;
use Janssen\Forms\HistoriaForm;

class AcPdController extends Controller
{
    function __construct(HistoriaForm $historiaForm)
    {
            $this->historiaForm = $historiaForm;
    }


    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    public function index()
    {
        $user=User::all();
        $userauth=Auth::user();
        /*$historias=Historia::paginate(4);*/
        $historias=Historia::where('user_id','=',$userauth->id)->orderBy('id', 'DESC')->paginate(4);
        return View::make('admin.account.Pd.dashboard',['historias'=>$historias]);
    }

    public function profile_index(){
        $user=Auth::user();
        return View::make('admin.account.Pd.profile',['user'=>$user]);
        /*return 'hola';*/
    }
    public function edit_profile($iduser){
        $user=User::find($iduser);
        $user->details->name=Input::get('name');
        $user->details->lastname=Input::get('lastname');
        $user->details->address=Input::get('address');
        $user->details->phone=Input::get('phone');
        $user->details->mobile=Input::get('mobile');
        $user->details->save();
        return Redirect::back()->with('mensaje_request','<span class=success_message>Perfil Actualizado Correctamente</span>');
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
        $this->historiaForm->validate(Input::all());
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
        return Redirect::back()->with('mensaje_request','<span class=success_message>Historia Registrada Correctamente</span>');
    }

/////////////////////////////////DELETE HISTORIA//////////////////////////////////////
    public function delete_historia(){
        $userauth=Auth::user();

        $historia=Historia::find(Input::get('id_historia'))->first();
        if($userauth->id==$historia->user_id){
            $historia->delete();
        }else{
            return Redirect::back();
        }

        return '<span class=success_message>Historia eliminada</span>';
    }
////////////////////////////EDIT HISTORIA///////////////////////
    public function edit_historia_index($idhistoria){
        $userauth=Auth::user();

        $historia=Historia::find($idhistoria)->first();
        if($userauth->id==$historia->user_id){
            return View::make('admin.account.Pd.edit_historia',['historia'=>$historia]);
        }else {
            return Redirect::back();
        }

    }
    public function edit_historia($historia_id){
        $userauth=Auth::user();

        $historia=Historia::find($historia_id);

        if($userauth->id==$historia->user_id){
            $historia->title=Input::get('title');
            $historia->name=Input::get('name');
            $historia->state=Input::get('state');
            $historia->text=Input::get('text');
            $historia->save();
            return Redirect::back()->with('mensaje_request','<span class=success_message>Historia Actualizada Correctamente</span>');
        }else{
            return Redirect::back();
        }

    }


}
