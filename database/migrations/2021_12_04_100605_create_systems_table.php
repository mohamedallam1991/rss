<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('unit_id')->nullable();
            $table->unsignedInteger('structure_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->enum('status', ['working', 'infected']);
            $table->string('observation');
            $table->boolean('children'); //sous system
            // $table->string('non_system_mr'); //non_system_mr
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
        Schema::dropIfExists('systems');
    }
}
