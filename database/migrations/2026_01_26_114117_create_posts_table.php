<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // strig of type varchar(255)
            $table->text('content'); // text of type text
            $table->string('image')->nullable(); // string of type varchar(255) nullable
            $table->string('slug')->unique(); // string of type varchar(255) unique
            $table->enum('status', ['draft', 'published', 'archived', 'deleted'])->default('draft'); // enum of type enum('draft', 'published', 'archived', 'deleted') default 'draft'
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade'); // foreign id of type bigint unsigned constrained to users table on delete cascade
            $table->softDeletes(); // soft deletes of type timestamp nullable
            $table->timestamps(); // timestamps of type timestamp nullable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('posts');
    }
}
