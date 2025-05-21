<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>Total Buku</div>
                        <div class="fs-4"><?= $totalBooks ?></div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url('books') ?>">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-book me-1"></i>
                    Buku Terbaru
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recentBooks as $book): ?>
                                <tr>
                                    <td><?= $book['judul'] ?></td>
                                    <td><?= $book['penulis'] ?></td>
                                    <td><?= $book['tahun_terbit'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-info-circle me-1"></i>
                    Informasi Sistem
                </div>
                <div class="card-body">
                    <p>Selamat datang di Sistem Manajemen Buku!</p>
                    <p>Sistem ini memungkinkan Anda untuk:</p>
                    <ul>
                        <li>Mengelola data buku</li>
                        <li>Menambahkan buku baru</li>
                        <li>Mengedit informasi buku</li>
                        <li>Menghapus buku dari sistem</li>
                    </ul>
                    <p>Gunakan menu di sidebar untuk navigasi.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>