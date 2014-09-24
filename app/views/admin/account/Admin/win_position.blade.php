@extends('admin.account.Admin.layout')

@section('scripts')


{{ HTML::script('http://code.jquery.com/jquery-latest.min.js') }}


{{ HTML::style('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css', array('media' => 'screen')) }}
{{ HTML::script('http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js') }}

{{ HTML::style('css/plugins/styledataTables.css', array('media' => 'screen')) }}
@stop

@section('content')
<div class="centercontent tables">
    <div class="pageheader notab">
        <h1 class="pagetitle">Participante</h1>
        <h3 class="pagesubtitle">Lugar del Participante<br/>
            <?php
                if($type==0){
                    $cuento=Cuento::find($document_id);
                    echo 'Cuento:'.$cuento->title;
                }else{
                    $historia=Historia::find($document_id);
                    echo 'Historia:'.$historia->title;
                }

            ?>
        </h3>
        <span class="pagedesc"></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper" >
        @if (Session::has('mensaje_request'))
        {{ Session::get('mensaje_request') }}
        @endif
            <!--FORM-->
             <div class="form_wrap" style="width: 250px">
                 {{ Form::open(array('route' => array('position_win',$type,$document_id))) }}


                 <div class="form-group" style="text-align: center;">
                     {{Form::label('win_position', 'Lugar del Participante', ['class' => 'login_label']) }}
                     <input style="width: 25%!important" type="number" min="1" name="win_position" class="signup_blue" id="win_position">

                     {{$errors->first('name',"<span class=error>:message</span>")}}
                 </div>


                 <div  class="form_btnwrap">
                 <a href="{{ URL::route('finalist_admin') }}"><div class="signup_backbtn" >Cancelar</div></a>

                 <button >Guardar</button>
                 </div>




                 {{Form::close()}}
             </div>
    </div><!--contentwrapper-->
</div><!-- centercontent -->
@stop

@section('jscode')
<script type="text/javascript">

</script>
@stop