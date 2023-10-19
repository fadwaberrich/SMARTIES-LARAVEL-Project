@extends('front.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter une Annonce</div>

                    <div class="panel-body">
                        <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_user" value="{{Auth::user()->id }}">

                            <div class="form-group">
                                <label for="id_categorie">Catégorie</label>
                                <select name="id_categorie" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>




                            <div class="form-group">
                                <label for="titre">Titre </label>
                                <input type="text" name="titre" class="form-control">
                                @error('titre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description"> Description </label>
                                <textarea name="description" class="form-control"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="telephone">Téléphone de contact</label>
                                <input type="text" name="telephone" class="form-control">
                                @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="photo">Image de l'article</label>
                                <input type="file" name="photo" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="echange">Échange </label>
                                <input type="text" name="echange" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Ajouter votre produit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
