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
        $cuentos=Cuento::orderBy('id', 'DESC')->paginate(8);
        return View::make('admin.account.Juez.cuentos',['cuentos'=>$cuentos]);
    }

    public function historia(){
        $user=User::all();
        $historias=Historia::orderBy('id', 'DESC')->paginate(4);
        return View::make('admin.account.Juez.historias',['historias'=>$historias]);
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
        $find=Preselect::where('user_id','=',$user->id)->where('document_id','=',Input::get('document_id'))->where('type','=',Input::get('type'))->first();
        if($find){
            return '';
        }else{
            $preselect= $user->preselects()->save(new Preselect([
                'document_id' => Input::get('document_id'),
                'type' => Input::get('type'),
            ]));
            return 'añadido';
        }
        /*$preselect= $user->preselects()->save(new Preselect([
            'document_id' => Input::get('document_id'),
            'type' => Input::get('type'),
        ]));*/

    }

    public function preselectDelete(){
        $user=Auth::user();
        $find=Preselect::where('user_id','=',$user->id)->where('document_id','=',Input::get('document_id'))->where('type','=',Input::get('type'))->where('status','=',1)->first();
        if($find){
            return '';
        }else{

            $preselect=Preselect::where('document_id','=',Input::get('document_id'))->where('type','=',Input::get('type'))->delete();

            return 'eliminado';
        }

    }

   public function evaluate(){
       ////////////////EVALUAR CUENTOS////////////////
       $user_auth=Auth::user();
       $average=(Input::get('evalcontent')+Input::get('evaloriginal')+Input::get('evalmensaje'))/3;
       $preselect=Preselect::where('document_id','=',Input::get('document_id'))->where('type','=',Input::get('type'))->where('user_id','=',$user_auth->id)->first();
        $preselect->eval1=Input::get('evalcontent');
       $preselect->eval2=Input::get('evaloriginal');
       $preselect->eval3=Input::get('evalmensaje');
       $preselect->status=1;
       $preselect->average=$average;
        $preselect->save();
       return  Input::get('document_id');
   }



}
