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
	public function cuentos()
	{
        return View::make('kids.cuentos');
	}
    public function videos()
    {
        return View::make('kids.videos');
    }
    public function bases()
    {
        return View::make('kids.bases');
    }


}
