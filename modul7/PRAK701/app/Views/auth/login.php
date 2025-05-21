<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .login-title {
            text-align: center;
            margin-bottom: 2rem;
        }
        .form-floating {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-title">
            <h2>Sistem Manajemen Buku</h2>
            <p class="text-muted">Silakan login untuk melanjutkan</p>
        </div>
        
        <form action="<?= base_url('login') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <label for="username">Username</label>
            </div>
            
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        
        <div class="mt-3 text-center">
            <p class="text-muted">Demo account: admin / password123</p>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        
        <?php if (session()->getFlashdata('success')) : ?>
            toastr.success('<?= session()->getFlashdata('success') ?>');
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')) : ?>
            toastr.error('<?= session()->getFlashdata('error') ?>');
        <?php endif; ?>
        
        document.addEventListener('DOMContentLoaded', function() {
            anime({
                targets: '.login-container',
                translateY: [50, 0],
                opacity: [0, 1],
                duration: 1000,
                easing: 'easeOutExpo'
            });
        });
    </script>
</body>
</html>