@extends('app.plantilla')
@section('contenido')
    <form method="post" action="{{route('crearencomienda')}}">
        @csrf
        <div class="row  p-3 mb-3">
            <div class="col-md-6">
                <label>Remitente</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="propietario">
                </div>

                <label>Destino</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="destino">
                </div>
            </div>

            <div class="col-md-6">
                <label>Costo Servicio</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="monto">
                </div>
                <label>Tipo de Ecomienda</label>
                <select class="form-control" name="tipo">
                    <option >Seleccione</option>
                    <option value="1">Frágil o Sensible</option>
                    <option value="2">Resistentes</option>
                </select>
                <label>Descripción del paquete</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="descripcion">
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">Crear</button>
        </div>

    </form>

    <table class="table">
       <thead class="table-primary">
       <tr>
           <th>Id</th>
           <th>Remitente</th>
           <th>Destino</th>
           <th>Precio Servicio</th>
       </tr>
       </thead>
        <tbody>
          @foreach($listaencomienda as $p)
              <tr>
                  <td>{{$p->id}}</td>
                  <td>{{$p->propietario}}</td>
                  <td>{{$p->destino}}</td>
                  <td>{{$p->monto}}</td>
              </tr>
          @endforeach
        </tbody>
    </table>
@endsection
