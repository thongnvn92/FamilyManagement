<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyTreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('family_trees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Liên kết với bảng users
            $table->string('name');
            $table->string('title')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('image_url')->nullable();
            $table->unsignedBigInteger('father_id')->nullable();
            $table->unsignedBigInteger('mother_id')->nullable();
            $table->unsignedBigInteger('partner_id')->nullable(); // Vợ hoặc chồng
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('father_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mother_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('family_trees');
    }
}
