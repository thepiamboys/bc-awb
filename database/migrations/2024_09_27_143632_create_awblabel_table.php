<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwblabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awblabel', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('airline'); // Kolom airline
            $table->string('awbbc')->nullable(); // Kolom awbbc, nullable jika tidak wajib
            $table->string('awb'); // Kolom awb (Air Waybill)
            $table->string('hawb')->nullable(); // Kolom hawb (House Air Waybill), nullable jika tidak wajib
            $table->string('destination'); // Kolom destination
            $table->string('origin'); // Kolom origin
            $table->decimal('total', 10, 2); // Kolom total, tipe decimal dengan 10 digit total dan 2 desimal
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awblabel');
    }
}
