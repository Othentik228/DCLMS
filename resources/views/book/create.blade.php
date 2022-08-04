@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Ajouter un livre</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('books') }}">Tous les livres</a>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('book.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Nom du livre</label>
                            <input type="text" class="form-control @error('name') isinvalid @enderror"
                                placeholder="Nom du livre" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Catégorie</label>
                            <select class="form-control @error('category_id') isinvalid @enderror " name="category_id" required>
                                <option value="">Selectionner une catégorie</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Auteur</label>
                            <select class="form-control @error('auther_id') isinvalid @enderror " name="auther_id" required>
                                <option value="">Selectionner un auteur</option>
                                @foreach ($authors as $author)
                                    <option value='{{ $author->id }}'>{{ $author->name }}</option>";
                                @endforeach
                            </select>
                            @error('auther_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Publicateur</label>
                            <select class="form-control @error('publisher_id') isinvalid @enderror " name="publisher_id" required>
                                <option value=""> Selectionner un publicateur</option>
                                @foreach ($publishers as $publisher)
                                    <option value='{{ $publisher->id }}'>{{ $publisher->name }}</option>";
                                @endforeach
                            </select>
                            @error('publisher_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" name="save" class="btn btn-danger" value="Valider" required>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
