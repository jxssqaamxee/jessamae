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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("sale_id");
            $table->enum("status_payment",["online","COD", "cash"]);
            $table->timestamps();
            $table->foreign("sale_id")->references("id")->on("sales_entry")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /*
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
