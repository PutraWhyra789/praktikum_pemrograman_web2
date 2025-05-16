<div class="bg-white rounded-lg shadow-md p-8 mb-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800 content-animate">Selamat Datang di Beranda</h2>
    <div class="content-animate bg-blue-50 p-6 rounded-lg border border-blue-200">
        <p class="text-xl mb-4">Halo, nama saya <span class="font-semibold text-blue-600"><?= $student['nama'] ?></span></p>
        <p class="text-xl">NIM saya <span class="font-semibold text-blue-600"><?= $student['nim'] ?></span></p>
    </div>
    <div class="mt-8 content-animate">
        <h3 class="text-2xl font-semibold mb-4 text-gray-700">Tentang Website Ini</h3>
        <p class="text-gray-600 leading-relaxed">
            Website ini dibuat untuk memenuhi tugas Praktikum Pemrograman Web II Modul 6 tentang Pengenalan CodeIgniter.
            Website ini mengimplementasikan konsep MVC (Model, View, Controller) pada framework CodeIgniter 4.
        </p>
    </div>
    <div class="mt-8 content-animate">
        <div class="p-6 bg-purple-50 rounded-lg border border-purple-200">
            <h3 class="text-xl font-semibold mb-3 text-purple-700">Implementasi MVC pada Website Ini:</h3>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li><strong>Model:</strong> StudentModel.php - Menyimpan dan mengambil data mahasiswa</li>
                <li><strong>View:</strong> beranda.php, profil.php, templates/header.php, templates/footer.php</li>
                <li><strong>Controller:</strong> Home.php, Profile.php</li>
            </ul>
        </div>
    </div>
</div>