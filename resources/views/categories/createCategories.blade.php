@extends('templates.main')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{route ('categories.store')}}">
        <legend>Adicionar marca</legend>
        <hr>
        {{ csrf_field() }}
        <div class="mb-3">
            @php ($inputName = 'dsCategory')
            <label for="{{ $inputName }}" class="form-label">Descrição</label>
            <input type="text" class="form-control @error($inputName) is-invalid @enderror" name="{{ $inputName }}">
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>    
    </form>
    
@endsection