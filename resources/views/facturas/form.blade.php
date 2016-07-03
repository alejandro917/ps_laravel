<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Factura No.</label>
            <input type="text" style="pointer-events: none; background: #f2f2f2;" class="form-control campo_factura" v-model="dFactura.factura_id">
            <p v-if="errors.invoice_no" class="error">@{{errors.invoice_no[0]}}</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Fecha</label>
                <input type="text" class="form-control" v-model="dFactura.fecha_factura">
                <p v-if="errors.invoice_date" class="error">@{{errors.invoice_date[0]}}</p>
            </div>
            <div class="col-sm-6">
                <label>Vencimiento</label>
                <input type="text" class="form-control" v-model="dFactura.vencimiento_factura">
                <p v-if="errors.due_date" class="error">@{{errors.due_date[0]}}</p>
            </div>
        </div>

    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Cliente</label>
            <input type="text" class="form-control" v-model="dFactura.id_cliente">
            <p v-if="errors.client" class="error">@{{errors.client[0]}}</p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Estado</label>
            <input type="text" class="form-control" v-model="dFactura.estado_factura">
            <p v-if="errors.title" class="error">@{{errors.title[0]}}</p>
        </div>
        <div class="form-group">
            <label>Notas</label>
            <textarea class="form-control" v-model="dFactura.nota_factura"></textarea>
            <p v-if="errors.client_address" class="error">@{{errors.client_address[0]}}</p>
        </div>

    </div>
</div>
<hr>
<div v-if="errors.products_empty">
    <p class="alert alert-danger">@{{errors.products_empty[0]}}</p>
    <hr>
</div>
<table class="table table-bordered table-form">
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="producto in productos">
        <input type="hidden" v-model="producto.factura_id">
        <td class="table-name" :class="{'table-error': errors['products.' + $index + '.name']}">
            <textarea class="table-control" v-model="producto.nombre_producto"></textarea>
        </td>
        <td class="table-price" :class="{'table-error': errors['products.' + $index + '.price']}">
            <input type="text" class="table-control"  v-model="producto.precio_producto">
        </td>
        <td class="table-qty" :class="{'table-error': errors['products.' + $index + '.qty']}">
            <input type="text" class="table-control" v-model="producto.cantidad_producto">
        </td>
        <td class="table-total">
            <span class="table-text">@{{producto.precio_producto * producto.cantidad_producto}}</span>
        </td>
        <td class="table-remove">
            <span @click="removeProducto(producto.id, producto.factura_id)" class="table-remove-btn">&times;</span>
        </td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td class="table-empty" colspan="2">
            <span @click="addLine" class="table-add_line">Add Line</span>
        </td>
        <td class="table-label">Sub Total</td>
        <td class="table-amount">@{{subTotal}}</td>
    </tr>
    <tr>
        <td class="table-empty" colspan="2"></td>
        <td class="table-label">Discount</td>
        <td class="table-discount" :class="{'table-error': errors.discount}">
            <input type="text" class="table-discount_input" v-model="form.discount">
        </td>
    </tr>
    <tr>
        <td class="table-empty" colspan="2"></td>
        <td class="table-label">Grand Total</td>
        <td class="table-amount">@{{productosTotal}}</td>
    </tr>
    </tfoot>
</table>
