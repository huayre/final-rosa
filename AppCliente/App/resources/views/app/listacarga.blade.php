@extends('app.plantilla')
@section('contenido')

    <div class="row">
        <div class="col-md-6">
            <h3 class="text-primary text-center">Productos Sensibles</h3>
            <table class="table">
                <thead class="table-primary">
                <tr>
                    <th>Orden</th>
                    <th>Descripción</th>
                    <th>Destino</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listacarga as $p)
                    @if($p->tipo==1)
                        <tr>
                            <td>
                                <small class="badge badge-danger">{{$loop->index+1}}</small>
                            </td>
                            <td>{{$p->descripcion}}</td>
                            <td>{{$p->destino}}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3 class="text-primary text-center">Productos Resistentes</h3>
            <table class="table">
                <thead class="table-primary">
                <tr>
                    <th>Orden</th>
                    <th>Descripción</th>
                    <th>Destino</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listacarga as $p)
                    @if($p->tipo==2)
                        <tr>
                            <td>
                                <small class="badge badge-danger">{{$loop->index+1}}</small>
                            </td>
                            <td>{{$p->descripcion}}</td>
                            <td>{{$p->destino}}</td>
                        </tr>
                    @endif
                        @endforeach
                </tbody>
            </table>
        </div>
        </div>

    </div>

@endsection

