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
        switch($category){
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
        }
        //$historias=Historia::paginate(4);
        return View::make('doctores.historias',['historias'=>$historias]);
    }
    public function videos()
    {
        return View::make('doctores.videos');
    }
    public function bases()
    {
        return View::make('doctores.bases');
    }


}
