<?php
//menghubungkan ke file koneksi.php
include('koneksi.php');
//menghubungkan ke file autoload.inc.php
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
//mengambil data dari tabel data_peserta_didik
$query = mysqli_query($koneksi, "SELECT * FROM data_peserta_didik");
//membuat header
$html = '<center><h3>Daftar Peserta Didik</h3></center></br>';
//membuat kolom pada tabel
$html = '<table border="1" width="100%">
<tr>
<th>No</th>
<th>Jenis Pendaftaran</th>
<th>Tanggal Masuk Sekolah</th>
<th>NIS</th>
<th>No. Peserta</th>
<th>Pernah Paud</th>
<th>Pernah TK</th>
<th>No. SKHUN</th>
<th>No. Ijazah</th>
<th>Hobi</th>
<th>Cita-Cita</th>
<th>Nama</th>
<th>Jenis Kelamin</th>
<th>NISN</th>
<th>NIK</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Agama</th>
<th>Berkebutuhan Khusus</th>
<th>Jalan</th>
<th>RT</th>
<th>RW</th>
<th>Dusun</th>
<th>Desa</th>
<th>Kecamatan</th>
<th>Kode Pos</th>
<th>Tempat Tinggal</th>
<th>Modal Transportasi</th>
<th>No. HP</th>
<th>No. Telepon</th>
<th>Email</th>
<th>Penerima KPS/PKH/KIP</th>
<th>No. KPS/KKS/PKH/KIP</th>
<th>Kewarganegaraan</th>
<th>Negara</th>
</tr>';
$no = 1;
//mencetak isi database
while($row = mysqli_fetch_array($query)){
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['jenis_pendaftaran']."</td>
    <td>".$row['tanggal_masuk']."</td>
    <td>".$row['nis']."</td>
    <td>".$row['no_peserta']."</td>
    <td>".$row['paud']."</td>
    <td>".$row['tk']."</td>
    <td>".$row['no_skhun']."</td>
    <td>".$row['no_ijazah']."</td>
    <td>".$row['hobi']."</td>
    <td>".$row['cita_cita']."</td>
    <td>".$row['nama']."</td>
    <td>".$row['jenis_kelamin']."</td>
    <td>".$row['nisn']."</td>
    <td>".$row['nik']."</td>
    <td>".$row['tempat_lahir']."</td>
    <td>".$row['tanggal_lahir']."</td>
    <td>".$row['agama']."</td>
    <td>".$row['berkebutuhan_khusus']."</td>
    <td>".$row['alamat']."</td>
    <td>".$row['rt']."</td>
    <td>".$row['rw']."</td>
    <td>".$row['nama_dusun']."</td>
    <td>".$row['kelurahan']."</td>
    <td>".$row['kecamatan']."</td>
    <td>".$row['kodepos']."</td>
    <td>".$row['tempat_tinggal']."</td>
    <td>".$row['transportasi']."</td>
    <td>".$row['hp']."</td>
    <td>".$row['telp']."</td>
    <td>".$row['email']."</td>
    <td>".$row['penerima_kps']."</td>
    <td>".$row['no_kps']."</td>
    <td>".$row['kewarganegaraan']."</td>
    <td>".$row['negara']."</td>
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadhtml($html);
//setting ukuran dan orientasi kertas
$dompdf->setPaper('A1', 'landscape');
//rendering dari html ke pdf
$dompdf->render();
//melakukan output file pdf
$dompdf->stream('laporan_peserta_didik.pdf')
?>