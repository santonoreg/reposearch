<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('envelope_code', 4);
            $table->string('envelope_code_year', 7)->unique;
            $table->string('file_code', 11)->unique;
            $table->string('payment_code', 11)->unique;
            $table->string('relative_files', 100);
            $table->foreignId('payment_type_id')->constrained();
            $table->foreignId('beneficiary_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('description', 500);
            $table->decimal('total_amount', 8, 2);
            $table->decimal('deductions', 8, 2);
            $table->decimal('payment_amount', 8, 2);
            $table->integer('year');
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
        Schema::dropIfExists('payments');
    }
};
