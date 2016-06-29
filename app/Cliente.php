<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

	protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre_cliente', 'email_cliente', 'id_cliente', 'direccion_cliente', 'telefono_cliente' ];
}
