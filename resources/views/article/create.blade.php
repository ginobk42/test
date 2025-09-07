@extends('layout.app')

@section('titre', "Formulaire de création d'article")

@section('main')
    <div class="container my-5">
        <h1>Formulaire de création d'article</h1>
        @if(session("success"))
            <div class="alert alert-success">{{ session("success") }}</div>
        @endif
        <form method="post" action="{{route("article.store")}}" class="form-group" enctype="multipart/form-data">
            @csrf
            
            <div class="form-control">
                <label for="">Entrer le Titre</label>
                <input value="{{old("titre")}}" class="form-control" type="text" name="titre" id="">
                @error("titre")
                    <p class="text-danger fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-control">
                <label for="">Entrer le description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10">{{old("description")}}</textarea>
                @error("description")
                    <p class="text-danger fw-bold">{{ $message }}</p>
                @enderror
            </div>

            
            <div class="form-control">
                <label for="">choisir l'image</label>
                <input value="{{old("image")}}" class="form-control" type="file" name="image" id="">
                @error("image")
                    <p class="text-danger fw-bold">{{ $message }}</p>
                @enderror
            </div>

            
            <div class="form-control">
                <label for="">choisir categorie</label>
                <select class="form-control" name="categorie_id" id="">
                    <option value="">choisir une catégorie</option>
                    @foreach ($categories as $c)
                        <option value="{{$c->id}}">{{$c->titre}}</option>
                    @endforeach
                </select>
                @error("categorie_id")
                    <p class="text-danger fw-bold">{{ $message }}</p>
                @enderror
            </div>

            
            <div class="form-control">
                <label for="">choisir Etiquette</label>
                <select multiple class="form-control" name="etiquettes_id[]" id="">
                    @foreach ($etiquettes as $e)
                        <option value="{{$e->id}}">{{$e->titre}}</option>
                    @endforeach
                </select>
                @error("etiquettes_id")
                    <p class="text-danger fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group my-5">
                <input type="submit" value="Creer" class="form-control btn btn-success"> 
            </div>

        </form>
    </div>
@endsection
