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
        $cuentos=Cuento::paginate(6);
        return View::make('kids.cuentos',['cuentos'=>$cuentos,'count'=>0]);
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
