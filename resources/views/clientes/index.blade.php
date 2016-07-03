@extends('layout')

@section('content')

    <div id="ClienteController">

        <div id="FacturaController">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="clearfix">
                        <span class="panel-title">Crear Factura</span>
                        <a href="{{route('facturas.create')}}" class="btn btn-success pull-right">Atras</a>
                    </div>
                </div>
                <div class="panel-body">
<!--
        <div class="alert alert-danger" v-if="!isValid">
            <ul>
                <li v-show="!validation.nombre_cliente">El nombre es requerido</li>
                <li v-show="!validation.email_cliente">Ingresa un email válido</li>
                <li v-show="!validation.id_cliente">Ingresa Nit o Cédula </li>
                <li v-show="!validation.direccion_cliente">Ingresa Dirección</li>
                <li v-show="!validation.telefono_cliente">Ingresa Teléfono</li>
            </ul>
        </div>
-->
        <form action="#" @submit.prevent="AddNewCliente" method="POST">
            <div class="form-group">
                <label for="nombre_cliente">Nombre / Razón Social:</label>
                <input v-model="newCliente.nombre_cliente" type="text" name="nombre_cliente" id="nombre_cliente" class="form-control">
            </div>
            <div class="form-group">
                <label for="email_cliente">Email:</label>
                <input v-model="newCliente.email_cliente" type="text" id="email_cliente" name="email_cliente" class="form-control">
            </div>
            <div class="form-group">
                <label for="id_cliente">NIT:</label>
                <input v-model="newCliente.id_cliente" type="text" id="id_cliente" name="id_cliente" class="form-control">
            </div>
            <div class="form-group">
                <label for="direccion_cliente">Dirección:</label>
                <input v-model="newCliente.direccion_cliente" type="text" id="direccion_cliente" name="direccion_cliente" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefono_cliente">Teléfono:</label>
                <input v-model="newCliente.telefono_cliente" type="text" id="telefono_cliente" name="telefono_cliente" class="form-control">
            </div>
            <div class="form-group">
                <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="!edit">Add New Cliente</button>
                <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="edit" @click="EditCliente(newCliente.id)">Editar Cliente</button>
            </div>
        </form>

                </div>
                <div class="panel-footer">
                    <a @click="back" class="btn btn-default">CANCEL</a>
                    <button @click="addNewFactura" class="btn btn-success">CREAR</button>
                    <button @click="EditFactura(dFactura.id)" class="btn btn-success">GUARDAR</button>
                </div>


            </div>

<!--        <div class="alert alert-success" transition="success" v-if="success">Nuevo usuario creado</div> -->


            <div class="panel panel-default">
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
            <th>ID</th>
            <th>NOMBRE</th>
            <th>EMAIL</th>
            <th>NIT</th>
            <th>DIRECCIÓN</th>
            <th>TELÉFONO</th>
            <th>CONTROL</th>
            </thead>

            <tbody>
            <tr v-for="cliente in clientes">
                <td>@{{ cliente.id }}</td>
                <td>@{{ cliente.nombre_cliente }}</td>
                <td>@{{ cliente.email_cliente }}</td>
                <td>@{{ cliente.id_cliente }}</td>
                <td>@{{ cliente.direccion_cliente }}</td>
                <td>@{{ cliente.telefono_cliente }}</td>
                <td>
                    <button class="btn btn-default btn-sm" @click="ShowCliente(cliente.id)">Editar</button>
                    <button class="btn btn-danger btn-sm" @click="RemoveCliente(cliente.id)">Eliminar</button>
                </td>
            </tr>
            </tbody>
        </table>

        </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="js/vendor.js"></script>
<script src="js/script.js"></script>
<style>
    .success-transition{
        transition: all .5s easy-in-out;
    }
    .success-enter, .success-leave{
        opacity: 0;
    }
</style>

@endpush