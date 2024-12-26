<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Siap UTBK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #283593;
            --accent-color: #3949ab;
            --light-color: #e8eaf6;
            --text-color: #283593;
            --border-color: #e0e6ed;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            margin: 0;
            background-color: #fff;
        }

        .login-container {
            height: 100vh;
            display: flex;
            overflow: hidden;
        }

        .login-form-section {
            flex: 1;
            padding: 2rem 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 50%;
        }

        .features-section {
            flex: 1;
            background: linear-gradient(135deg, 
                rgba(26, 35, 126, 0.95), 
                rgba(57, 73, 171, 0.9)
            );
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 50%;
        }

        .form-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.8rem 1rem;
            border: 2px solid var(--border-color);
            margin-bottom: 1rem;
            font-size: 0.95rem;
            font-weight: 400;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(57, 73, 171, 0.15);
        }

        .form-label {
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border: none;
            border-radius: 8px;
            padding: 0.8rem;
            width: 100%;
            font-weight: 500;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-top: 3rem;
            width: 100%;
            max-width: 600px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.8rem;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .feature-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .feature-card h4 {
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            font-size: 0.9rem;
            font-weight: 300;
            margin: 0;
            line-height: 1.4;
        }

        .logo-section {
            margin-bottom: 3rem;
        }

        .logo-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .logo-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .logo-section h2 {
            font-size: 1.2rem;
            font-weight: 300;
            opacity: 0.9;
        }

        .form-check-label {
            font-weight: 400;
            color: var(--text-color);
        }

        .form-check-input:checked {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .forgot-password {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .forgot-password:hover {
            color: var(--primary-color);
        }

        .signup-link {
            text-align: center;
            margin-top: 2rem;
            font-weight: 400;
        }

        .signup-link a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link a:hover {
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            .features-section {
                display: none;
            }
            .login-form-section {
                width: 100%;
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Login Form Section -->
        <div class="login-form-section">
            <h2 class="form-title">Welcome back to Siap UTBK</h2>
            
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="/authenticate" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           placeholder="Enter your email" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" 
                           placeholder="Enter your password" required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <a href="/forgot-password" class="forgot-password">
                        Forgot password?
                    </a>
                </div>

                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>

            <p class="signup-link">
                Don't have an account? 
                <a href="/signup">Sign up</a>
            </p>
        </div>

        <!-- Features Section -->
        <div class="features-section">
            <div class="logo-section">
                <i class="fas fa-graduation-cap logo-icon"></i>
                <h1>Siap UTBK</h1>
                <h2>Persiapkan Masa Depanmu</h2>
            </div>

            <div class="feature-grid">
                <div class="feature-card">
                    <i class="fas fa-book-reader feature-icon"></i>
                    <h4>Materi Lengkap</h4>
                    <p>Akses materi pembelajaran yang komprehensif</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-tasks feature-icon"></i>
                    <h4>Latihan Soal</h4>
                    <p>Ribuan soal latihan untuk persiapan</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-users feature-icon"></i>
                    <h4>Komunitas</h4>
                    <p>Bergabung dengan komunitas belajar</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-chart-line feature-icon"></i>
                    <h4>Progress Tracking</h4>
                    <p>Pantau perkembangan belajarmu</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>