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
        <div class="fs-3">Editar produto</div>
    </div>
    <hr>
    <form method="post" action="{{ route('products.update', $product) }}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="mb-3">
            @php ($inputName = 'dsProduct')
            <label for="{{ $inputName }}" class="form-label">Descrição</label>
            <input type="text" class="form-control @error($inputName) is-invalid @enderror" name="{{ $inputName }}" value="{{ $product->dsProduct }}">
            @error ($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            @php ($inputName = 'price')
            <label for="{{ $inputName }}" class="form-label">Preço</label>
            <input type="number" class="form-control @error($inputName) is-invalid @enderror" name="{{ $inputName }}" value="{{ $product->price }}">
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            @php ($inputName = 'color')
            <label for="{{ $inputName }}" class="form-label">Cor</label>
            <input type="color" class="form-control form-control-color @error($inputName) is-invalid @enderror" name="{{ $inputName }}" value="{{ $product->color }}" title="Escolha a cor">
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            @php ($inputName = 'weight')
            <label for="{{ $inputName }}" class="form-label">Peso</label>
            <input type="number" class="form-control @error($inputName) is-invalid @enderror" name="{{ $inputName }}" value="{{ $product->weight }}">
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            @php ($inputName = 'manufacturer_id')
            <label for="{{ $inputName }}" class="form-label">Marca</label>
            <select class="selectpicker w-100 @error($inputName) is-invalid @enderror" name="{{ $inputName }}">
                @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}" @if ($product->manufacturer_id == $manufacturer->id) selected  @endif>{{ $manufacturer->dsManufacturer }}</option>
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
                    <option value="{{ $category->id }}" 
                        @foreach ($product->categories as $productCategory) 
                            @if ($productCategory->id == $category->id) selected @endif 
                        @endforeach
                        >
                        {{ $category->dsCategory }}
                    </option>
                @endforeach
                <option value="error">Categoria inválida</option>
            </select>
            @error($inputName)
                <div class="form-text  text-red">{{ $message }}</div>
            @enderror
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>    
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
@endsection