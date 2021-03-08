@extends('layouts.doctor')

@section('title')
<h2>Doctor</h2>
@endsection

@section('content')
    <div class="container-fluid">
                <h5 class="card-title">Modifier un créneau</h5>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('doctor.schedule.edit', $schedule->id) }}">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" value="{{date('Y-m-d', strtotime($schedule->start))}}">
                    </div>
                    <div class="mb-3">
                        <label for="start" class="form-label">Début</label>
                        <input type="time" id="start" name="start" value="{{date('H:i', strtotime($schedule->start))}}">                    
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">Fin</label>
                        <input type="time" id="end" name="end" value="{{date('H:i', strtotime($schedule->end))}}">                    
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-warning" type="submit">Créer</button>
                    </div>
                </form>
        </div>
@endsection