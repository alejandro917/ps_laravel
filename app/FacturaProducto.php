<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class FacturaProducto extends Model {

	protected $fillable = [ 'factura_id', 'nombre_producto', 'cantidad_producto', 'precio_producto', 'total_producto'];

    public function factura () {
        return $this->belongsTo(Factura::class);
    }

}
