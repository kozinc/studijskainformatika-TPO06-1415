@extends('app')

@section('content')
    <form class="form" action="" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $student->id }}">

        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" value="{{ $student->ime }}">

        <label for="priimek">Priimek:</label>
        <input type="text" name="priimek" id="priimek" value="{{ $student->priimek }}">

       <a href="{{ action('StudentController@predmetnik',['id'=>$student->id]) }}">Predmetnik</a>
@endsection