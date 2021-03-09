    @if(\Illuminate\Support\Facades\Auth::check())
        <nav class="navbar navbar-light bg-light">
            <div class="form-inline">
                <p>Hello, {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    <a class="btn btn-sm btn-outline-secondary mx-3" href="/logout">Logout</a>
                    <a class="btn btn-sm btn-outline-secondary" href="/edit">Create Ad</a>
                </p>
            </div>
        </nav>
    @endif
