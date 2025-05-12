<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang berisikan tabel dari mahasiswa
class TabelMahasiswa extends DB
{
	function getMahasiswa()
	{
		// Query mysql select data mahasiswa
		$query = "SELECT * FROM mahasiswa";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getMahasiswaById($id)
    {
        $query = "SELECT * FROM mahasiswa WHERE id = '$id'";
        return $this->execute($query);
    }

	function addData($nim, $nama, $tempat, $tl, $gender, $email, $telp) {
		$query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, email, telp)
				VALUES ('$nim', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";

		$result = $this->execute($query);

		// Cek hasil eksekusi
		if ($result) {
			// Jika berhasil menambahkan data
			echo "Data berhasil ditambahkan.";
		} else {
			// Jika gagal menambahkan data
			echo "Gagal menambahkan data.";
		}
	}



	function updateData($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		$query = "UPDATE mahasiswa SET 
					nim = '$nim', 
					nama = '$nama', 
					tempat = '$tempat', 
					tl = '$tl', 
					gender = '$gender', 
					email = '$email', 
					telp = '$telp'
				WHERE id = '$id'";
		return $this->execute($query);
	}

	 function deleteData($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = '$id'";
        return $this->execute($query);
    }

}
