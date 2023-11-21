@extends('templates.main')
@section('content')
    <div class="row pb-3">
        <div class="col-md-12 pb-3">
            <div class="d-flex justify-content-between align-items-center"> 
                <div class="fs-3">Sobre a Categoria</div>
            </div>
            <hr>
            <p>Descrição: {{$category->dsCategory}}</p>
        </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center"> 
                <div class="fs-5">Produtos associados</div>
            </div>
            <hr>
            @foreach ($category->products as $product)
                <p class="d-flex align-items-center"><label style="width:18px; height:18px; background-color:{{$product->color}};"></label>&nbsp; {{$product->dsProduct}}</p>                
            @endforeach
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
@endsection