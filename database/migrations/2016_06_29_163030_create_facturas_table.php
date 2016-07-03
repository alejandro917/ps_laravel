<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facturas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('factura_id')->unique();
			$table->date('fecha_factura');
			$table->date('vencimiento_factura');
			$table->string('estado_factura');
			$table->string('id_cliente');
			$table->string('nota_factura');
			$table->decimal('subtotal_factura');
			$table->decimal('total_factura');
			$table->decimal('iva_factura');
			$table->decimal('porc_iva_factura');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('facturas');
	}

}
