@extends('layout')

@section('content')
    <div id="FacturaController">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="clearfix">
            <span class="panel-title">
                Facturas
            </span>
                    <a href="{{route('facturas.create')}}" class="btn btn-success pull-right">Crear</a>
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
                    <th colspan="2">Created at</th>
                    </thead>
                    <tbody>
                    <tr v-for="factura in facturas">
                        <td>@{{factura.numero_factura}}</td>
                        <td>@{{factura.id_cliente}}</td>
                        <td>@{{factura.total_factura}}</td>
                        <td>@{{factura.fecha_factura}}</td>
                        <td>@{{factura.estado_factura}}</td>
                        <td>@{{factura.created_at->diffForHumans()}}</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
@push('scripts')
<script src="../js/vendor.js"></script>
<script src="../js/script.js"></script>
@endpush