@extends('admin.account.Juez.layout')

@section('scripts')


{{ HTML::script('http://code.jquery.com/jquery-latest.min.js') }}


{{ HTML::style('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css', array('media' => 'screen')) }}
{{ HTML::script('http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js') }}

{{ HTML::style('css/plugins/styledataTables.css', array('media' => 'screen')) }}
@stop

@section('content')
<div class="centercontent tables">
    <div class="pageheader notab">
        <h1 class="pagetitle">Juez</h1>
        <h3 class="pagesubtitle">Editar Evaluación</h3>
        <span class="pagedesc"></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        @if (Session::has('mensaje_request'))
        {{ Session::get('mensaje_request') }}
        @endif
            <!--FORM-->
             <div class="form_wrap">
                 {{ Form::open(array('route' => array('evaluate_change',$preselect->id))) }}


                 <div class="form-group">
                     {{Form::label('eval1', 'Contenido', ['class' => 'login_label']) }}
                     {{Form::text('eval1', $preselect->eval1 , ['class' => 'signup_blue','id'=>'name']) }}
                     {{$errors->first('name',"<span class=error>:message</span>")}}
                 </div>
                 <div class="form-group">
                     @if($preselect->type==0)
                        {{Form::label('eval2', 'Originalidad', ['class' => 'login_label']) }}
                        @else
                        {{Form::label('eval2', 'Redacción', ['class' => 'login_label']) }}
                     @endif

                     {{Form::text('eval2', $preselect->eval2, ['class' => 'signup_blue','id'=>'lastname']) }}
                     {{$errors->first('lastname',"<span class=error>:message</span>")}}
                 </div>
                 <div class="form-group">
                     {{Form::label('eval3', 'Mensaje', ['class' => 'login_label']) }}
                     {{Form::text('eval3', $preselect->eval3, ['class' => 'signup_blue','id'=>'lastname']) }}
                     {{$errors->first('lastname',"<span class=error>:message</span>")}}
                 </div>

                 <div  class="form_btnwrap">
                 <a href="{{ URL::route('preselect_juez') }}"><div class="signup_backbtn" >Cancelar</div></a>

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