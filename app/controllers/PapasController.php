<?php

class PapasController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
    public function index()
    {
        return View::make('papas.index');
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
        return View::make('papas.historias',['historias'=>$historias]);
    }
    public function videos()
    {
        return View::make('papas.videos');
    }
    public function bases()
    {
        return View::make('papas.bases');
    }


}
