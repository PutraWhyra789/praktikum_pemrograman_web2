<div class="bg-white rounded-lg shadow-md p-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800 content-animate">Profil Mahasiswa</h2>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="md:col-span-1 content-animate">
            <div class="mb-4 h-full card-container" style="min-height: 350px;">
                <div class="profile-card">
                    <div class="card-front">
                        <img 
                            src="<?= base_url($student['foto']) ?>" 
                            alt="Foto Profil" 
                            class="w-full h-full rounded-lg shadow-md"
                        >
                    </div>
                    <div class="card-back">
                        <h3 class="text-xl font-bold text-purple-700 mb-3">Kontak Saya</h3>
                        <p class="text-gray-700 mb-2"><i class="fas fa-envelope mr-2"></i>2310817210029@mhs.ulm.ac.id</p>
                        <p class="text-gray-700 mb-2"><i class="fas fa-phone mr-2"></i>+6281294741892</p>
                        <div class="mt-4 flex space-x-3">
                            <a href="https://www.linkedin.com/in/putra-whyra-pratama-s/" class="text-blue-600 hover:text-blue-800"><i class="fab fa-linkedin fa-lg"></i></a>
                            <a href="https://www.instagram.com/putra_whyra789/" class="text-blue-400 hover:text-blue-600"><i class="fab fa-instagram fa-lg"></i></a>
                            <a href="https://github.com/PutraWhyra789" class="text-gray-800 hover:text-black"><i class="fab fa-github fa-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-2">
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm mb-6 content-animate">
                <h3 class="text-2xl font-bold mb-2 text-gray-800"><?= $student['nama'] ?></h3>
                <p class="profile-info text-lg text-gray-600 mb-4">NIM: <?= $student['nim'] ?></p>
                <p class="profile-info text-gray-700 mb-4">Program Studi: <?= $student['prodi'] ?></p>
                <p class="profile-info text-gray-700"><?= $student['info_tambahan'] ?></p>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-green-50 p-5 rounded-lg border border-green-200 content-animate">
                    <h3 class="font-semibold text-xl mb-3 text-green-800">Hobi</h3>
                    <ul class="list-none pl-0 space-y-3">
                        <?php foreach ($student['hobi'] as $index => $hobi): 
                            $hobiIcon = '';
                            if (strpos(strtolower($hobi), 'catur') !== false) {
                                $hobiIcon = 'chess';
                            } elseif (strpos(strtolower($hobi), 'fesnuk') !== false || strpos(strtolower($hobi), 'scroll') !== false) {
                                $hobiIcon = 'mobile-alt';
                            } elseif (strpos(strtolower($hobi), 'game') !== false) {
                                $hobiIcon = 'gamepad';
                            } elseif (strpos(strtolower($hobi), 'musik') !== false || strpos(strtolower($hobi), 'mendengarkan') !== false) {
                                $hobiIcon = 'headphones';
                            }
                        ?>
                            <li class="flex items-center">
                                <span class="hobby-icon inline-flex items-center justify-center w-10 h-10 rounded-full bg-green-100 text-green-500 mr-3">
                                    <i class="fas fa-<?= $hobiIcon ?>"></i>
                                </span>
                                <span class="text-gray-700"><?= $hobi ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="bg-purple-50 p-5 rounded-lg border border-purple-200 content-animate">
                    <h3 class="font-semibold text-xl mb-3 text-purple-800">Skills</h3>
                    <div class="space-y-4">
                        <?php foreach ($student['skills'] as $index => $skill): 
                            $percent = rand(70, 95);
                            
                            $skillIcon = '';
                            $iconPrefix = 'fab';
                            
                            if (strtolower($skill) === 'python') {
                                $skillIcon = 'python';
                            } elseif (strtolower($skill) === 'linux') {
                                $skillIcon = 'linux';
                            } elseif (strtolower($skill) === 'r') {
                                $skillIcon = 'r-project';
                            } elseif (strtolower($skill) === 'osint') {
                                $skillIcon = 'search';
                                $iconPrefix = 'fas';
                            }
                        ?>
                            <div class="relative pt-1">
                                <div class="flex mb-2 items-center justify-between">
                                    <div class="flex items-center">
                                        <span class="skill-icon inline-flex items-center justify-center w-8 h-8 rounded-full bg-purple-100 text-purple-500 mr-2">
                                            <i class="<?= $iconPrefix ?> fa-<?= $skillIcon ?>"></i>
                                        </span>
                                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-purple-600 bg-purple-200">
                                            <?= $skill ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-purple-200">
                                    <div class="skill-bar-fill shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500" style="width: 0%" data-percent="<?= $percent ?>"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="<?= base_url('assets/animation.js') ?>"></script>