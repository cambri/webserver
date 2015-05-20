<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HmtSslHostnamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('system')->create('ssl_hostnames', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            // tenant owner
            $table->bigInteger('ssl_certificate_id')->unsigned();
            // domain relation
            $table->bigInteger('domain_id')->unsigned();

            // certificate
            $table->string('hostname');

            // timestaps
            $table->timestamps();
            $table->softDeletes();

            // relations
            $table->foreign('ssl_certificate_id')->references('id')->on('ssl_certificates')->onDelete('cascade');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('set null');

            // index
            $table->index(['hostname','domain_id']);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('system')->dropIfExists('ssl_hostnames');
	}

}
