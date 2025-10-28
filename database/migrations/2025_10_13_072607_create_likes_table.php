<?php

use App\Models\Post;
use App\Models\User;
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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Post::class)->constrained()->cascadeOnDelete();
            $table->unique(['user_id', 'post_id']);
            //$table->integer('value'); // like +1 dislike -1 (youtube)

            //$table->enum('value', ['👍', '😂', '😡', '😢', '💩']); // emoji like facebook

            //$table->string('value');
            //$table->unique(['user_id', 'post_id', 'value']); // as many emojis as want different ones (discord)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
