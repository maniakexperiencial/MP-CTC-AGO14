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
        <h1 class="pagetitle">Videos</h1>
        <h3 class="pagesubtitle">Agregar nuevo video</h3>
        <span class="pagedesc"></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        @if (Session::has('mensaje_request'))
        {{ Session::get('mensaje_request') }}
        @endif
            <!--FORM-->
             <div class="form_wrap">
                    <div class="form_blue" style="height: 400px; margin-bottom: 0px;">

                        {{ Form::open(['route' => ['edit_video_route',$video->id]]) }}
                                <div class="form_white" style="width: 100%; float: none;">
                                        <div class="form_center">



                                            <div class="form-group">
                                                {{Form::label('title', 'Escribe el Titulo del Cuento', ['class' => 'cuento_label']) }}
                                                {{Form::text('title', $video->title, ['class' => 'cuento_input','id'=>'name']) }}
                                                {{$errors->first('title',"<span class=error>:message</span>")}}
                                            </div>

                                            <div class="form-group">
                                                {{Form::label('name', 'Nombre', ['class' => 'cuento_label_sub']) }}
                                                {{Form::text('name',  $video->name, ['class' => 'cuento_input','id'=>'name']) }}
                                                {{$errors->first('name',"<span class=error>:message</span>")}}
                                            </div>

                                            <div class="form-group">
                                                {{Form::label('category', 'Categoria', ['class' => 'cuento_label_sub']) }}
                                               <!-- {{Form::select('category',['6-7' => '6-7', '8-12' => '8-12'], ' $video->category',['class'=>'cuento_input', 'id'=>'category'])}}-->
                                                {{Form::select('category',['niños' => 'niños', 'papas' => 'papas','doctores'=>'doctores','evento de premiación'=>'evento de premiación'],$video->category,['class'=>'cuento_input', 'id'=>'category'])}}
                                            </div>

                                            <div class="form-group">
                                                {{Form::label('age', 'Edad', ['class' => 'cuento_label_sub']) }}
                                                {{Form::text('age',  $video->age, ['class' => 'cuento_input','id'=>'age']) }}
                                                {{$errors->first('age',"<span class=error>:message</span>")}}
                                            </div>


                                            <div class="form-group">
                                                {{Form::label('state', 'Estado', ['class' => 'cuento_label_sub']) }}
                                                {{Form::text('state',  $video->state, ['class' => 'cuento_input','id'=>'state']) }}
                                                {{$errors->first('state',"<span class=error>:message</span>")}}
                                            </div>



                                            <div class="form-group">
                                                {{Form::label('code', 'link(URL) del video', ['class' => 'cuento_label_sub']) }}
                                                {{Form::text('code', 'https://www.youtube.com/watch?v='.$video->code, ['class' => 'cuento_input','id'=>'video']) }}
                                                {{$errors->first('state',"<span class=error>:message</span>")}}
                                            </div>











                                        </div>

                                </div>





                        <div  class="form_btnwrap">
                            <a href="{{ URL::route('videos_admin') }}"><div class="signup_backbtn" >Regresar</div></a>

                            <button >Subir</button>
                        </div>

                        {{Form::close()}}
                    </div>

             </div>
    </div><!--contentwrapper-->
</div><!-- centercontent -->
@stop

@section('jscode')
<script type="text/javascript">
jQuery(document).ready(function(){
   jQuery('#m_videos').addClass('active');

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
        jQuery('.Image_preview').css({'background-image': 'url('+ e.target.result +')'});
        // if there are more files run the file reader again
        if (i < numFiles) {
            i++;
            readFile();
        }
    };

});
</script>
@stop