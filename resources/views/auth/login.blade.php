<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Aplikasi Web Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(-45deg, #00d4ff, #0099cc, #0066b3, #00bfff);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      position: relative;
    }
    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    /* Water Bubbles */
    .water-bubbles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      overflow: hidden;
    }
    .bubble {
      position: absolute;
      border-radius: 50%;
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.2);
      animation: bubbleFloat linear infinite;
    }
    .bubble:nth-child(1) { width: 80px; height: 80px; left: 10%; animation-duration: 20s; animation-delay: 0s; }
    .bubble:nth-child(2) { width: 40px; height: 40px; left: 25%; animation-duration: 15s; animation-delay: 2s; }
    .bubble:nth-child(3) { width: 60px; height: 60px; left: 45%; animation-duration: 25s; animation-delay: 4s; }
    .bubble:nth-child(4) { width: 30px; height: 30px; left: 60%; animation-duration: 18s; animation-delay: 1s; }
    .bubble:nth-child(5) { width: 50px; height: 50px; left: 80%; animation-duration: 22s; animation-delay: 3s; }
    .bubble:nth-child(6) { width: 70px; height: 70px; left: 90%; animation-duration: 28s; animation-delay: 5s; }
    @keyframes bubbleFloat {
      0% { transform: translateY(100vh) scale(0); opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { transform: translateY(-100px) scale(1.1); opacity: 0; }
    }
    .login-container {
      backdrop-filter: blur(30px);
      background: rgba(255, 255, 255, 0.12);
      border-radius: 28px;
      border: 1px solid rgba(255, 255, 255, 0.25);
      box-shadow: 
        0 25px 50px rgba(0,0,0,0.15),
        inset 0 1px 0 rgba(255,255,255,0.4),
        0 0 0 1px rgba(255,255,255,0.1);
      overflow: hidden;
      width: 100%;
      max-width: 440px;
      position: relative;
      animation: liquidSlide 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    @keyframes liquidSlide {
      from {
        opacity: 0;
        transform: translateY(60px) scale(0.9) rotateX(10deg);
      }
      to {
        opacity: 1;
        transform: translateY(0) scale(1) rotateX(0);
      }
    }
    .login-header {
      background: linear-gradient(135deg, rgba(255,255,255,0.25) 0%, rgba(255,255,255,0.08) 100%);
      padding: 3rem 2.5rem 1rem;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .login-header::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
      animation: shimmer 3s infinite;
    }
    @keyframes shimmer {
      0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); opacity: 0; }
      50% { opacity: 1; }
      100% { transform: translateX(100%) translateY(100%) rotate(45deg); opacity: 0; }
    }
    .logo {
      width: 72px;
      height: 72px;
      background: linear-gradient(135deg, #00d4ff, #0099cc, #0066b3);
      border-radius: 20px;
      margin: 0 auto 1.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.2rem;
      font-weight: 800;
      color: white;
      box-shadow: 0 15px 40px rgba(0, 212, 255, 0.4);
      position: relative;
      z-index: 2;
    }
    .login-title {
      font-size: 2.3rem;
      font-weight: 800;
      background: linear-gradient(135deg, #ffffff 0%, #f0f8ff 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 0.25rem;
      position: relative;
      z-index: 2;
      text-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .login-subtitle {
      color: rgba(255,255,255,0.9);
      font-size: 1.1rem;
      font-weight: 400;
      position: relative;
      z-index: 2;
    }
    .login-body {
      padding: 2.5rem 2.5rem 2rem;
      position: relative;
      z-index: 2;
    }
    .form-floating {
      position: relative;
      margin-bottom: 1.75rem;
    }
    .form-floating input {
      background: rgba(255,255,255,0.12);
      border: 1px solid rgba(255,255,255,0.25);
      border-radius: 20px;
      padding: 1.5rem 1.25rem 1rem 1.25rem;
      font-size: 1rem;
      color: white;
      backdrop-filter: blur(15px);
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      width: 100%;
      position: relative;
    }
    .form-floating input::placeholder {
      color: rgba(255,255,255,0.4);
    }
    .form-floating input:focus {
      outline: none;
      box-shadow: 
        0 0 0 4px rgba(0, 212, 255, 0.2),
        0 15px 35px rgba(0, 212, 255, 0.15);
      background: rgba(255,255,255,0.18);
      transform: translateY(-3px) scale(1.02);
      border-color: rgba(0, 212, 255, 0.5);
    }
    .form-floating input:focus + .input-line {
      transform: scaleX(1);
    }
    .input-line {
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 2px;
      background: linear-gradient(90deg, #00d4ff, #0099cc);
      transform: translateX(-50%) scaleX(0);
      transform-origin: center;
      transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      border-radius: 1px;
    }
    .form-floating label {
      position: absolute;
      top: 1.3rem;
      left: 1.25rem;
      color: rgba(255,255,255,0.75);
      font-weight: 500;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      pointer-events: none;
    }
    .form-floating input:focus ~ label,
    .form-floating input:not(:placeholder-shown) ~ label {
      top: 0.6rem;
      font-size: 0.85rem;
      color: #00d4ff;
      font-weight: 600;
    }
    .input-icon {
      position: absolute;
      right: 1.25rem;
      top: 1.5rem;
      color: rgba(255,255,255,0.6);
      font-size: 1.25rem;
      z-index: 10;
      transition: all 0.3s ease;
    }
    .form-floating input:focus ~ .input-icon {
      color: #00d4ff;
      transform: scale(1.1);
    }
    .login-btn {
      background: linear-gradient(135deg, #00d4ff 0%, #0099cc 50%, #0066b3 100%);
      border: none;
      border-radius: 20px;
      padding: 1.25rem 2.5rem;
      font-size: 1.15rem;
      font-weight: 700;
      color: white;
      width: 100%;
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      box-shadow: 
        0 15px 35px rgba(0, 212, 255, 0.4),
        inset 0 1px 0 rgba(255,255,255,0.3);
      position: relative;
      overflow: hidden;
    }
    .login-btn::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: rgba(255,255,255,0.3);
      border-radius: 50%;
      transform: translate(-50%, -50%);
      transition: width 0.6s, height 0.6s;
    }
    .login-btn:hover::before {
      width: 300px;
      height: 300px;
    }
    .login-btn:hover {
      transform: translateY(-5px);
      box-shadow: 
        0 25px 50px rgba(0, 212, 255, 0.5),
        inset 0 1px 0 rgba(255,255,255,0.4);
    }
    .login-btn:active {
      transform: translateY(-2px);
    }
    .form-check-input {
      background: rgba(255,255,255,0.15);
      border: 1px solid rgba(255,255,255,0.3);
      backdrop-filter: blur(10px);
    }
    .form-check-input:checked {
      background-color: #00d4ff;
      border-color: #00d4ff;
      box-shadow: 0 0 0 3px rgba(0, 212, 255, 0.2);
    }
    .form-check-label {
      color: rgba(255,255,255,0.9);
    }
    .forgot-password {
      color: rgba(255,255,255,0.85);
      text-decoration: none;
      font-size: 0.95rem;
      font-weight: 500;
      transition: all 0.3s ease;
      position: relative;
    }
    .forgot-password::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: linear-gradient(90deg, #00d4ff, transparent);
      transition: width 0.3s ease;
    }
    .forgot-password:hover {
      color: #ffffff;
    }
    .forgot-password:hover::after {
      width: 100%;
    }
    .demo-info {
      background: rgba(255,255,255,0.08);
      border-radius: 16px;
      padding: 1.25rem;
      margin-top: 1.75rem;
      text-align: center;
      border: 1px solid rgba(255,255,255,0.15);
      backdrop-filter: blur(15px);
    }
    .demo-info h6 {
      color: rgba(255,255,255,0.95);
      margin-bottom: 0.75rem;
      font-weight: 700;
      font-size: 1rem;
    }
    .demo-info p {
      color: rgba(255,255,255,0.8);
      margin: 0;
      font-size: 0.95rem;
      font-weight: 500;
    }
    .alert {
      border-radius: 16px;
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255,255,255,0.2);
      margin-bottom: 1.5rem;
    }
    @media (max-width: 480px) {
      .login-container {
        margin: 1.5rem;
        border-radius: 24px;
      }
      .login-body {
        padding: 2rem 1.75rem;
      }
    }
  </style>
</head>
<body>
  <div class="water-bubbles">
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
  </div>
  
  <div class="login-container">
    <!-- Header -->
    <div class="login-header">
      <div class="logo">
        <i class="bi bi-droplet-fill"></i>
      </div>
      <h1 class="login-title">Welcome Back</h1>
      <p class="login-subtitle">Masuk ke sistem admin dengan akun Anda</p>
    </div>
    
    <!-- Form -->
    <div class="login-body">
      <!-- Session Status -->
      @if (session('status'))
        <div class="alert alert-success" style="background: rgba(0, 212, 255, 0.15); color: white;">
          {{ session('status') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger" style="background: rgba(255, 85, 85, 0.15); color: white;">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="form-floating">
          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus autocomplete="username">
          <label for="email">Alamat Email</label>
          <div class="input-line"></div>
          <i class="bi bi-envelope-fill input-icon"></i>
        </div>

        <!-- Password -->
        <div class="form-floating">
          <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
          <label for="password">Kata Sandi</label>
          <div class="input-line"></div>
          <i class="bi bi-lock-fill input-icon"></i>
        </div>

        <!-- Remember & Forgot -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
              Ingat saya
            </label>
          </div>
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="forgot-password">
              Lupa Password?
            </a>
          @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="login-btn">
          <i class="bi bi-box-arrow-in-right me-2"></i>
          Masuk ke Dashboard
        </button>
      </form>

      <div class="text-center mt-4">
        <a href="{{ route('register') }}" class="text-white text-decoration-none font-semibold" style="font-size: 0.95rem;">
          Belum punya akun? <strong>Buat sekarang</strong>
        </a>
      </div>

      <!-- Demo Info -->
      <div class="demo-info">
        <h6><i class="bi bi-info-circle-fill me-1"></i>Demo Akun</h6>
        <p><strong></strong><br><strong></strong></p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Enhanced ripple effect
    document.querySelectorAll('.login-btn, .form-control').forEach(btn => {
      btn.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        ripple.style.cssText = `
          position: absolute;
          border-radius: 50%;
          background: rgba(255,255,255,0.4);
          transform: scale(0);
          animation: rippleEffect 0.6s linear;
          width: ${size}px;
          height: ${size}px;
          left: ${x}px;
          top: ${y}px;
        `;
        this.appendChild(ripple);
        setTimeout(() => ripple.remove(), 600);
      });
    });
    
    const style = document.createElement('style');
    style.textContent = `
      @keyframes rippleEffect {
        to {
          transform: scale(4);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  </script>
</body>
</html>

