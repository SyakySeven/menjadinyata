<div style="display:flex;justify-content:center;align-items:center;min-height:97vh;background:#f5f6fa;">
    <div style="background:#fff;padding:32px 28px 24px 28px;border-radius:16px;box-shadow:0 4px 24px rgba(0,0,0,0.08);width:350px;">
        <div style="text-align:center;margin-bottom:18px;">
            <img src="{{ asset('asset/d3/img/dragon.jpg') }}" alt="Logo" style="width:60px;margin-bottom:8px; border-radius:50%;">
            <h3 style="margin:0;font-weight:700;color:#2d3436;">Login</h3>
            <p style="color:#636e72;font-size:14px;margin-bottom:0;">Silakan masuk ke akun Anda</p>
        </div>
        <form action="{{ route('login_proses') }}" method="post">
            @csrf
            <div class="form-group" style="margin-bottom:16px;">
                <label class="form-control-label">Username :</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" style="border-radius:8px;">
                <div>
                    @error('username')
                    <span style="color:crimson">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group" style="margin-bottom:16px;">
                <label class="form-control-label">Password :</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" style="border-radius:8px;">
                <div>
                    @error('password')
                    <span style="color:crimson">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group" style="margin-bottom:24px;">
                <label class="form-control-label">Email :</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" style="border-radius:8px;">
                <div>
                    @error('email')
                    <span style="color:crimson">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-block" style="background:#0984e3;color:#fff;font-weight:600;border-radius:8px;">Login</button>
        </form>
    </div>
</div>