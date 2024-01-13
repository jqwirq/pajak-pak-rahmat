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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string("item_name");
            $table->date("date");
            $table->decimal("price", 13, 2);
            $table->smallInteger("quantity");
            $table->decimal("sub_total", 13, 2);
            $table->boolean("is_taxed");
            $table->decimal("tax", 11, 2);
            $table->decimal("total", 13, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
