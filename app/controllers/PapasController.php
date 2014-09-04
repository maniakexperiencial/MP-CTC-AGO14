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
    public function historias()
    {
        $historias=Historia::paginate(4);
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
