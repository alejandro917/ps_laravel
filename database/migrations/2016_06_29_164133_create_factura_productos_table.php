<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factura_productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('factura_id')->unsigned();
			$table->string('nombre_producto');
			$table->integer('cantidad_producto');
			$table->decimal('precio_producto');
			$table->decimal('total_producto');
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
		Schema::drop('factura_productos');
	}

}
