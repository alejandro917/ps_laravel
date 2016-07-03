@extends('layout')

@section('content')
    <div id="FacturaController">

        <div id="form-factura" v-if="edit" class="panel panel-default">
            <div class="panel-heading">
                <div class="clearfix">
                    <span class="panel-title">Crear Factura</span>
            <a @click="back" class="btn btn-success pull-right">Atras</a>
                </div>
            </div>
            <div class="panel-body">
                @include('facturas.form')
            </div>
            <div class="panel-footer">
                <a href="{{route('facturas.index')}}" class="btn btn-default">CANCEL</a>
                <button @click="addNewFactura" class="btn btn-success">CREAR</button>
                <button @click="EditFactura(dFactura.id)" class="btn btn-success">GUARDAR</button>
               </div>
        </div>

        <div id="list-factura" v-if="list"  class="panel panel-default">
            <div class="panel-heading">
        <div class="clearfix">
            <span class="panel-title">
                Facturas
            </span>
            <a @click="blankFactura" class="btn btn-success pull-right">Crear</a>
        </div>
    </div>
    <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <th>Factura No</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Emisión</th>
                    <th>Estado</th>
                    <th >Created at</th>
                    <th >Acción</th>
                </thead>
                <tbody>
                    <tr v-for="factura in facturas">
                            <td>@{{factura.factura_id}}</td>
                            <td>@{{factura.id_cliente}}</td>
                            <td>@{{factura.total_factura}}</td>
                            <td>@{{factura.fecha_factura}}</td>
                            <td>@{{factura.estado_factura}}</td>
                            <td>@{{factura.created_at->diffForHumans()}}</td>
                            <td>
                                <button class="btn btn-default btn-sm" @click="ShowFactura(factura.id)">Editar</button>
                                <button class="btn btn-danger btn-sm" @click="DescargarFactura">Descargar</button>
                            </td>
                        </tr>
                </tbody>
            </table>

<!--
        <div class="factura-empty">
            <p class="factura-empty-title">
                No se han creado facturas
                <a href="{{route('facturas.create')}}">Crea la primera factura</a>
            </p>
        </div>

-->
        </div>
    </div>
    </div>

@endsection
@push('scripts')
<script src="js/vendor.js"></script>
<script src="js/jspdf.min.js"></script>
<script src="js/script.js"></script>
@endpush