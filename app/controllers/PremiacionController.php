<?php

class PremiacionController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
    public function index()
    {
        return View::make('premiacion.index');
    }
    public function ganadores()
    {
        return View::make('premiacion.ganadores');
    }
    public function galeria()
    {
        return View::make('premiacion.galeria');
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

        return View::make('premiacion.videos',['videos'=>$videos,'count'=>0]);
    }
    public function resumen()
    {
        return View::make('premiacion.resumen');
    }


}
