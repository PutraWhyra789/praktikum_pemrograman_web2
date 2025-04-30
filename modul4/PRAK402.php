<!DOCTYPE html>
<html>
    <body>
        <?php
        $mahasiswa = [
            [
                'Nama' => 'Andi',
                'NIM' => '2101001',
                'Nilai UTS' => 87,
                'Nilai UAS' => 65
            ],
            [
                'Nama' => 'Budi',
                'NIM' => '2101002',
                'Nilai UTS' => 76,
                'Nilai UAS' => 79
            ],
            [
                'Nama' => 'Tono',
                'NIM' => '2101003',
                'Nilai UTS' => 50,
                'Nilai UAS' => 41
            ],
            [
                'Nama' => 'Jessica',
                'NIM' => '2101004',
                'Nilai UTS' => 60,
                'Nilai UAS' => 75
            ]
        ];

        foreach ($mahasiswa as &$mhs) {
            $nilai_akhir = (0.4 * $mhs['Nilai UTS']) + (0.6 * $mhs['Nilai UAS']);
            $mhs['Nilai Akhir'] = round($nilai_akhir, 1);
            
            if ($mhs['Nilai Akhir'] >= 80) {
                $huruf = 'A';
            } elseif ($mhs['Nilai Akhir'] >= 70) {
                $huruf = 'B';
            } elseif ($mhs['Nilai Akhir'] >= 60) {
                $huruf = 'C';
            } elseif ($mhs['Nilai Akhir'] >= 50) {
                $huruf = 'D';
            } else {
                $huruf = 'E';
            }
            $mhs['Huruf'] = $huruf;
        }
        unset($mhs);

        echo "<table border='1' cellpadding='5' cellspacing='0'>;
            <tr style='background-color:rgba(129, 125, 125, 0.4)'>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Huruf</th>
            </tr>";
        foreach ($mahasiswa as $m) {
            echo "<tr>
                <td>{$m['Nama']}</td>
                <td>{$m['NIM']}</td>
                <td>{$m['Nilai UTS']}</td>
                <td>{$m['Nilai UAS']}</td>
                <td>{$m['Nilai Akhir']}</td>
                <td>{$m['Huruf']}</td>
            </tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>