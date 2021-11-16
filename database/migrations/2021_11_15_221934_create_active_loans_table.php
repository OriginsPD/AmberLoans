<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained('request_loans')->cascadeOnUpdate()->cascadeOnUpdate();
            $table->bigInteger('loan');
            $table->bigInteger('payment_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('active_loans');
    }
}
