<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 250)->nullable()->default(null);
            $table->string('img')->nullable()->default(null);
            $table->integer('price')->unsigned()->default(null);
            $table->integer('brand_id')->unsigned()->nullable()->default(null);
            $table->integer('category_id')->unsigned()->nullable()->default(null);
            $table->integer('country_id')->unsigned()->nullable()->default(null);
            $table->integer('quantity')->unsigned()->nullable()->default(null);
            $table->string('status', 20);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
