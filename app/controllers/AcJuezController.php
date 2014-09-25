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

    public function historia($category="no"){

        $user=User::all();

        switch($category){
            case 'padres':
            case 'doctores':
                $historias=Historia::orderBy('id', 'DESC')->where('category','=',$category)->paginate(4);
                break;
            case 'todos':
                $historias=Historia::orderBy('id', 'DESC')->paginate(4);
                break;
            default:
                $historias=Historia::orderBy('id', 'DESC')->paginate(4);
                break;
        }

        /*$historias=Historia::orderBy('id', 'DESC')->paginate(4);*/
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

    public function evaluate_chindex($documentid,$type){
           $preselect=Preselect::where('document_id','=',$documentid)->where('type','=',$type)->first();
            return View::make('admin.account.Juez.edit_eval',['preselect'=>$preselect]);
        /*return $preselect->eval1.$preselect->eval2.$preselect->eval3;*/

    }
     public function evaluate_change($preselect_id){
         $validator = Validator::make(array('id'=>$preselect_id), array(
             'id'=>'exists:preselects,id',

         ));
         if(!$validator->fails()){
             $user_auth=Auth::user();
             $average=(Input::get('eval1')+Input::get('eval2')+Input::get('eval3'))/3;
             $preselect=Preselect::where('id','=',$preselect_id)->first();
             $preselect->eval1=Input::get('eval1');
             $preselect->eval2=Input::get('eval2');
             $preselect->eval3=Input::get('eval3');
             $preselect->status=1;
             $preselect->average=$average;
             $preselect->save();
             return Redirect::back()->with('mensaje_request','<span class=success_message>Evaluación Actualizada Correctamente</span>');
         }
         return Redirect::back()->with('mensaje_request','<span class=error>Evaluación Erronea</span>');
     }



}
