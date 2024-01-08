<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string("uuid");
            $table->string("user_uuid");
            $table->string("user_email");
            $table->string("user_name");
            $table->text("message");
            $table->timestamp("received_at")->useCurrent();

            $table->index("uuid", sprintf("%s_%s", "message", "uuid"));
            $table->index("user_uuid", sprintf("%s_%s", "message", "user_uuid"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
