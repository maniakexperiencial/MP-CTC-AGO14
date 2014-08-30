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
        <span class="pagedesc"></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
            <!--HISTORIAS-->
        @foreach($users as $user)
                @foreach($user->historias as $historia)
                        <a href="#historia2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
                            <div class="historia_box">
                                <div class="historia_title">{{$historia->title}}</div>
                                <div class="historia_info">
                                    - {{$historia->name}}

                                </div>
                            </div>
                        </a>
                @endforeach
        @endforeach




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