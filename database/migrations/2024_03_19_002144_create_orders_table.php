<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger(column: 'currency');
            $table->decimal(column: 'amount', total: 10);
            $table->string(column: 'description');
            $table->string(column: 'callback_url');
            $table->foreignId(column: 'ipn_id')->constrained(table: 'pesapal_ipns')->restrictOnDelete();
            $table->string(column: 'cancellation_url')->nullable();
            $table->unsignedTinyInteger(column: 'redirect_mode');
            $table->string(column: 'branch')->nullable();
            $table->string(column: 'phone_number')->nullable();
            $table->string(column: 'email_address')->nullable();
            $table->unsignedTinyInteger(column: 'country_code')->nullable();
            $table->string(column: 'first_name')->nullable();
            $table->string(column: 'last_name')->nullable();
            $table->string(column: 'middle_name')->nullable();
            $table->string(column: 'line1')->nullable();
            $table->string(column: 'line2')->nullable();
            $table->string(column: 'state')->nullable();
            $table->string(column: 'postal_code')->nullable();
            $table->string(column: 'zip_code')->nullable();
            $table->string(column: 'order_tracking_id')->nullable();
            $table->string(column: 'redirect_url')->nullable();
            $table->json(column: 'transaction_payload')->nullable();
            $table->timestamps();
        });
    }

};
