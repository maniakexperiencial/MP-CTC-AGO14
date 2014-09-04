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
    public function historias()
    {
        $historias=Historia::paginate(4);
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
