<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->float('amount');
            $table->float('total_amount');
            $table->enum('tax_percentage',[0,5,12,18,28]);
            $table->float('tax_amount');
            $table->float('net_amount');
            $table->string('customer_name');
            $table->datetime('invoice_date');
            $table->string('file');
            $table->string('customer_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
