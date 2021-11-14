<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('request_loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers','id');
            $table->foreignId('loan_id')->constrained('loans','id');
            $table->boolean('status')->default(0);
            $table->date('approve_date')->nullable();
            $table->foreignId('approved_by')->constrained('users','id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_loans');
    }
}
