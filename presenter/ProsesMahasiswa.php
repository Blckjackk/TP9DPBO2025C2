<?php

include("KontrakPresenter.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesMahasiswa implements KontrakPresenter
{
	private $tabelmahasiswa;
	private $data = [];

	function __construct()
	{
		// Konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
			$this->data = array(); // instansi list untuk data Mahasiswa
		} catch (Exception $e) {
			echo "yah error" . $e->getMessage();
		}
	}

	function prosesDataMahasiswa()
	{
		try {
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->getMahasiswa();

			while ($row = $this->tabelmahasiswa->getResult()) {
				// ambil hasil query
				$mahasiswa = new Mahasiswa(); // instansiasi objek mahasiswa untuk setiap data mahasiswa
				$mahasiswa->setId($row['id']); // mengisi id
				$mahasiswa->setNim($row['nim']); // mengisi nim
				$mahasiswa->setNama($row['nama']); // mengisi nama
				$mahasiswa->setTempat($row['tempat']); // mengisi tempat
				$mahasiswa->setTl($row['tl']); // mengisi tl
				$mahasiswa->setGender($row['gender']); // mengisi gender
				$mahasiswa->setEmail($row['email']); // mengisi gender
				$mahasiswa->setTelepon($row['telp']); // mengisi gender

				$this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
			}
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 2" . $e->getMessage();
		}
	}

	function getId($i)
	{
		// mengembalikan id mahasiswa dengan indeks ke i
		return $this->data[$i]->id;
	}
	function getNim($i)
	{
		// mengembalikan nim mahasiswa dengan indeks ke i
		return $this->data[$i]->nim;
	}
	function getNama($i)
	{
		// mengembalikan nama mahasiswa dengan indeks ke i
		return $this->data[$i]->nama;
	}
	function getTempat($i)
	{
		// mengembalikan tempat mahasiswa dengan indeks ke i
		return $this->data[$i]->tempat;
	}
	function getTl($i)
	{
		// mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
		return $this->data[$i]->tl;
	}
	function getGender($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->gender;
	}
	function getEmail($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->email;
	}
	function getTelepon($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->telepon;
	}
	function getSize()
	{
		return sizeof($this->data);
	}

	function addData($nim, $nama, $tempat, $tl, $gender, $email, $telp) {
    // Proses data mahasiswa di model
		$this->tabelmahasiswa = new TabelMahasiswa('localhost', 'root', '', 'mvp_php');
		$this->tabelmahasiswa->addData($nim, $nama, $tempat, $tl, $gender, $email, $telp);
	}

	function updateData($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp) {
        $this->tabelmahasiswa = new TabelMahasiswa('localhost', 'root', '', 'mvp_php');
        $this->tabelmahasiswa->open();
        $result = $this->tabelmahasiswa->updateData($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
        $this->tabelmahasiswa->close();
        return $result;
    }

    function deleteData($id) {
        $this->tabelmahasiswa = new TabelMahasiswa('localhost', 'root', '', 'mvp_php');
        $this->tabelmahasiswa->open();
        $result = $this->tabelmahasiswa->deleteData($id);
        $this->tabelmahasiswa->close();
        return $result;
    }

	function getMahasiswaById($id)
    {
        // Menggunakan $this->data yang sudah berisi data mahasiswa
        foreach ($this->data as $mhs) {
            if ($mhs->getId() == $id) {
                return $mhs;
            }
        }
        return null;  // Jika mahasiswa dengan ID tersebut tidak ditemukan
    }

}
