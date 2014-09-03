@extends('admin.account.Admin.layout')

@section('scripts')
{{ HTML::style('css/jquery.fancybox.css', array('media' => 'screen')) }}
{{ HTML::script('js/jquery.fancybox.js') }}
{{ HTML::script('/js/custom/tables.js') }}
{{ HTML::script('/js/plugins/jquery.dataTables.min.js') }}
@stop

@section('content')
<div class="centercontent tables">
    <div class="pageheader notab">
        <h1 class="pagetitle">Historias</h1>
        <h3 class="pagesubtitle">Agregar nuevo historia</h3>
        <span class="pagedesc"></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        @if (Session::has('mensaje_request'))
        {{ Session::get('mensaje_request') }}
        @endif
            <!--FORM-->
             <div class="form_wrap" style="height: auto;">
                 {{ Form::open(['route' => ['edit_historiaRoute',$historia->id]]) }}
                    <div class="form_blue" style="height:auto;margin-bottom: 0px;">


                        <div class="form_white" style="height: auto;padding: 10px 0px;" >
                                <div class="form_center" style="height: auto;" >



                                    <div class="form-group" style="margin-top: 0%">
                                        {{Form::label('title', 'Escribe el Titulo de la Historia', ['class' => 'cuento_label']) }}
                                        {{Form::text('title', $historia->title, ['class' => 'cuento_input','id'=>'name']) }}
                                        {{$errors->first('title',"<span class=error>:message</span>")}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('name', 'Nombre', ['class' => 'cuento_label_sub']) }}
                                        {{Form::text('name', $historia->name, ['class' => 'cuento_input','id'=>'name']) }}
                                        {{$errors->first('name',"<span class=error>:message</span>")}}
                                    </div>





                                    <div class="form-group">
                                        {{Form::label('state', 'Estado', ['class' => 'cuento_label_sub']) }}
                                        {{Form::text('state', $historia->state, ['class' => 'cuento_input','id'=>'state']) }}
                                        {{$errors->first('state',"<span class=error>:message</span>")}}
                                    </div>













                                </div>

                        </div>
                        <div class="form-group">
                            <div class="cuento_escribe">{{Form::label('text', 'Escribe tu historia') }}</div>
                            {{Form::textarea('text',$historia->text, ['class' => 'cuento_textarea','id'=>'text']) }}
                            {{$errors->first('text',"<span class=error>:message</span>")}}
                        </div>




                    </div>
                 <div  class="form_btnwrap">
                     <a href="{{ URL::route('historias_admin') }}"><div class="signup_backbtn" >Regresar</div></a>

                     <button >Subir</button>
                 </div>
                 {{Form::close()}}
             </div>
    </div><!--contentwrapper-->
</div><!-- centercontent -->
@stop

@section('jscode')
<script type="text/javascript">
jQuery(document).ready(function(){
   jQuery('#m_historias').addClass('active');



});
</script>
@stop