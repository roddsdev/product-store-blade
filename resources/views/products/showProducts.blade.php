@extends('templates.main')
@section('content')
    <div class="row pb-3">
        <div class="col-md-12 pb-3">
            <div class="d-flex justify-content-between align-items-center"> 
                <div class="fs-3">Sobre o produto</div>
            </div>
            <hr>
            <p>Descrição: {{$product->dsProduct}}</p>
            <p>Preço: R$ {{number_format($product->price, 2, ',', '.')}}</p>
            <p>Marca: {{$product->manufacturer->dsManufacturer}}</p>
            <p>Cor: <label style="width:18px; height:18px; background-color:{{$product->color}};"></label></p>
        </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center"> 
                <div class="fs-5">Categorias associadas</div>
            </div>
            <hr>
            @foreach ($product->categories as $category)
                <p class="d-flex align-items-center">{{$category->dsCategory}}</p>                
            @endforeach
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>    
@endsection