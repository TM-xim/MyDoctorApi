@extends('layouts.doctor')

@section('title')
<h2>Doctor</h2>
@endsection

@section('content')
    <div class="container-fluid">
                <h5 class="card-title">Ajouter un créneau</h5>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.addAdmin') }}">
                @csrf
                    <div class="mb-3">
                    <label for="start">Date:</label>
                    <input type="date" id="date" name="date">
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Début</label>
                        <input type="text" class="form-control" id="firstName" aria-describedby="firstName" name="firstName" value="{{old('firstName')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Fin</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" name="email" value="{{old('email')}}" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-warning" type="submit">Créer</button>
                    </div>
                </form>
        </div>
@endsection