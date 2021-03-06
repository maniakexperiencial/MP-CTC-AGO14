@extends('admin.account.Pd.layout')

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
                 {{ Form::open(['route' => 'create_historia_route','files'=>true]) }}
                    <div class="form_blue" style="height:auto;margin-bottom: 0px;">


                        <div class="form_white" style="height: auto;padding: 10px 0px;width:100%;float:none;" >
                                <div class="form_center" style="height: auto;" >



                                    <div class="form-group" style="margin-top: 0%">
                                        {{Form::label('title', 'Escribe el Titulo de la Historia', ['class' => 'cuento_label']) }}
                                        {{Form::text('title', null, ['class' => 'cuento_input','id'=>'name']) }}
                                        {{$errors->first('title',"<span class=error>:message</span>")}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('name', 'Nombre', ['class' => 'cuento_label_sub']) }}
                                        {{Form::text('name', null, ['class' => 'cuento_input','id'=>'name']) }}
                                        {{$errors->first('name',"<span class=error>:message</span>")}}
                                    </div>





                                    <div class="form-group">
                                        {{Form::label('state', 'Estado', ['class' => 'cuento_label_sub']) }}

                                        <?php
                                        $states = State::lists('state','state');
                                        ?>
                                        {{Form::select('state',$states, null,['class'=>'cuento_input','id'=>'state'])}}

                                        <!--{{Form::text('state', null, ['class' => 'cuento_input','id'=>'state']) }}-->
                                        {{$errors->first('state',"<span class=error>:message</span>")}}
                                    </div>













                                </div>

                        </div>
                        <div class="form-group">
                            <div class="cuento_escribe">{{Form::label('text', 'Escribe tu historia') }}</div>
                            {{Form::textarea('text', null, ['class' => 'cuento_textarea','id'=>'text']) }}
                            {{$errors->first('text',"<span class=error>:message</span>")}}
                        </div>




                    </div>
                 <div  class="form_btnwrap">
                     <a href="{{ URL::route('cuentos_admin') }}"><div class="signup_backbtn" >Regresar</div></a>

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
   jQuery('#m_usuario').addClass('active');

////////////////////////////FILE READER/////////////////////////
    jQuery("#select_image").change(function (){
            i=0,
            numFiles = 0,
            imageFiles;
        imageFiles = document.getElementById('select_image').files
        // get the number of files
        numFiles = imageFiles.length;
        readFile();
    });

    // set up variables
    var reader = new FileReader(),
        i=0,
        numFiles = 0,
        imageFiles;

// use the FileReader to read image i
    function readFile() {
        reader.readAsDataURL(imageFiles[i])
    }

// define function to be run when the File
// reader has finished reading the file
    reader.onloadend = function(e) {
        // make an image and append it to the div
        /*var image = $('<img>').attr('src', e.target.result);
        jQuery(image).appendTo('#images');*/
        jQuery('#number_files').html('('+numFiles+')');
        jQuery('.form_white').css({'background-image': 'url('+ e.target.result +')'});
        // if there are more files run the file reader again
        if (i < numFiles) {
            i++;
            readFile();
        }
    };

});
</script>
@stop