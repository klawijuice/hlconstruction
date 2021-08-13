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
        /**
         * Table des articles
         */
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // Le titre de l'article
            $table->json('name')->nullable();
            $table->string('link')->nullable();
            // Le slug de l'article
            $table->json('slug')->nullable();
            // La description de l'article
            $table->json('description')->nullable();
            // Le contenu de l'article
            $table->json('content')->nullable();
            // Les différents états d'un article
            // 0 Si l'article est considéré comme un brouillon
            // 1 Si l'article est passé hors ligne
            // 2 Si l'article est passé en ligne
            $table->integer('state')->nullable()->default(0);
            $table->integer('confirmed')->nullable()->default(0);
            $table->integer('commentable')->nullable()->default(1);
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on("users")
                ->onDelete("set null");
            // Champ pour savoir si l'article a été supprimé ou non
            $table->softDeletes();
            //
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Le titre de l'article
            $table->json('name')->nullable();
            $table->string('link')->nullable();
            // Le slug de l'article
            $table->json('slug')->nullable();
            // La description de l'article
            $table->json('description')->nullable();
            // Le contenu de l'article
            $table->json('content')->nullable();
            // Les différents états d'un article
            // 0 Si l'article est considéré comme un brouillon
            // 1 Si l'article est passé hors ligne
            // 2 Si l'article est passé en ligne
            $table->integer('state')->nullable()->default(0);
            $table->integer('confirmed')->nullable()->default(0);
            $table->integer('commentable')->nullable()->default(1);
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on("users")
                ->onDelete("set null");
            // Champ pour savoir si l'article a été supprimé ou non
            $table->softDeletes();
            //
            $table->timestamps();
        });

        /**
         * Table pour les catégories
         */
        Schema::create("categories", function (Blueprint $table) {
            $table->id();
            $table->json("name")->nullable();
            $table->json("slug")->nullable();
            $table->text("description")->nullable();
            $table->string("type")->default('product');
            $table->softDeletes();
            $table->timestamps();
        });

        /**
         * Table de liaison entre les articles et les catégories
         */
        Schema::create('product_category', function (Blueprint $table) {
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("category_id");
            $table->timestamp('created_at')->nullable();
            $table->softDeletes();
            $table->primary(['product_id', 'category_id'], 'product_category');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete("cascade");
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete("cascade");
        });

        /**
         *  Table pour gérer les fichiers du système
         */
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->morphs('attachable');
            $table->string('attribution')->nullable();
            $table->string('type', 50)->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('created_at');
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
        // TABLE CONTENANT LES MOTS CLÉS
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json("name");
            $table->json("slug");
            $table->timestamps();
        });
        Schema::create('taggables', function (Blueprint $table) {
            $table->unsignedBigInteger("tag_id");
            $table->morphs('taggable');
            $table->unique(['tag_id', 'taggable_type', 'taggable_id']);
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('products');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('attachments');
        Schema::dropIfExists('taggables');
        Schema::dropIfExists('tags');
    }
}
