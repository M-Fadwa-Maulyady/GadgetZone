<x-layoutAuth>

<div class="form-box">
    <h2>Sign Up</h2>

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

    <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="input-box">
            <input type="text" name="name" placeholder="Full name" value="{{ old('name') }}" required>
        </div>

        <div class="input-box">
            <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}" required>
        </div>

        <div class="input-box">
            <input type="file" name="foto" required>
        </div>

        <div class="input-box">
            <input type="text" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
        </div>

        <div class="input-box">
            <input type="text" name="no_telp" placeholder="No. Telp" value="{{ old('no_telp') }}" required>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="input-box">
            <input type="password" name="password_confirmation" placeholder="Confirm password" required>
        </div>

        <button type="submit" class="btn-submit">Register</button>

        <br><br>

        <p>Already have an account? 
            <a href="{{ route('login') }}">Login</a>
        </p>
    </form>
</div>

</x-layoutAuth>
