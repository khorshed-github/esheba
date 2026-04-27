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
        Schema::create('client_info', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('client_name');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('url')->nullable();
            $table->string('domain')->nullable();
            $table->string('hosting')->nullable();
            $table->date('expire_date')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active,0=blocked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_info');
    }
};
