<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GemDentalRepair - Log in</title>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/bootstrap.min.css')); ?>">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image:url('<?php echo e(asset('public/Frame4.png')); ?>');
            background-color:#155DFC;
            /* background-color: #f5f5f5; */
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
            padding: 48px 40px;
            width: 100%;
            max-width: 420px;
        }

        .login-brand {
            font-size: 24px;
            font-weight: 700;
            color: #1e40af;
            text-align: center;
            margin-bottom: 8px;
        }

        .login-title {
            font-size: 32px;
            font-weight: 700;
            color: #000000;
            text-align: center;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            font-size: 16px;
            color: #1f2937;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .password-container {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
        }

        .password-input-group {
            flex: 1;
        }

        .forgot-password-link {
            font-size: 14px;
            color: #2563eb;
            text-decoration: none;
            margin-left: 12px;
            padding-top: 8px;
            white-space: nowrap;
        }

        .forgot-password-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            background-color: #2563eb;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-bottom: 24px;
        }

        .btn-login:hover {
            background-color: #1d4ed8;
        }

        .btn-login:active {
            background-color: #1e40af;
        }

        .support-container {
            text-align: center;
            font-size: 14px;
            color: #6b7280;
        }

        .support-link {
            color: #2563eb;
            text-decoration: none;
        }

        .support-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        .alert {
            padding: 12px 16px;
            margin-bottom: 24px;
            border-radius: 8px;
            font-size: 14px;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-brand">GemDentalRepair</div>
        <h1 class="login-title">Log in</h1>



        <?php if(isset($message) AND !empty($message)): ?>
            <div class="alert alert-danger">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(url('/login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    readonly
                    onfocus="this.removeAttribute('readonly')"
                    class="form-control"
                    placeholder="user@email.com"
                    value="<?php echo e(old('email')); ?>"
                    required

                >
            </div>

            <div class="password-container mb-0">
                <div class="password-input-group">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="*******"
                        required
                    >
                </div>
            </div>
            <span>
                <a href="#" class="forgot-password-link" style="margin: 10px 0;padding: 0;float: right;">Forgot Password?</a>
            </span>
            <button type="submit" class="btn-login">Log in</button>
        </form>

        <div class="support-container">
            Having trouble? <a href="#" class="support-link">Contact Support</a>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/u246429533/domains/gemdentalrepair.com/public_html/crm/resources/views/login.blade.php ENDPATH**/ ?>