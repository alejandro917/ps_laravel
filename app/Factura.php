<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model {

    protected $fillable = [
    'factura_id', 'fecha_factura', 'vencimiento_factura', 'estado_factura', 'id_cliente', 'nota_factura', 'subtotal_factura', 'total_factura', 'iva_factura', 'porc_iva_factura'
    ];

    public function productos () {
        return $this->hasMany(FacturaProducto::class);
//        $productos = App\FacturaProducto::has('productos')->get();
        $factura = App\Factura::find(1);
        $factura->productos()->where('factura_id', 1)->get();
    }
}
