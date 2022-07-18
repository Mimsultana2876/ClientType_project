<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\ForeignKeyDefinition;

class CreateClientdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('p_id');
            $table->string('client_name');
            $table->string('client_website');
            $table->string('client_email');
            $table->string('client_phone');
            $table->string('client_address');

            $table->timestamps();

            $table->foreign('p_id')
            ->references('id')
            ->on('project_type');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientdetails');
    }
}
