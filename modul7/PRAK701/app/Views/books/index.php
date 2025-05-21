<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="mt-2 mb-2">Daftar Buku</h1>
    <ol class="breadcrumb mb-2">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Daftar Buku</li>
    </ol>
    
    <div class="card shadow border-0 rounded-lg">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white py-2">
            <div><i class="fas fa-book me-1"></i> Data Buku</div>
            <a href="<?= base_url('books/new') ?>" class="btn btn-light btn-sm">
                <i class="fas fa-plus-circle me-1"></i>Tambah Buku
            </a>
        </div>
        <div class="card-body p-0">
            <table id="datatablesBooks" class="table table-striped table-hover table-compact mb-0 w-100">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="30%">Judul</th>
                        <th width="20%">Penulis</th>
                        <th width="20%">Penerbit</th>
                        <th width="10%">Tahun</th>
                        <th width="15%" class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= $book['id'] ?></td>
                        <td><?= $book['judul'] ?></td>
                        <td><?= $book['penulis'] ?></td>
                        <td><?= $book['penerbit'] ?></td>
                        <td><?= $book['tahun_terbit'] ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="<?= base_url('books/edit/' . $book['id']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('books/delete/' . $book['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#datatablesBooks').DataTable({
            responsive: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                zeroRecords: "Tidak ada data yang ditemukan",
                info: "Halaman _PAGE_ dari _PAGES_",
                infoEmpty: "Tidak ada data",
                infoFiltered: "(dari _MAX_ total data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            },
            dom: '<"row"<"col-md-6"l><"col-md-6"f>>rt<"row"<"col-md-6"i><"col-md-6"p>>',
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
            autoWidth: false,
            columnDefs: [
                { width: "5%", targets: 0 },
                { width: "30%", targets: 1 },
                { width: "20%", targets: 2 },
                { width: "20%", targets: 3 },
                { width: "10%", targets: 4 },
                { width: "15%", targets: 5, orderable: false }
            ]
        });
        
        anime({
            targets: '.card',
            translateY: [20, 0],
            opacity: [0, 1],
            duration: 800,
            easing: 'easeOutExpo'
        });
    });
</script>
<?= $this->endSection() ?>