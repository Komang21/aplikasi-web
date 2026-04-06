<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - Aplikasi Web Admin</title>
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
    .bubble:nth-child(1) { width: 80px; height: 80px; left: 15%; animation-duration: 22s; animation-delay: 0s; }
    .bubble:nth-child(2) { width: 45px; height: 45px; left: 30%; animation-duration: 18s; animation-delay: 3s; }
    .bubble:nth-child(3) { width: 65px; height: 65px; left: 50%; animation-duration: 25s; animation-delay: 1s; }
    .bubble:nth-child(4) { width: 35px; height: 35px; left: 70%; animation-duration: 16s; animation-delay: 4s; }
    .bubble:nth-child(5) { width: 55px; height: 55px; left: 85%; animation-duration: 20s; animation-delay: 2s; }
    .bubble:nth-child(6) { width: 75px; height: 75px; left: 5%; animation-duration: 28s; animation-delay: 5s; }
    @keyframes bubbleFloat {
      0% { transform: translateY(100vh) scale(0); opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { transform: translateY(-100px) scale(1.2); opacity: 0; }
    }
    .register-container {
      backdrop-filter: blur(30px);
      background: rgba(255, 255, 255, 0.12);
      border-radius: 28px;
      border: 1px solid rgba(255, 255, 255, 0.25);
      box-shadow: 
        0 32px 64px rgba(0,0,0,0.2),
        inset 0 1px 0 rgba(255,255,255,0.4),
        0 0 0 1px rgba(255,255,255,0.1);
      overflow: hidden;
      width: 100%;
      max-width: 460px;
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
    .register-header {
      background: linear-gradient(135deg, rgba(255,255,255,0.25) 0%, rgba(255,255,255,0.08) 100%);
      padding: 3rem 2.5rem 1.5rem;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .register-header::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.12) 0%, transparent 70%);
      animation: shimmer 4s infinite;
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
    .register-title {
      font-size: 2.3rem;
      font-weight: 800;
      background: linear-gradient(135deg, #ffffff 0%, #f0f8ff 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 0.5rem;
      position: relative;
      z-index: 2;
      text-shadow: 0 2px 12px rgba(0,0,0,0.1);
    }
    .register-subtitle {
      color: rgba(255,255,255,0.9);
      font-size: 1.1rem;
      font-weight: 400;
      position: relative;
      z-index: 2;
    }
    .register-body {
      padding: 2.5rem 2.5rem 2.5rem;
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
        0 0 0 4px rgba(0, 212, 255, 0.25),
        0 20px 40px rgba(0, 212, 255, 0.2);
      background: rgba(255,255,255,0.2);
      transform: translateY(-3px) scale(1.02);
      border-color: rgba(0, 212, 255, 0.6);
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
    .register-btn {
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
        0 20px 45px rgba(0, 212, 255, 0.45),
        inset 0 1px 0 rgba(255,255,255,0.35);
      position: relative;
      overflow: hidden;
    }
    .register-btn::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: rgba(255,255,255,0.35);
      border-radius: 50%;
      transform: translate(-50%, -50%);
      transition: width 0.6s, height 0.6s;
    }
    .register-btn:hover::before {
      width: 300px;
      height: 300px;
    }
    .register-btn:hover {
      transform: translateY(-6px);
      box-shadow: 
        0 30px 60px rgba(0, 212, 255, 0.55),
        inset 0 1px 0 rgba(255,255,255,0.45);
    }
    .register-btn:active {
      transform: translateY(-3px);
    }
    .register-link {
      color: rgba(255,255,255,0.9);
      text-decoration: none;
      font-size: 1rem;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.75rem 1.25rem;
      border-radius: 12px;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.15);
      margin-top: 1rem;
    }
    .register-link:hover {
      color: white;
      background: rgba(255,255,255,0.15);
      transform: translateX(8px);
      box-shadow: 0 10px 25px rgba(0, 212, 255, 0.2);
    }
    .alert {
      border-radius: 16px;
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255,255,255,0.2);
      margin-bottom: 1.5rem;
    }
    @media (max-width: 480px) {
      .register-container {
        margin: 1.5rem;
        border-radius: 24px;
      }
      .register-body {
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
  
  <div class="register-container">
    <!-- Header -->
    <div class="register-header">
      <div class="logo">
        <i class="bi bi-person-plus-fill"></i>
      </div>
      <h1 class="register-title">Buat Akun Baru</h1>
      <p class="register-subtitle">Daftar untuk mengakses sistem admin</p>
    </div>
    
    <!-- Form -->
    <div class="register-body">
      @if ($errors->any())
        <div class="alert alert-danger" style="background: rgba(255, 85, 85, 0.15); color: white;">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-floating">
          <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus autocomplete="name">
          <label for="name">Nama Lengkap</label>
          <div class="input-line"></div>
          <i class="bi bi-person-fill input-icon"></i>
        </div>

        <!-- Email -->
        <div class="form-floating">
          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="username">
          <label for="email">Alamat Email</label>
          <div class="input-line"></div>
          <i class="bi bi-envelope-fill input-icon"></i>
        </div>

        <!-- Password -->
        <div class="form-floating">
          <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
          <label for="password">Kata Sandi</label>
          <div class="input-line"></div>
          <i class="bi bi-lock-fill input-icon"></i>
        </div>

        <!-- Confirm Password -->
        <div class="form-floating">
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
          <label for="password_confirmation">Konfirmasi Kata Sandi</label>
          <div class="input-line"></div>
          <i class="bi bi-lock input-icon"></i>
        </div>

        <!-- Register Button -->
        <button type="submit" class="register-btn">
          <i class="bi bi-person-plus me-2"></i>
          Buat Akun Saya
        </button>
      </form>

      <div class="text-center">
        <a href="{{ route('login') }}" class="register-link">
          <i class="bi bi-arrow-left"></i>
          Sudah punya akun? Masuk sekarang
        </a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Ripple effect untuk register
    document.querySelectorAll('.register-btn, .form-control').forEach(el => {
      el.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        ripple.style.cssText = \`
          position: absolute;
          border-radius: 50%;
          background: rgba(255,255,255,0.4);
          transform: scale(0);
          animation: rippleEffect 0.7s linear;
          width: \${size}px;
          height: \${size}px;
          left: \${x}px;
          top: \${y}px;
          pointer-events: none;
        \`;
        this.style.position = 'relative';
        this.appendChild(ripple);
        setTimeout(() => ripple.remove(), 700);
      });
    });
    
    const style = document.createElement('style');
    style.textContent = \`
      @keyframes rippleEffect {
        to {
          transform: scale(4);
          opacity: 0;
        }
      }
    \`;
    document.head.appendChild(style);
  </script>
</body>
</html>

