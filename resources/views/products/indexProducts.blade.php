@extends('templates.main')
@section('content')
    <div class="d-flex justify-content-between align-items-center">        
        <div class="fs-3">Lista de Produtos</div>
        <a href="{{ route('products.create') }}"><button class="btn btn-sm btn-primary">Adicionar</button></a>
    </div>
    <hr>
    <br>
    <form method="GET" action="{{route('products.index', 'buscar' )}}">
    <div class="row pb-3">
        <div class="col-md-12">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Digite a descrição, preço, peso e/ou marca do produto" name="buscar">
                <span class="input-group-btn">
                    <button class="btn btn-light" type="submit">Pesquisar</button>
                </span>
            </div>
        </div>
    </div>
    </form>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Cor</th>
                        <th>Peso</th>
                        <th>Marca</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                @if (isset($table))
                    @foreach($table as $itemTable)
                        <tr>
                            <td>{{$itemTable->dsProduct}}</td>
                            <td>{{number_format($itemTable->price, 2, ',', '.')}}</td>
                            <td><div style="width:100%; height:30px; background-color:{{$itemTable->color}};"></div></td>
                            <td>{{$itemTable->weight}}</td>
                            <td>{{$itemTable->manufacturer->dsManufacturer}}</td>
                            <td width="200px">
                                <a href="{{ route('products.show', $itemTable->id) }}" class="btn btn-light btn-sm"> Ver </a>
                                <a href="{{ route('products.edit', $itemTable->id) }}" class="btn btn-success btn-sm"> Editar </a>
                                <a data-bs-href="{{ route('products.destroy', $itemTable->id) }}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> Deletar </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="100%" class="text-center" style="background-color:#f2f2c3;"> Sem dados </td>
                    </tr>                            
                @endif
                </tbody>
            </table>
        </div>
    </div>

    @if (isset($table))
        <div class="d-flex justify-content-center">
            {!! $table->links() !!}
        </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="modal-destroy">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        Deseja realmente deletar o produto?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var hrefLink = button.getAttribute('data-bs-href')
            var modalForm = exampleModal.querySelector('#modal-destroy')
            modalForm.action = hrefLink
        })
    </script>
    
@endsection