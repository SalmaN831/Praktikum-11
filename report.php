<?php
//menghubungkan ke file koneksi.php
include('koneksi.php');
//menghubungkan ke file autoload.inc.php
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
//mengambil data dari tabel tb_siswa
$query = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
//membuat header
$html = '<center><h3>Daftar Nama Siswa</h3></center></br>';
//membuat kolom pada tabel
$html = '<table border="1" width="100%">
<tr>
<th>No</th>
<th>Nama</th>
<th>Kelas</th>
<th>Alamat</th>
</tr>';
$no = 1;
//melakukan perulangan untuk mencetak isi database
while($row = mysqli_fetch_array($query)){
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['nama']."</td>
    <td>".$row['kelas']."</td>
    <td>".$row['alamat']."</td>
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadhtml($html);
//setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
//rendering dari html ke pdf
$dompdf->render();
//melakukan output file pdf
$dompdf->stream('laporan_siswa.pdf')
?>