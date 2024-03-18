<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'queue')->index();
            $table->longText(column: 'payload');
            $table->unsignedTinyInteger(column: 'attempts');
            $table->unsignedInteger(column: 'reserved_at')->nullable();
            $table->unsignedInteger(column: 'available_at');
            $table->unsignedInteger(column: 'created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string(column: 'id')->primary();
            $table->string(column: 'name');
            $table->integer(column: 'total_jobs');
            $table->integer(column: 'pending_jobs');
            $table->integer(column: 'failed_jobs');
            $table->longText(column: 'failed_job_ids');
            $table->mediumText(column: 'options')->nullable();
            $table->integer(column: 'cancelled_at')->nullable();
            $table->integer(column: 'created_at');
            $table->integer(column: 'finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'uuid')->unique();
            $table->text(column: 'connection');
            $table->text(column: 'queue');
            $table->longText(column: 'payload');
            $table->longText(column: 'exception');
            $table->timestamp(column: 'failed_at')->useCurrent();
        });
    }
};
