<x-layoutAuth>

<div class="form-box">
    <h2>Login</h2>

    <div class="card-body">

        {{-- ERROR --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- SUCCESS --}}
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="input-box">
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Email" 
                    value="{{ old('email') }}" 
                    required>
            </div>

            <div class="input-box">
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Password" 
                    required>
            </div>

            <a href="#" class="forgot">Forgot your password?</a>

            <button type="submit" class="btn-submit">Login</button>

            <br><br>

            <p>Don’t have an account? 
                <a href="{{ route('register') }}">Sign up</a>
            </p>
        </form>
    </div>
</div>

</x-layoutAuth>
