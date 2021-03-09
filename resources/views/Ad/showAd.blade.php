@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $ad->title }}
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Created: {{ $ad->created_at->diffForHumans() }}</h6>
            <p class="card-text">Author: {{ $user->name}}</p>
            <p>Description: </p>
            <p class="card-text">{{ $ad->description }}</p>
            @if(Auth::id() == $ad->user_id)
                <a href="/edit/{{ $ad->id }}" class="btn btn-primary">Edit</a>
                <a href="/delete/{{ $ad->id }}" class="btn btn-primary">Delete</a>
            @endif
        </div>
    </div>
@endsection
