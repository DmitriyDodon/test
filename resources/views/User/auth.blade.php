<form method="POST" action="/">
    @csrf
    @if($errors->has('name'))
        @foreach($errors->get('name') as $error)
            <div class="alert alert-danger py-3" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" name="name" value="{{ old('name') ?? '' }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
    </div>
    @if($errors->has('password'))
        @foreach($errors->get('password') as $error)
            <div class="alert alert-danger py-3" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
