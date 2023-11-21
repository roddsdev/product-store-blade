@extends('templates.main')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{route ('products.store')}}">
        <div class="d-flex justify-content-between align-items-center"> 
            <div class="fs-3">Adicionar produto</div>
        </div>
        <hr>
        {{ csrf_field() }}
        <div class="mb-3">
            @php ($inputName = 'dsProduct')
            <label for="{{ $inputName }}" class="form-label">Descrição</label>
            <input type="text" class="form-control @error($inputName) is-invalid @enderror" name="{{ $inputName }}">
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            @php ($inputName = 'price')
            <label for="{{ $inputName }}" class="form-label">Preço</label>
            <input type="number" class="form-control @error($inputName) is-invalid @enderror" name="{{ $inputName }}">
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            @php ($inputName = 'color')
            <label for="{{ $inputName }}" class="form-label">Cor</label>
            <input type="color" class="form-control form-control-color @error($inputName) is-invalid @enderror" name="{{ $inputName }}" value="#FFFFFF" title="Escolha a cor">
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            @php ($inputName = 'weight')
            <label for="{{ $inputName }}" class="form-label">Peso</label>
            <input type="number" class="form-control @error($inputName) is-invalid @enderror" name="{{ $inputName }}">
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            @php ($inputName = 'manufacturer_id')
            <label for="{{ $inputName }}" class="form-label">Marca</label>
            <br>
            <select class="selectpicker w-100 @error($inputName) is-invalid @enderror" name="{{ $inputName }}">
                <option value="">Selecione uma opção</option>
                @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->dsManufacturer }}</option>
                @endforeach
            </select>
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            @php ($inputName = 'categories')
            <label for="{{ $inputName }}" class="form-label">Categorias</label>
            <br>
            <select class="selectpicker w-100 @error($inputName) is-invalid @enderror" multiple name="{{ $inputName }}[]" placeholder="Selecione uma ou mais opções">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->dsCategory }}</option>
                @endforeach
                <option value="error">Categoria inválida</option>
            </select>
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>    
    </form>
    
@endsection