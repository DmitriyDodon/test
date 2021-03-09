@extends('layout')
@section('title', 'ad')


@section('content')
    @forelse($ads as $ad)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <a href="/{{ $ad->id }}"><h5 class="card-title">{{ $ad->title }}</h5></a>
                <h6 class="card-subtitle mb-2 text-muted">Created: {{ $ad->created_at->diffForHumans() }}</h6>
                <p class="card-text">Author: {{ $users->firstWhere('id' , $ad->user_id)->name }}</p>
                <p>Description: </p>
                <p class="card-text">{{ $ad->description }}</p>
                @if(\Illuminate\Support\Facades\Auth::id() == $ad->user_id)
                    <a href="/delete/{{ $ad->id }}" class="btn btn-primary">Delete</a>
                    <a href="/edit/{{ $ad->id }}" class="btn btn-primary">Edit</a>
                @endif
            </div>
        </div>
    @empty
        <p>There is no ads.<a href="/create">Create Ad</a></p>
    @endforelse
    @include('pagination' , compact('ads'))
@endsection

