<?php

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Etiquette;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->text("description");
            $table->string("image");
            $table->timestamps();

            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Categorie::class)->nullable();
        });

        Schema::create('article_etiquette', function (Blueprint $table) {
            $table->foreignIdFor(Article::class);
            $table->foreignIdFor(Etiquette::class);
            $table->timestamps();

            $table->primary(["article_id", "etiquette_id"]);
        });

        Schema::create('user_article', function (Blueprint $table) {
            $table->foreignIdFor(Article::class);
            $table->foreignIdFor(User::class);
            $table->timestamps();

            $table->primary(["article_id", "user_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
