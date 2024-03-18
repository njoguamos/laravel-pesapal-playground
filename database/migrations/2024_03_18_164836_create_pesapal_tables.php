<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesapal_tokens', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'access_token')->unique();
            $table->timestamp(column: 'expires_at');
            $table->timestamps();
        });

         Schema::create('pesapal_ipns', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'url')->unique();
            $table->uuid(column: 'ipn_id');
            $table->unsignedTinyInteger(column: 'type');
            $table->unsignedTinyInteger(column: 'status')->nullable();
            $table->timestamps();
        });
    }
};
