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
    public function videos()
    {
        return View::make('premiacion.videos');
    }
    public function resumen()
    {
        return View::make('premiacion.resumen');
    }


}
