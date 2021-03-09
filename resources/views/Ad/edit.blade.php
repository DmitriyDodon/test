@extends('layout')

@section('content')
    @php
        if (old('_token') !== null && old('title') === null || old('_token') !== null && old('description') === null){
            if (old('title') === null){
                    $old_title = '';
            }
            if (old('description') === null){
                    $old_description = '';
            }


        }
    @endphp
    <form method="POST" action="">
        @csrf
        @if($errors->has('title'))
            @foreach($errors->get('title') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
       <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" name="title" value="{{ $old_title ?? old('title') ?? $ad->title ?? '' }}" class="form-control" id="exampleInputPassword1" placeholder="Title">

       </div>
       @if($errors->has('description'))
           @foreach($errors->get('description') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
           @endforeach
       @endif
       <div class="form-group">
           <label for="exampleFormControlTextarea1">Description</label>
           <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $old_description ?? old('description') ?? $ad->description ?? ''  }}</textarea>
       </div>
        @if(isset($ad->title))
            <button type="submit" class="btn btn-primary">Save</button>
        @else
            <button type="submit" class="btn btn-primary">Create</button>
        @endif

    </form>
@endsection
