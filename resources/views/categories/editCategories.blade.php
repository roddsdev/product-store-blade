@extends('templates.main')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center"> 
        <div class="fs-3">Editar marca</div>
    </div>
    <hr>
    <form method="post" action="{{route ('categories.update', $category)}}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="mb-3">
            @php ($inputName = 'dsCategory')
            <label for="{{ $inputName }}" class="form-label">Descrição</label>
            <input type="text" class="form-control @error($inputName) is-invalid @enderror" name="{{ $inputName }}" value="{{ $category->dsCategory }}">
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>    
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
    
@endsection