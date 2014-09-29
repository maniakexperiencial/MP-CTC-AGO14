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
    public function ganadores($category=3)
    {
        /*$category="6-7";
        $category="8-12";
        $category="8-12";*/

        switch($category){
            case '6-7':
            case '8-12':
                $cuento1=Cuento::where('place','=',1)->where('category','=',$category)->first();
                $cuento2=Cuento::where('place','=',2)->where('category','=',$category)->first();
                $cuento3=Cuento::where('place','=',3)->where('category','=',$category)->first();
                $cuento4=Cuento::where('place','=',4)->where('category','=',$category)->first();
                $cuento5=Cuento::where('place','=',5)->where('category','=',$category)->first();
                return View::make('premiacion.ganadores',[
                    'winner1a'=>$cuento1,
                    'winner2a'=>$cuento2,
                    'winner3a'=>$cuento3,
                    'winner4a'=>$cuento4,
                    'winner5a'=>$cuento5,
                    'type'=>0
                ]);
                break;

            case 'papas':
            case 'doctores':
                    $historia1=Historia::where('place','=',1)->where('category','=',$category)->first();
                    $historia2=Historia::where('place','=',2)->where('category','=',$category)->first();
                    $historia3=Historia::where('place','=',3)->where('category','=',$category)->first();
                    $historia4=Historia::where('place','=',4)->where('category','=',$category)->first();
                    $historia5=Historia::where('place','=',5)->where('category','=',$category)->first();
                    return View::make('premiacion.ganadores',[
                        'winner1a'=>$historia1,
                        'winner2a'=>$historia2,
                        'winner3a'=>$historia3,
                        'winner4a'=>$historia4,
                        'winner5a'=>$historia5,
                        'type'=>1
                    ]);
                break;

            default:
                $category="6-7";
                $cuento1=Cuento::where('place','=',1)->where('category','=',$category)->first();
                $cuento2=Cuento::where('place','=',2)->where('category','=',$category)->first();
                $cuento3=Cuento::where('place','=',3)->where('category','=',$category)->first();
                $cuento4=Cuento::where('place','=',4)->where('category','=',$category)->first();
                $cuento5=Cuento::where('place','=',5)->where('category','=',$category)->first();
                return View::make('premiacion.ganadores',[
                    'winner1a'=>$cuento1,
                    'winner2a'=>$cuento2,
                    'winner3a'=>$cuento3,
                    'winner4a'=>$cuento4,
                    'winner5a'=>$cuento5,
                    'type'=>0
                ]);
                break;
        }


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
                /* $videos=Video::orderBy('id', 'DESC')->paginate(4);*/
                $videos=Video::where('category','=','evento de premiación')->orderBy('id', 'DESC')->paginate(4);
                break;
        }

        return View::make('premiacion.videos',['videos'=>$videos,'count'=>0]);
    }
    public function resumen()
    {
        return View::make('premiacion.resumen');
    }


}
