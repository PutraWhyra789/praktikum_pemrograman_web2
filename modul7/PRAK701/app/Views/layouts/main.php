<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        
        .sb-topnav {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        
        #layoutSidenav {
            display: flex;
            margin-top: 56px; /* Tinggi navbar */
        }

        #layoutSidenav_nav {
            width: 225px;
            height: calc(100vh - 56px);
            position: fixed;
            z-index: 10;
            background-color: #212529;
            color: white;
            left: 0;
            transition: left 0.3s ease-in-out;
        }

        body.sb-sidenav-toggled #layoutSidenav_nav {
            left: -225px;
        }

        #layoutSidenav_content {
            margin-left: 225px;
            width: calc(100% - 225px);
            min-height: calc(100vh - 56px);
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease-in-out, width 0.3s ease-in-out;
        }

        body.sb-sidenav-toggled #layoutSidenav_content {
            margin-left: 0;
            width: 100%;
        }
        
        .sb-sidenav-menu {
            padding-top: 1rem;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.5);
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
        }
        
        .nav-link:hover {
            color: rgba(255, 255, 255, 0.75);
        }
        
        .nav-link.active {
            color: white;
            font-weight: 500;
        }
        
        .nav-link i {
            margin-right: 0.5rem;
        }
        
        .sb-sidenav-footer {
            padding: 0.75rem;
            background-color: #343a40;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        
        main {
            flex-grow: 1;
            padding: 1rem;
            width: 100%;
        }
        
        footer {
            padding: 0.75rem;
            background-color: #f8f9fa;
            text-align: center;
        }

        .vertical-menu {
            display: flex;
            flex-direction: column;
        }

        .vertical-menu .nav-link {
            border-left: 3px solid transparent;
            margin-bottom: 5px;
        }

        .vertical-menu .nav-link.active {
            border-left: 3px solid #0d6efd;
            background-color: rgba(13, 110, 253, 0.1);
        }

        .vertical-menu .nav-link:hover {
            border-left: 3px solid #0d6efd;
            background-color: rgba(13, 110, 253, 0.05);
        }

        .table-compact th, .table-compact td {
            padding: 0.5rem;
        }

        .form-compact .form-floating {
            margin-bottom: 0.75rem;
        }

        .form-compact .card-body {
            padding: 1rem;
        }

        .form-compact .card-header, .form-compact .card-footer {
            padding: 0.75rem 1rem;
        }

        .container-fluid {
            padding: 0.5rem 1rem;
            width: 100%;
            max-width: 100%;
        }

        .breadcrumb {
            margin-bottom: 0.5rem;
            padding: 0.5rem 0;
        }

        h1, h2, h3, h4, h5, h6 {
            margin-bottom: 0.5rem;
        }

        .card {
            margin-bottom: 1rem;
            width: 100%;
        }
        
        .dataTables_wrapper {
            width: 100%;
        }
        
        .table {
            width: 100% !important;
        }
    </style>
</head>
<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="<?= base_url('dashboard') ?>">Sistem Manajemen Buku</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav ms-auto me-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i> <?= session()->get('username') ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav vertical-menu">
                        <a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                        
                        <a class="nav-link <?= strpos(uri_string(), 'books') !== false ? 'active' : '' ?>" href="<?= base_url('books') ?>">
                            <i class="fas fa-book"></i> Buku
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?= session()->get('username') ?>
                </div>
            </nav>
        </div>
        
        <div id="layoutSidenav_content">
            <main>
                <?= $this->renderSection('content') ?>
            </main>
            
            <footer class="py-2 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div>Copyright &copy; Sistem Manajemen Buku <?= date('Y') ?></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-center",
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
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    
                    if (document.body.classList.contains('sb-sidenav-toggled')) {
                        localStorage.setItem('sb|sidebar-toggle', 'true');
                    } else {
                        localStorage.setItem('sb|sidebar-toggle', 'false');
                    }
                });
            }
            
            const sidebarToggled = localStorage.getItem('sb|sidebar-toggle') === 'true';
            if (sidebarToggled) {
                document.body.classList.add('sb-sidenav-toggled');
            }
            
            anime({
                targets: '#layoutSidenav_nav',
                translateX: [-225, 0],
                duration: 800,
                easing: 'easeOutExpo',
                complete: function() {
                    if (!document.body.classList.contains('sb-sidenav-toggled')) {
                        document.querySelector('#layoutSidenav_nav').style.transform = '';
                    }
                }
            });
        });
    </script>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>