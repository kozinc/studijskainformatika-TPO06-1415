@extends('app')

@section('content')
<div class="container" style="width:300px; margin: auto; margin-top: 200px">
    {!! HTML::linkAction('HomeController@datoteka', 'Vnesi nove študente iz tekstovne datoteke', array(), array('class' => 'btn btn btn-danger')) !!}
    <br/><br/>
    {!! HTML::linkAction('ListStudentsController@get_all_students', 'Seznam vpisanih v predmet', array(), array('class' => 'btn btn btn-danger')) !!}
</div>
@endsection
