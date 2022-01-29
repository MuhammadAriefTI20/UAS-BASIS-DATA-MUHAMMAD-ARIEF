<?php

include 'koneksi.php';
$hapus=$_GET['hps'];

if (!empty($hapus)) {
mysqli_query($sm,"delete from barang where id=$hapus");
header("location:index.php");
}

if (isset($_POST['edit']))
	{
	$id = $_POST['id'];
	$namabarang= $_POST['namabarang'];
	$jumlah= $_POST['jumlah'];
	$harga= $_POST['harga'];
	
	mysqli_query($sm, "UPDATE barang SET namabarang='$namabarang',jumlah='$jumlah',harga='$harga' WHERE id=$id");
	 header("Location: index.php");

	}

	elseif (isset($_POST['tambah']))
	{
	$namabarang= $_POST['namabarang'];
	$jumlah= $_POST['jumlah'];
	$harga= $_POST['harga'];

	mysqli_query($sm, "INSERT INTO barang(namabarang,jumlah,harga) VALUES('$namabarang','$jumlah','$harga')");
 
 header("Location: index.php");
	}

	else {
	 header("Location: index.php");
	}

?>
