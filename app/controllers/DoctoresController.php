<?php

class DoctoresController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
    public function index()
    {
        return View::make('doctores.index');
    }
    public function historias($category = 3)
    {
        if($category==3){
            $historias=Historia::orderBy('id', 'DESC')->paginate(4);
        }else{
            $historias=Historia::where('state','=',$category)->orderBy('id', 'DESC')->paginate(4);
        }
        /*switch($category){
            case 'papas':
                $filter='padres';
                $historias=Historia::where('category','=',$filter)->orderBy('id', 'DESC')->paginate(4);
                break;
            case 'doctores':
                $filter='doctores';
                $historias=Historia::where('category','=',$filter)->orderBy('id', 'DESC')->paginate(4);
                break;
            case 3:
                $historias=Historia::orderBy('id', 'DESC')->paginate(4);
                break;
            default:
                $historias=Historia::orderBy('id', 'DESC')->paginate(4);
                break;
        }*/
        //$historias=Historia::paginate(4);
        return View::make('doctores.historias',['historias'=>$historias]);
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
                $videos=Video::orderBy('id', 'DESC')->paginate(4);
                break;
        }
        return View::make('doctores.videos',['videos'=>$videos,'count'=>0]);
    }
    public function bases()
    {
        return View::make('doctores.bases');
    }


}
