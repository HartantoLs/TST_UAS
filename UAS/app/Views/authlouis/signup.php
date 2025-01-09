<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Learning Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #5A6C57;
            --primary-dark: #5A6C57;
            --secondary-color: #85A98F;
            --text-color: #5A6C57;
            --error-color: #dc3545;
            --success-color: #198754;
        }

        body {
            min-height: 100vh;
            background-color: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: var(--text-color);
            padding: 1rem;
        }

        .auth-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-header h1 {
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .auth-header .icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(139, 169, 137, 0.2);
        }

        .btn {
            width: 100%;
            padding: 0.75rem 1rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
        }

        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .alert-danger {
            background-color: #ffe3e3;
            border: 1px solid var(--error-color);
            color: var(--error-color);
        }

        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
        }

        .auth-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="auth-header">
            <i class="fas fa-user-plus icon"></i>
            <h1>Sign Up</h1>
            <p>Create your account to get started</p>
        </div>

        <form action="/authlouis/signupProcess" method="post">
            <div class="form-group">
                <label class="form-label" for="name">Username</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="Choose a username">
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="Create a password">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-user-plus me-2"></i>Sign Up
            </button>
        </form>

        <div class="auth-footer">
            <p>Already have an account? <a href="/authlouis/login">Login</a></p>
        </div>
    </div>
</body>
</html>

