<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Test;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("welcome");
})->name("home");

Route::get("/page1", function(){
    return view("page1");
});

// Route::get("article/create", function() {
//     $user = User::create([
//         'name' => "test",
//         'email' => "test@gmail.com",
//         'password' => "123"
//     ]);

//     $cat = Categorie::create([
//         "titre" => "Categorie 1"
//     ]);

//     $article = Article::create([
//         "titre" => "Article 1",
//         "description" => "Description de l'article 1",
//         "image" => "",
//         "user_id" => $user->id,
//         "categorie_id" => $cat->id
//     ]);

//     dd($article);
// });

Route::get("test/create", function(){
    $test = Test::create([
        "age" => 11,
        "date_de_naissance" => "2025-07-21",
        "nom" => "test 1"
    ]);
    
    dd($test);
});

Route::get("test/update/{test}", function(Test $test){
    $test->age = 12;
    $test->date_de_naissance = "2020-09-22";
    $test->description = "Voici mon description";

    $test->update();
    dd($test);
});

Route::get("test/delete/{test}", function(Test $test){

    $test->delete();
});

Route::get("test", function() {
    // $test_1 = Test::find(1, ["age", "id"]);
    $tests = Test::all();
    // $t = Test::paginate(4);
    // $tq = Test::where("age", "<>", 10)->get();
    

    return view("test", [
        "t" => $tests
    ]);
});

Route::get("index", function() {
    return view("index");
});

Route::get("contact", function() {
    return view("contact");
})->name("contact");


Route::get("article/create", [ArticleController::class, "create"])->name("article.create");
Route::post("article/store", [ArticleController::class, "store"])->name("article.store");

Route::get("article", [ArticleController::class, "index"]);


Route::resource("categorie", CategorieController::class)->except("destroy", "show");


// Route::get('/article', function(){2
//     return "Page des articles";
// })->name("article.index");

// Route::get("article/create", function(){
//     return "formulaire de création d'article !";
// });
// Route::post("article/create", function(){
//     return "create Articles";
// });

// Route::get("article/edit/{id}", function(int $id){
//     return "Modification de l'article qui a pour id $id";
// });
// Route::patch("article/edit/{id}", function(int $id){
//     return "create Articles";
// });

// Route::delete("article/delete/{id}", function(int $id){
//     return "Article delete!";
// });

// Route::get('/article/{id}', function(int $id){
//     return "ARticle d'id $id";
// });

// Route::group()->name('test.')->prefix('article/', function(){
//     Route::get('{id}', function(int $id){
//         return "ARticle d'id $id";
//     });
// });



// Route::resource("article", ArticleController::class);


