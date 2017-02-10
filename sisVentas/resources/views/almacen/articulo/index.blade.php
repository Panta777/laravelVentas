@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Articulos <a href="articulo/create"><button class="btn btn-success">Nuevo Articulo</button></a></h3>
        @include('almacen.articulo.search')
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Opciones</th>
                </thead>
                @foreach ($articulos as $arti)
                <tr>
                    <td>{{ $arti->idarticulo}}</td>
                    <td>{{ $arti->nombre}}</td>
                    <td>{{ $arti->codigo}}</td>
                    <td>{{ $arti->categoria}}</td>
                    <td>{{ $arti->stock}}</td>
                    <td>
                        <img src="{{asset('imagenes/articulos/'.$arti->imagen)}}" alt = "{{$arti->nombre}}" height="100px" width="100px" class = "img-thumbnail">
                    </td>
                    <td>{{ $arti->estado}}</td>
                    <td>
                        <a href="{{URL::action('ArticuloController@edit',$arti->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$arti->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                @include('almacen.articulo.modal')
                @endforeach
            </table>
        </div>
        {{$articulos->render()}}
    </div>
</div>

@endsection