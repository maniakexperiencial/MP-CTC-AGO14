@extends('layout')
@section('bg_move')
<div class="bg"></div>
<div class="bg_adition">

</div>
@stop
@section('title_section')

<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop

@section('content_center')
<img  src="{{ URL::to('/img/5concurso.png') }}">
@stop

@section('contest1')
<img  src="{{ URL::to('/img/4concurso.png') }}">
@stop

@section('contest2')
<img  src="{{ URL::to('/img/4concurso.png') }}">
@stop


@section('contest3')
<img  src="{{ URL::to('/img/3concurso.png') }}">
@stop

@section('contest4')
<img  src="{{ URL::to('/img/4concurso.png') }}">
@stop