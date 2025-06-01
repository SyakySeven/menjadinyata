<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="bg-white p-4 p-md-5 rounded-4 shadow" style="width: 100%; max-width: 400px;">
        <div class="text-center mb-4">
            <img src="{{ asset('asset/d3/img/dragon.jpg') }}" alt="Logo" class="mb-3 rounded-circle" style="width: 60px;">
            <h3 class="fw-bold text-dark mb-1">Login</h3>
            <p class="text-muted small mb-0">Silakan masuk ke akun Anda</p>
        </div>
        <form action="{{ route('login_proses') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username :</label>
                <input type="text" name="username" id="username" class="form-control rounded-3" placeholder="Enter your username">
                @error('username')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <input type="password" name="password" id="password" class="form-control rounded-3" placeholder="Enter your password">
                @error('password')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="form-label">Email :</label>
                <input type="email" name="email" id="email" class="form-control rounded-3" placeholder="Enter your email">
                @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 fw-semibold rounded-3">Login</button>
        </form>
    </div>
</div>
