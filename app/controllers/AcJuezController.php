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
        $user=User::all();
        return View::make('admin.account.Juez.cuentos',['users'=>$user]);
    }

    public function preselect()
    {
        ///USUARIO JUEZ///
        $user=Auth::user();

        /*foreach($user->preselects as $preselect){
            $cuento= Cuento::where('id','=',$preselect->id);

        }*/
        return View::make('admin.account.Juez.preselect',['user'=>$user]);
    }

    public function finalist()
    {
        return View::make('admin.account.Juez.finalist');
    }

    public function preselectAdd(){
        $user=Auth::user();
        $preselect= $user->preselects()->save(new Preselect([
            'document_id' => Input::get('document_id'),
            'type' => Input::get('type'),
        ]));
            return 'añadido';
    }

    public function preselectDelete(){
        $preselect=Preselect::where('document_id','=',Input::get('document_id'))->where('type','=',Input::get('type'));
        $preselect->delete();
        return 'eliminado';
    }



}
