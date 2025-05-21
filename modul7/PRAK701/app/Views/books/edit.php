<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="mt-2 mb-2">Edit Buku</h1>
    <ol class="breadcrumb mb-2">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('books') ?>">Daftar Buku</a></li>
        <li class="breadcrumb-item active">Edit Buku</li>
    </ol>
    
    <div class="card shadow border-0 rounded-lg form-compact">
        <div class="card-header bg-warning">
            <h5 class="m-0"><i class="fas fa-edit me-2"></i>Form Edit Buku</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('books/update/' . $book['id']) ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('judul')) ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul', $book['judul']) ?>" placeholder="Judul Buku" required>
                            <label for="judul">Judul Buku</label>
                            <?php if (session('validation') && session('validation')->hasError('judul')): ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('judul') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('penulis')) ? 'is-invalid' : '' ?>" id="penulis" name="penulis" value="<?= old('penulis', $book['penulis']) ?>" placeholder="Penulis" required>
                            <label for="penulis">Penulis</label>
                            <?php if (session('validation') && session('validation')->hasError('penulis')): ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('penulis') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('penerbit')) ? 'is-invalid' : '' ?>" id="penerbit" name="penerbit" value="<?= old('penerbit', $book['penerbit']) ?>" placeholder="Penerbit" required>
                            <label for="penerbit">Penerbit</label>
                            <?php if (session('validation') && session('validation')->hasError('penerbit')): ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('penerbit') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control <?= (session('validation') && session('validation')->hasError('tahun_terbit')) ? 'is-invalid' : '' ?>" id="tahun_terbit" name="tahun_terbit" value="<?= old('tahun_terbit', $book['tahun_terbit']) ?>" min="1900" max="<?= date('Y') ?>" placeholder="Tahun Terbit" required>
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <?php if (session('validation') && session('validation')->hasError('tahun_terbit')): ?>
                                <div class="invalid-feedback">
                                    <?= session('validation')->getError('tahun_terbit') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-3">
                    <a href="<?= base_url('books') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Batal
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-1"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        anime({
            targets: '.card',
            translateY: [20, 0],
            opacity: [0, 1],
            duration: 800,
            easing: 'easeOutExpo'
        });
        
        anime({
            targets: '.form-floating',
            translateX: [-20, 0],
            opacity: [0, 1],
            delay: anime.stagger(100),
            duration: 800,
            easing: 'easeOutExpo'
        });
    });
</script>
<?= $this->endSection() ?>