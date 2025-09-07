<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Etiquette;
use App\Models\User;

class ArticleController extends Controller
{
    public function create()
    {

        return view("article.create", [
            "categories" => Categorie::all(),
            "etiquettes" => Etiquette::all()
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $datas = $request->validated();

        // $user = User::create([
        //     'name' => "test",
        //     'email' => "test@gmail.com",
        //     'password' => "123"
        // ]);

        $image = $datas["image"];
        $ets_id = $datas["etiquettes_id"];

        $chemin_image = $image->store("upload", "public");

        $datas["image"] = $chemin_image;
        $datas["user_id"] = 1;

        $article = Article::create($datas);

        $article->etiquettes()->sync($ets_id);

        return redirect()->route("article.create")->with("success", "l'article a été créé avec success !");
    }

    public function index() {
        return view("article.index", [
            "articles" => Article::paginate(1)
        ]);
    }
}
