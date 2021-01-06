@extends('layouts.admin')

@section('title')
<h2>Docteurs</h2>
@endsection

@section('content')
    <div class="container-fluid">
                <h5 class="card-title">Ajouter un docteur</h5>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.addDoctor') }}" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="lastName" aria-describedby="lastName" name="lastName" value="{{old('lastName')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="firstName" aria-describedby="firstName" name="firstName" value="{{old('firstName')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="postalAddress" class="form-label">Adresse postale</label>
                        <input type="text" class="form-control" id="postalAddress" aria-describedby="postalAddress" name="postalAddress" value="{{old('postalAddress')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="postCode" class="form-label">Code postal</label>
                        <input type="textarea" class="form-control" id="postCode" aria-describedby="firstName" name="postCode" value="{{old('postCode')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" aria-describedby="latitude" name="latitude" value="{{old('latitude')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" aria-describedby="longitude" name="longitude" value="{{old('longitude')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="textarea" class="form-control" id="description" aria-describedby="description" name="description" value="{{old('description')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="form-label">Image</label>
                        <input id="picture" type="file" class="form-control" name="picture">
                    </div>                    
                    <div class="mb-3">
                        <label for="price" class="form-label">Prix</label>
                        <input type="text" class="form-control" id="price" aria-describedby="price" name="price" value="{{old('price')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" name="email" value="{{old('email')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-warning" type="submit">Créer</button>
                    </div>
                </form>
        </div>
@endsection