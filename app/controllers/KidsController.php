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
	public function cuentos($category = 0)
	{
        switch($category){
            case 6:
                $filter='6-7';
                $cuentos=Cuento::where('category','=',$filter)->paginate(6);
                break;
            case 8:
                $filter='8-12';
                $cuentos=Cuento::where('category','=',$filter)->paginate(6);
                break;
            default:
                $cuentos=Cuento::paginate(6);
                break;
        }

        //$cuentos=Cuento::paginate(6);
        return View::make('kids.cuentos',['cuentos'=>$cuentos,'count'=>0]);
        //return $category;
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
