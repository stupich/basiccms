<?php

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use HasUlids;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bloginstances', function (Blueprint $table) {
            $table->ulid('instance_id');
            $table->string('name');
            $table->string('url');
            $table->string('admin_id');
            $table->timestamps();
        });

        Schema::create('imageboardinstances', function (Blueprint $table) {
            $table->ulid('instance_id');
            $table->string('name');
            $table->string('url');
            $table->string('admin_id');
            $table->timestamps();
        });

        Schema::create('shopinstances', function (Blueprint $table) {
            $table->ulid('instance_id');
            $table->string('name');
            $table->string('url');
            $table->string('admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bloginstances');
        Schema::dropIfExists('imageboardinstances');
        Schema::dropIfExists('shopinstances');
    }
};
