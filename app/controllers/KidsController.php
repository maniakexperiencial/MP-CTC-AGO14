<?php

class KidsController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
    public function index()
    {
        return View::make('kids.index');
    }

    public function cuentos_filter(){




            if(Input::get('state')== '0'){

                    if(Input::get('category')==""){
                        $cuentos=Cuento::orderBy('id', 'DESC')->orderBy('id', 'DESC')->paginate(6);
                    }else{
                        $cuentos=Cuento::where('category','=',Input::get('category'))->orderBy('id', 'DESC')->paginate(6);
                    }

            }else{

                    if(Input::get('category')==""){
                        $cuentos=Cuento::where('state','=',Input::get('state'))->orderBy('id', 'DESC')->paginate(6);
                    }else{
                        $cuentos=Cuento::where('state','=',Input::get('state'))->where('category','=',Input::get('category'))->orderBy('id', 'DESC')->paginate(6);
                    }
            }

        /*$cuentos=Cuento::where('state','=',Input::get('state'))->where('category','=',Input::get('category'))->orderBy('id', 'DESC')->paginate(6);*/
       /* $cuentos=Cuento::where('state','=',Input::get('state'))->where('category','=',Input::get('category'))->orderBy('id', 'DESC')->paginate(6);*/
        return View::make('kids.cuentos',['cuentos'=>$cuentos,'count'=>0]);
    }
	public function cuentos($category = 3)
	{
        if($category==3){
            $cuentos=Cuento::orderBy('id', 'DESC')->paginate(6);
        }else{
            $cuentos=Cuento::where('state','=',$category)->orderBy('id', 'DESC')->paginate(6);
        }
       /* switch($category){
            case 6:
                $filter='6-7';
                $cuentos=Cuento::where('category','=',$filter)->orderBy('id', 'DESC')->paginate(6);
                break;
            case 8:
                $filter='8-12';
                $cuentos=Cuento::where('category','=',$filter)->orderBy('id', 'DESC')->paginate(6);
                break;
            default:
                $cuentos=Cuento::orderBy('id', 'DESC')->paginate(6);
                break;
        }*/

        //$cuentos=Cuento::paginate(6);
     /*  if(!Cookie::has('ip_virtual')){
            $value = Cookie::forever('ip_virtual', Request::getClientIp().str_random(6));
           return $value;
        }*/

        return View::make('kids.cuentos',['cuentos'=>$cuentos,'count'=>0]);
        //return $category;
	}

    public function cuentos_clasif(){
       /* if($category==3){
            $cuentos=Cuento::orderBy('id', 'DESC')->paginate(6);
        }else{
            $cuentos=Cuento::where('state','=',$category)->orderBy('id', 'DESC')->paginate(6);
        }
        return View::make('kids.cuentos',['cuentos'=>$cuentos,'count'=>0]);*/

    }

    public function videos($category=0)
    {
        switch($category){
            case 6:
                $filter='6-7';
                $videos=Video::where('category','=',$filter)->orderBy('id', 'DESC')->paginate(4);
                break;
            case 8:
                $filter='8-12';
                $videos=Video::where('category','=',$filter)->orderBy('id', 'DESC')->paginate(4);
                break;
            default:
               /* $videos=Video::orderBy('id', 'DESC')->paginate(4);*/
                $videos=Video::where('category','=','niños')->orderBy('id', 'DESC')->paginate(4);
                break;
        }
        return View::make('kids.videos',['videos'=>$videos,'count'=>0]);
    }
    public function bases($base=1)
    {
        if($base==1){
            $source='bases1.png';
            $page=1;
        }else{
            $page=2;
            $source='bases2.png';
        }

        /*$bases=['bases1'=>'base1.png','bases2'=>'base2.png']->paginate(1);*/

        return View::make('kids.bases',['source'=>$source,'page'=>$page]);
    }


}
