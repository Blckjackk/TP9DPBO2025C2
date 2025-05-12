<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelepon($i) . "</td>
			<td>
				<a href='index.php?id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-warning btn-sm'>Edit</a>
				<a href='index.php?id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Delete</a>

			</td> </tr>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function tampilAdd()
	{
		$data = null;

		$data .= "<form method='POST' action='index.php'>
			<div class='mb-3'>
				<label>NIM</label>
				<input type='text' name='nim' value='' class='form-control'>
			</div>
			<div class='mb-3'>
				<label>NAMA</label>
				<input type='text' name='nama' value='' class='form-control'>
			</div>
			<div class='mb-3'>
				<label>TEMPAT</label>
				<input type='text' name='tempat' value='' class='form-control'>
			</div>
			<div class='mb-3'>
				<label>TANGGAL LAHIR</label>
				<input type='date' name='tl' value='' class='form-control'>
			</div>
			<div class='mb-3'>
				<label>GENDER</label>
				<select name='gender' class='form-control'>
					<option value='Laki-laki'>Laki-laki</option>
					<option value='Perempuan'>Perempuan</option>
				</select>
			</div>
			<div class='mb-3'>
				<label>EMAIL</label>
				<input type='email' name='email' value='' class='form-control'>
			</div>
			<div class='mb-3'>
				<label>TELEPON</label>
				<input type='text' name='telp' value='' class='form-control'>
			</div>
			<button type='submit' name='submit' class='btn btn-primary'>Simpan</button>
		</form>";

		// Menggunakan Template untuk menampilkan halaman
		$this->tpl = new Template("templates/addpage.html");
		$this->tpl->replace("FORMNYA", $data);
		$this->tpl->write();
	}

	function addData()
	{
		// Ambil data dari form
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$tempat = $_POST['tempat'];
		$tl = $_POST['tl'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		// Proses data mahasiswa
		$this->prosesmahasiswa = new ProsesMahasiswa();
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$this->prosesmahasiswa->addData($nim, $nama, $tempat, $tl, $gender, $email, $telp);
	}

	function tampilUpdate($id)
	{
		// Pastikan data mahasiswa diproses berdasarkan ID
		$this->prosesmahasiswa->prosesDataMahasiswa();
		
		// Ambil data mahasiswa berdasarkan ID
		$mhs = $this->prosesmahasiswa->getMahasiswaById($id); // Ambil objek mahasiswa berdasarkan id

		// Cek jika mahasiswa ditemukan
		if (!$mhs) {
			echo "Data mahasiswa tidak ditemukan.";
			return;
		}

		// Buat form dengan data mahasiswa yang sudah ada
		$data = "<form method='POST' action=''>
			<input type='hidden' name='id' value='" . $mhs->getId() . "'>
			<div class='mb-3'>
				<label>NIM</label>
				<input type='text' name='nim' value='" . $mhs->getNim() . "' class='form-control'>
			</div>
			<div class='mb-3'>
				<label>NAMA</label>
				<input type='text' name='nama' value='" . $mhs->getNama() . "' class='form-control'>
			</div>
			<div class='mb-3'>
				<label>TEMPAT</label>
				<input type='text' name='tempat' value='" . $mhs->getTempat() . "' class='form-control'>
			</div>
			<div class='mb-3'>
				<label>TANGGAL LAHIR</label>
				<input type='date' name='tl' value='" . $mhs->getTl() . "' class='form-control'>
			</div>
			<div class='mb-3'>
				<label>GENDER</label>
				<select name='gender' class='form-control'>
					<option value='Laki-laki' " . ($mhs->getGender() == 'Laki-laki' ? 'selected' : '') . ">Laki-laki</option>
					<option value='Perempuan' " . ($mhs->getGender() == 'Perempuan' ? 'selected' : '') . ">Perempuan</option>
				</select>
			</div>
			<div class='mb-3'>
				<label>EMAIL</label>
				<input type='email' name='email' value='" . $mhs->getEmail() . "' class='form-control'>
			</div>
			<div class='mb-3'>
				<label>TELEPON</label>
				<input type='text' name='telp' value='" . $mhs->getTelepon() . "' class='form-control'>
			</div>
			<button type='submit' name='submit' class='btn btn-primary'>Simpan</button>
		</form>";

		// Memasukkan data form ke template
		$this->tpl = new Template("templates/addpage.html");
		$this->tpl->replace("FORMNYA", $data);
		$this->tpl->write();
	}


	function tampilDelete($id)
	{
	}


}
