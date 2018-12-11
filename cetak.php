<?php
  	require_once 'core/connection.php';
	require 'fpdf.php';
	session_start();
	$email = $_SESSION["user"];


	$query_pria = "SELECT * FROM tbl_pria WHERE email='$email'";
	$query_ibu_pria = "SELECT * FROM tbl_ibu_pria WHERE email='$email'";
	$query_ayah_pria = "SELECT * FROM tbl_ayah_pria WHERE email='$email'";
	$query_wanita = "SELECT * FROM tbl_wanita WHERE email='$email'";
	$query_ibu_wanita = "SELECT * FROM tbl_ibu_wanita WHERE email='$email'";
	$query_ayah_wanita = "SELECT * FROM tbl_ayah_wanita WHERE email='$email'";

	$result_pria = mysqli_query($conn, $query_pria);	
	$result_ibu_pria = mysqli_query($conn, $query_ibu_pria);
	$result_ayah_pria = mysqli_query($conn, $query_ayah_pria);
	$result_wanita = mysqli_query($conn, $query_wanita);	
	$result_ibu_wanita = mysqli_query($conn, $query_ibu_wanita);
	$result_ayah_wanita = mysqli_query($conn, $query_ayah_wanita);

	$pdf = new FPDF('p', 'mm', 'A4');
	$pdf->AddPage();
	// Layout form 1
	$pdf->Ln(5);
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(50,5,'Kantor Desa / Kelurahan',0,0);
	$pdf->Cell(0,5,' : Keputih', 0,1);
	$pdf->Cell(50,5,'Kecamatan',0,0);
	$pdf->Cell(0,5,' : Sukolilo', 0,1);
	$pdf->Cell(50,5,'Kabupaten / Kota',0,0);
	$pdf->Cell(0,5,' : Surabaya', 0,1);
	$pdf->Ln(8);

	$pdf->SetFont('Times', 'BU', 14);
	$pdf->Cell(0,8,'SURAT KETERANGAN UNTUK NIKAH',0,1,'C');
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(0,5,'Nomor : ..................................................',0,1,'C');
	$pdf->Ln(5);

	$pdf->SetFont('Times', '', 11);
	$pdf->Cell(0,10,'Yang bertanda tangan di bawah ini menerangkan dengan sesungguhnya bahwa : ',0,1);

	while($row = mysqli_fetch_assoc($result_pria)){
		$pdf->Cell(70,7,'          1. Nama lengkap dan alias',0,0);
		$pdf->Cell(0,7,' : ' . $row['nama'], 0,1);
		$pdf->Cell(70,7,'          2. Jenis kelamin',0,0);
		$pdf->Cell(0,7,' : ' . $row['gender'], 0,1);
		$pdf->Cell(70,7,'          3. Tempat tanggal lahir',0,0);
		$pdf->Cell(0,7,' : ' . $row['tempat_lahir'] . ", " . $row['tgl_lahir'], 0,1);
		$pdf->Cell(70,7,'          4. Warganegara',0,0);
		$pdf->Cell(0,7,' : ' . $row['warganegara'], 0,1);
		$pdf->Cell(70,7,'          5. Agama',0,0);
		$pdf->Cell(0,7,' : ' . $row['agama'], 0,1);
		$pdf->Cell(70,7,'          6. Pekerjaan',0,0);
		$pdf->Cell(0,7,' : ' . $row['pekerjaan'], 0,1);
		$pdf->Cell(70,7,'          7. Tempat tinggal',0,0);
		$pdf->Cell(0,7,' : ' . $row['alamat'], 0,1);

		while($ayah_pria = mysqli_fetch_assoc($result_ayah_pria)){
			$pdf->Cell(70,7,'          8. Bin / Binti',0,0);
			$pdf->Cell(0,7,' : ' . $ayah_pria['nama'], 0,1);
		}

		$pdf->Cell(70,7,'          9. Status perkawinan',0,0);
		$pdf->Cell(0,7,' : ',0,1);
		$pdf->Cell(70,7,'               a. Jika pria, terangkan jejaka, duda',0,1);
		$pdf->Cell(70,7,'                   atau beristri dan berapa istrinya',0,0);
		$pdf->Cell(0,7,' : ' . $row['status_kawin'], 0,1);
		$pdf->Cell(70,7,'               b. Jika wanita, terangkan perawan',0,1);
		$pdf->Cell(70,7,'                   atau janda',0,0);
		$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
		$pdf->Cell(70,7,'          10. Nama Istri / Suami terdahulu',0,0);
		$pdf->Cell(0,7,' : ' . $row['mantan_istri'], 0,1);
	} // End while
	
	$pdf->Cell(0,10,'Demikianlah, surat keterangan ini dibuat dengan mengingat sumpah jabatan untuk digunakan seperlunya.',0,1);
	$pdf->Ln(10);

	$pdf->Cell(0,10,' .............................. , ...............................................',0,1,'R');
	$pdf->Cell(0,10,'Kepala Desa / Kelurahan .......................................',0,1,'R');
	$pdf->Ln(15);
	$pdf->Cell(0,5, ' ...... *)',0,1,'R');
	$pdf->Cell(0,5,' ........................................................................... *) nama lengkap',0,1);
	// End layout form 1

	// Layout form 2
	$pdf->AddPage();
	$pdf->Ln(5);
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(50,5,'Kantor Desa / Kelurahan',0,0);
	$pdf->Cell(0,5,' : Keputih', 0,1);
	$pdf->Cell(50,5,'Kecamatan',0,0);
	$pdf->Cell(0,5,' : Sukolilo', 0,1);
	$pdf->Cell(50,5,'Kabupaten / Kota',0,0);
	$pdf->Cell(0,5,' : Surabaya', 0,1);
	$pdf->Ln(8);

	$pdf->SetFont('Times', 'BU', 14);
	$pdf->Cell(0,8,'SURAT KETERANGAN ASAL - USUL',0,1,'C');
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(0,5,'Nomor : ..................................................',0,1,'C');
	$pdf->Ln(5);

	$pdf->SetFont('Times', '', 11);
	$pdf->Cell(0,10,'Yang bertanda tangan di bawah ini menerangkan dengan sesungguhnya bahwa : ',0,1);

	$result_ayah_pria = mysqli_query($conn, $query_ayah_pria);
	while($ayah_pria = mysqli_fetch_assoc($result_ayah_pria)){
		$pdf->Cell(70,7,'   I      1. Nama lengkap dan alias',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['nama'], 0,1);
		$pdf->Cell(70,7,'          2. Tempat tanggal lahir',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['tempat_lahir'] . ", " . $row['tgl_lahir'], 0,1);
		$pdf->Cell(70,7,'          3. Warganegara',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['warganegara'], 0,1);
		$pdf->Cell(70,7,'          4. Agama',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['agama'], 0,1);
		$pdf->Cell(70,7,'          5. Pekerjaan',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['pekerjaan'], 0,1);
		$pdf->Cell(70,7,'          6. Tempat tinggal',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['alamat'], 0,1);
	}
	
	$pdf->Cell(0,10,'          adalah benar ayah dan ibu kandung dari seorang : ',0,1);
	
	$result_pria = mysqli_query($conn, $query_pria);	
	while($row = mysqli_fetch_assoc($result_pria)){
		$pdf->Cell(70,7,'   II     1. Nama lengkap dan alias',0,0);
		$pdf->Cell(0,7,' : ' . $row['nama'] . " atau " . $row['alias'], 0,1);
		$pdf->Cell(70,7,'          2. Tempat tanggal lahir',0,0);
		$pdf->Cell(0,7,' : ' . $row['tempat_lahir'] . ", " . $row['tgl_lahir'], 0,1);
		$pdf->Cell(70,7,'          3. Warganegara',0,0);
		$pdf->Cell(0,7,' : ' . $row['warganegara'], 0,1);
		$pdf->Cell(70,7,'          4. Agama',0,0);
		$pdf->Cell(0,7,' : ' . $row['agama'], 0,1);
		$pdf->Cell(70,7,'          5. Pekerjaan',0,0);
		$pdf->Cell(0,7,' : ' . $row['pekerjaan'], 0,1);
		$pdf->Cell(70,7,'          6. Tempat tinggal',0,0);
		$pdf->Cell(0,7,' : ' . $row['alamat'], 0,1);
	}

	$pdf->Cell(0,10,'          dengan seorang wanita : ',0,1);

	while($ibu_pria = mysqli_fetch_assoc($result_ibu_pria)){
		$pdf->Cell(70,7,'          1. Nama lengkap dan alias',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['nama'], 0,1);
		$pdf->Cell(70,7,'          2. Tempat tanggal lahir',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['tempat_lahir'] . ", " . $ibu_pria['tgl_lahir'], 0,1);
		$pdf->Cell(70,7,'          3. Warganegara',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['warganegara'], 0,1);
		$pdf->Cell(70,7,'          4. Agama',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['agama'], 0,1);
		$pdf->Cell(70,7,'          5. Pekerjaan',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['pekerjaan'], 0,1);
		$pdf->Cell(70,7,'          6. Tempat tinggal',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['alamat'], 0,1);
	} // end while ibu

	$pdf->Cell(0,10,'Demikianlah, surat keterangan ini dibuat dengan mengingat sumpah jabatan untuk digunakan seperlunya.',0,1);
	$pdf->Ln(5);

	$pdf->Cell(0,10,'.............................. , ...............................................',0,1,'R');
	$pdf->Cell(0,10,'Kepala Desa / Kelurahan .......................................',0,1,'R');
	$pdf->Ln(15);
	$pdf->Cell(0,5,'........................................................................... *)',0,1,'R');
	$pdf->Cell(0,5,'*) nama lengkap',0,1);
	//End layout form 2

	//Layout form 3
	$pdf->AddPage();
	$pdf->Ln(5);
	$pdf->SetFont('Times', 'BU', 14);
	$pdf->Cell(0,0,'SURAT PERSETUJUAN MEMPELAI',0,1,'C');
	$pdf->Ln(8);

	$pdf->SetFont('Times', '', 11);
	$pdf->Cell(0,7,'Yang bertanda tangan di bawah ini : ',0,1);
	$pdf->SetFont('Times', 'B', 11);
	$pdf->Cell(0,7,'I. Calon Suami : ',0,1);
	$pdf->SetFont('Times', '', 11);
	
	$result_pria = mysqli_query($conn, $query_pria);	
	while($row = mysqli_fetch_assoc($result_pria)){
		$pdf->Cell(70,7,'          1. Nama lengkap dan alias',0,0);
		$pdf->Cell(0,7,' : ' . $row['nama'], 0,1);
		
		$result_ayah_pria = mysqli_query($conn, $query_ayah_pria);
		while($ayah = mysqli_fetch_assoc($result_ayah_pria)){
			$pdf->Cell(70,7,'          2. Bin',0,0);
			$pdf->Cell(0,7,' : ' . $ayah['nama'], 0,1);
		}
		$pdf->Cell(70,7,'          3. Tempat tanggal lahir',0,0);
		$pdf->Cell(0,7,' : ' . $row['tempat_lahir'] . ", " . $row['tgl_lahir'], 0,1);
		$pdf->Cell(70,7,'          4. Warganegara',0,0);
		$pdf->Cell(0,7,' : ' . $row['warganegara'], 0,1);
		$pdf->Cell(70,7,'          5. Agama',0,0);
		$pdf->Cell(0,7,' : ' . $row['agama'], 0,1);
		$pdf->Cell(70,7,'          6. Pekerjaan',0,0);
		$pdf->Cell(0,7,' : ' . $row['pekerjaan'], 0,1);
		$pdf->Cell(70,7,'          7. Tempat tinggal',0,0);
		$pdf->Cell(0,7,' : ' . $row['alamat'], 0,1);
	}

	$pdf->SetFont('Times', 'B', 11);
	$pdf->Cell(0,7,'II. Calon Istri : ',0,1);
	$pdf->SetFont('Times', '', 11);

	$result_wanita = mysqli_query($conn, $query_wanita);	
	while($row = mysqli_fetch_assoc($result_wanita)){
		$pdf->Cell(70,7,'          1. Nama lengkap dan alias',0,0);
		$pdf->Cell(0,7,' : ' . $row['nama'], 0,1);
		
		$result_ayah_wanita = mysqli_query($conn, $query_ayah_wanita);
		while($ayah = mysqli_fetch_assoc($result_ayah_wanita)){
			$pdf->Cell(70,7,'          2. Bin',0,0);
			$pdf->Cell(0,7,' : ' . $ayah['nama'], 0,1);
		}

		$pdf->Cell(70,7,'          3. Tempat tanggal lahir',0,0);
		$pdf->Cell(0,7,' : ' . $row['tempat_lahir'] . ", " . $row['tgl_lahir'], 0,1);
		$pdf->Cell(70,7,'          4. Warganegara',0,0);
		$pdf->Cell(0,7,' : ' . $row['warganegara'], 0,1);
		$pdf->Cell(70,7,'          5. Agama',0,0);
		$pdf->Cell(0,7,' : ' . $row['agama'], 0,1);
		$pdf->Cell(70,7,'          6. Pekerjaan',0,0);
		$pdf->Cell(0,7,' : ' . $row['pekerjaan'], 0,1);
		$pdf->Cell(70,7,'          7. Tempat tinggal',0,0);
		$pdf->Cell(0,7,' : ' . $row['alamat'], 0,1);
	}

	$pdf->Ln(5);
	$pdf->Cell(0,5,'Menyatkan dengan sesungguhnya bahwa atas dasar suka rela, dengan kesadaran sendiri, tanpa paksaan dari siapapun',0,1);
	$pdf->Cell(0,5,'juga, setuju untuk melangsungkan pernikahan.',0,1);
	$pdf->Ln(5);
	$pdf->Cell(0,0,'Demikian surat ini dibuat untuk digunakan seperlunya.',0,1);
	$pdf->Ln(5);

	$pdf->Cell(0,5,'........................................, 20 ..........',0,1,'R');
	$pdf->Ln(10);
	$pdf->Cell(90,5,'I. Calon Suami',0,0,'C');
	$pdf->Cell(90,5,'II. Calon Istri',0,1,'C');
	$pdf->Ln(20);
	$pdf->Cell(90,5,'........................................',0,0,'C');
	$pdf->Cell(90,5,'........................................',0,1,'C');
	//End Layout Form 3

	//Layout form 4
	$pdf->AddPage();
	$pdf->Ln(5);
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(50,5,'Kantor Desa / Kelurahan',0,0);
	$pdf->Cell(0,5,' : Keputih', 0,1);
	$pdf->Cell(50,5,'Kecamatan',0,0);
	$pdf->Cell(0,5,' : Sukolilo', 0,1);
	$pdf->Cell(50,5,'Kabupaten / Kota',0,0);
	$pdf->Cell(0,5,' : Surabaya', 0,1);
	$pdf->Ln(8);

    $pdf->SetFont('Times', 'BU', 14);
	$pdf->Cell(0,8,'SURAT KETERANGAN TENTANG ORANG TUA',0,1,'C');
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(0,5,'Nomor : ..................................................',0,1,'C');
	$pdf->Ln(5);

	$pdf->SetFont('Times', '', 11);
	$pdf->Cell(0,7,'Yang bertanda tangan di bawah ini : ',0,1);
	$pdf->SetFont('Times', '', 11);
	
	$result_ayah_pria = mysqli_query($conn, $query_ayah_pria);
	while($ayah_pria = mysqli_fetch_assoc($result_ayah_pria)){
		$pdf->Cell(70,7,'   I      1. Nama lengkap dan alias',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['nama'], 0,1);
		$pdf->Cell(70,7,'          2. Tempat tanggal lahir',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['tempat_lahir'] . ", " . $row['tgl_lahir'], 0,1);
		$pdf->Cell(70,7,'          3. Warganegara',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['warganegara'], 0,1);
		$pdf->Cell(70,7,'          4. Agama',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['agama'], 0,1);
		$pdf->Cell(70,7,'          5. Pekerjaan',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['pekerjaan'], 0,1);
		$pdf->Cell(70,7,'          6. Tempat tinggal',0,0);
		$pdf->Cell(0,7,' : ' . $ayah_pria['alamat'], 0,1);
	}

	$pdf->SetFont('Times', '', 11);
	$result_ibu_pria = mysqli_query($conn, $query_ibu_pria);
	while($ibu_pria = mysqli_fetch_assoc($result_ibu_pria)){
		$pdf->Cell(70,7,'  II      1. Nama lengkap dan alias',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['nama'], 0,1);
		$pdf->Cell(70,7,'          2. Tempat tanggal lahir',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['tempat_lahir'] . ", " . $ibu_pria['tgl_lahir'], 0,1);
		$pdf->Cell(70,7,'          3. Warganegara',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['warganegara'], 0,1);
		$pdf->Cell(70,7,'          4. Agama',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['agama'], 0,1);
		$pdf->Cell(70,7,'          5. Pekerjaan',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['pekerjaan'], 0,1);
		$pdf->Cell(70,7,'          6. Tempat tinggal',0,0);
		$pdf->Cell(0,7,' : ' . $ibu_pria['alamat'], 0,1);
	} // end while ibu

	$pdf->Ln(5);
	$pdf->Cell(0,5,'adalah benar ayah kandung dan ibu kandung dari seorang:',0,1);
	$pdf->SetFont('Times', '', 11);

	$result_pria = mysqli_query($conn, $query_pria);
	while($row = mysqli_fetch_assoc($result_pria)){
		$pdf->Cell(70,7,'          1. Nama lengkap dan alias',0,0);
		$pdf->Cell(0,7,' : ' . $row['nama'], 0,1);
		$pdf->Cell(70,7,'          2. Jenis kelamin',0,0);
		$pdf->Cell(0,7,' : ' . $row['gender'], 0,1);
		$pdf->Cell(70,7,'          3. Tempat tanggal lahir',0,0);
		$pdf->Cell(0,7,' : ' . $row['tempat_lahir'] . ", " . $row['tgl_lahir'], 0,1);
		$pdf->Cell(70,7,'          4. Warganegara',0,0);
		$pdf->Cell(0,7,' : ' . $row['warganegara'], 0,1);
		$pdf->Cell(70,7,'          5. Agama',0,0);
		$pdf->Cell(0,7,' : ' . $row['agama'], 0,1);
		$pdf->Cell(70,7,'          6. Pekerjaan',0,0);
		$pdf->Cell(0,7,' : ' . $row['pekerjaan'], 0,1);
		$pdf->Cell(70,7,'          7. Tempat tinggal',0,0);
		$pdf->Cell(0,7,' : ' . $row['alamat'], 0,1);
	}

    $pdf->Cell(0,10,'Demikianlah, surat keterangan ini dibuat dengan mengingat sumpah jabatan untuk digunakan seperlunya.',0,1);

	$pdf->Cell(0,10,'.............................. , ...............................................',0,1,'R');
	$pdf->Cell(0,10,'Kepala Desa / Kelurahan .......................................',0,1,'R');
	$pdf->Ln(15);
	$pdf->Cell(0,5,'........................................................................... *)',0,1,'R');
	$pdf->Cell(0,5,'*) nama lengkap',0,1);
	//End Layout Form 4

    //Layout form 5
	$pdf->AddPage();
	$pdf->Ln(2);
	$pdf->SetFont('Times', 'BU', 14);
	$pdf->Cell(0,0,'SURAT IZIN ORANG TUA',0,1,'C');
	$pdf->Ln(5);

	$pdf->SetFont('Times', '', 11);
	$pdf->Cell(0,7,'Yang bertanda tangan di bawah ini : ',0,1);
	$pdf->SetFont('Times', '', 11);
	$pdf->Cell(70,7,'I.        1. Nama lengkap dan alias',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          2. Bin',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          3. Tempat tanggal lahir',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          4. Warganegara',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          5. Agama',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          6. Pekerjaan',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          7. Tempat tinggal',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->SetFont('Times', '', 11);
	$pdf->Cell(70,7,'II.       1. Nama lengkap dan alias',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          2. Bin',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          3. Tempat tanggal lahir',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          4. Warganegara',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          5. Agama',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          6. Pekerjaan',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          7. Tempat tinggal',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);

    $pdf->Ln(2);
	$pdf->Cell(0,5,'adalah ayah kandung dan ibu kandung dari :',0,1);
	$pdf->SetFont('Times', '', 11);
	$pdf->Cell(70,7,'          1. Nama lengkap dan alias',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          2. Bin',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          3. Tempat tanggal lahir',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          4. Warganegara',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          5. Agama',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          6. Pekerjaan',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          7. Tempat tinggal',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
      
	$pdf->Ln(2);
	$pdf->Cell(0,5,'Memberikan izin kepadanya untuk melakukan pernikahan dengan :',0,1);
	$pdf->SetFont('Times', '', 11);
	$pdf->Cell(70,7,'          1. Nama lengkap dan alias',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          2. Bin',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          3. Tempat tanggal lahir',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          4. Warganegara',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          5. Agama',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          6. Pekerjaan',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          7. Tempat tinggal',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
    $pdf->Cell(0,5,'Demikianlah surat izin ini dibuat dengan kesadaran tanpa ada paksaan dari siapapun juga dan untuk dipergunakan',0,1);
    $pdf->Cell(0,5,'seperlunya');
	$pdf->Ln(5);
	$pdf->Cell(0,5,'........................................, 20 ..........',0,1,'R');
	$pdf->Ln(5);
	$pdf->Cell(90,5,'I. Ayah',0,0,'C');
	$pdf->Cell(90,5,'II. Ibu',0,1,'C');
	$pdf->Ln(12);
	$pdf->Cell(90,5,'........................................',0,0,'C');
	$pdf->Cell(90,5,'........................................',0,1,'C');
	//End Layout Form 5

	// Layout form 6
	$pdf->AddPage();
	$pdf->Ln(5);
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(50,5,'Kantor Desa / Kelurahan',0,0);
	$pdf->Cell(0,5,' : Keputih', 0,1);
	$pdf->Cell(50,5,'Kecamatan',0,0);
	$pdf->Cell(0,5,' : Sukolilo', 0,1);
	$pdf->Cell(50,5,'Kabupaten / Kota',0,0);
	$pdf->Cell(0,5,' : Surabaya', 0,1);
	$pdf->Ln(8);

	$pdf->SetFont('Times', 'BU', 14);
	$pdf->Cell(0,8,'SURAT KETERANGAN KEMATIAN SUAMI/ISTRI',0,1,'C');
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(0,5,'Nomor : ..................................................',0,1,'C');
	$pdf->Ln(5);

	$pdf->SetFont('Times', '', 11);
	$pdf->Cell(0,10,'Yang bertanda tangan di bawah ini menerangkan dengan sesungguhnya bahwa : ',0,1);
	$pdf->Cell(70,7,'   I      1. Nama lengkap dan alias',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          2. Nama lengkap dan alias',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          3. Tempat tanggal lahir',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          4. Warganegara',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          5. Agama',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          6. Pekerjaan terakhir',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          7. Tempat tinggal terakhir',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,10,'telah meninggal dunia pada tanggal',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,10,'di',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'   II     1. Nama lengkap dan alias',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          2. Bin/binti',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          3. Tempat tanggal lahir',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          4. Warganegara',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          5. Agama',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          6. Pekerjaan',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'          7. Tempat tinggal',0,0);
	$pdf->Cell(0,7,' : ....................................................................................................', 0,1);
	$pdf->Cell(70,7,'				Adalah suami/istri orang yang telah meninggal tersebut di atas',0,1);
	$pdf->Cell(0,10,'				Demikianlah, surat keterangan ini dibuat dengan mengingat sumpah jabatan untuk digunakan seperlunya.',0,1);
	$pdf->Ln(5);

	$pdf->Cell(0,10,'.............................. , ...............................................',0,1,'R');
	$pdf->Cell(0,10,'Kepala Desa / Kelurahan .......................................',0,1,'R');
	$pdf->Ln(15);
	$pdf->Cell(0,5,'........................................................................... *)',0,1,'R');
	$pdf->Cell(0,5,'*) nama lengkap',0,1);
	//End layout form 6
	
	$pdf->Output();
?>