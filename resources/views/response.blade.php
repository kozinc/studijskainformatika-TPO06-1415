@if($errors->any())
    <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
    </div>
@endif
@if(session()->has('odgovor'))
    <div class="alert alert-success" role="alert">
        {{ session('odgovor') }}
    </div>
@elseif(isset($odgovor))
    <div class="alert alert-success" role="alert">
        {{ $odgovor }}
    </div>
@endif