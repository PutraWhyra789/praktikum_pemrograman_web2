<!DOCTYPE html>
<html>
    <body>
        <?php
        $data = [
            [
                'nama' => 'Ridho',
                'matakuliah' => [
                    ['nama' => 'Pemrograman I', 'sks' => 2],
                    ['nama' => 'Praktikum Pemrograman I', 'sks' => 1],
                    ['nama' => 'Pengantar Lingkungan Lahan Basah', 'sks' => 2],
                    ['nama' => 'Arsitektur Komputer', 'sks' => 3],
                ]
            ],
            [
                'nama' => 'Ratna',
                'matakuliah' => [
                    ['nama' => 'Basis Data I', 'sks' => 2],
                    ['nama' => 'Praktikum Basis Data I', 'sks' => 1],
                    ['nama' => 'Kalkulus', 'sks' => 3],
                ]
            ],
            [
                'nama' => 'Tono',
                'matakuliah' => [
                    ['nama' => 'Rekayasa Perangkat Lunak', 'sks' => 3],
                    ['nama' => 'Analisis dan Perancangan Sistem', 'sks' => 3],
                    ['nama' => 'Komputasi Awan', 'sks' => 3],
                    ['nama' => 'Kecerdasan Bisnis', 'sks' => 3],
                ]
            ],
        ];

        foreach ($data as $key => $mahasiswa) {
            $total_sks = 0;
            foreach ($mahasiswa['matakuliah'] as $mk) {
                $total_sks += $mk['sks'];
            }
            $data[$key]['total_sks'] = $total_sks;
            $data[$key]['keterangan'] = ($total_sks < 7) ? 'Revisi KRS' : 'Tidak Revisi';
        }

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr style='background-color:rgba(129, 125, 125, 0.4)'>
                <th>No</th>
                <th>Nama</th>
                <th>Mata Kuliah diambil</th>
                <th>SKS</th>
                <th>Total SKS</th>
                <th>Keterangan</th>
            </tr>";

        $no = 1;
        foreach ($data as $mahasiswa) {
            $rowspan = count($mahasiswa['matakuliah']);
            foreach ($mahasiswa['matakuliah'] as $i => $mk) {
                echo "<tr>";
                if ($i === 0) {
                    $keterangan = $mahasiswa['keterangan'];
                    $bgcolor = ($keterangan == 'Revisi KRS') ? "style='background-color:red'" : (($keterangan == 'Tidak Revisi') ? "style='background-color:green'" : "");
                    echo "<td>$no</td>";
                    echo "<td>{$mahasiswa['nama']}</td>";
                    echo "<td>{$mk['nama']}</td>";
                    echo "<td>{$mk['sks']}</td>";
                    echo "<td>{$mahasiswa['total_sks']}</td>";
                    echo "<td $bgcolor>{$mahasiswa['keterangan']}</td>";
                } else {
                    echo "<td></td>
                        <td></td>
                        <td>{$mk['nama']}</td>
                        <td>{$mk['sks']}</td>
                        <td></td>
                        <td></td>";
                }
                echo "</tr>";
            }
            $no++;
        }
        echo "</table>";
        ?>
    </body>
</html>