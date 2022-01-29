<?php
error_reporting(0);
include 'koneksi.php';


$cm=mysqli_query($sm,"SELECT * from barang order by id asc");

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>TABEL NAMA BARANG</title>
  </head>
  <body>
<style type="text/css">
#particle {
  background-color: #151320;
  position: fixed;
  top:0;
  right:0;
  bottom:0;
  left:0;
  z-index:0;
  opacity: 1
}
.okl {
background: rgba(255, 255, 255, 0.15);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
border: 1px solid rgba(255, 255, 255, 0.26);
}

</style>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>


<div id="particle"></div>

 <div style="padding-top:50px;" class="modal-dialog modal-lg">
    <div class="modal-content okl">
      <div class="modal-header">
        <h5 class="modal-title text-light">TABEL PEMBELIAN BARANG  <br>UNTUK KAMAR</h5>
       <a type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">TAMBAH BARANG</a>
      </div>
      <div class="modal-body">
        <table class="table">
  <thead>
    <tr class="text-light">
      <th  scope="col">NO</th>
      <th scope="col">NAMA BARANG</th>
      <th scope="col">JUMLAH</th>
      <th scope="col">HARGA</th>
      <th scope="col">UBAH DATA</th>
    </tr>
  </thead>
  <tbody class="text-light">
    <?php
    $n=1;
    while($isi = mysqli_fetch_array($cm)) {
    ?>
      <tr>
      <th><?php echo $n; ?></th>
      <td><?php echo $isi['namabarang']; ?></td>
      <td><?php echo $isi['jumlah']; ?></td>
      <td>Rp. <?php echo number_format($isi['harga']); ?></td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2">EDIT</button>
      <a type="button" href="aksi.php?hps=<?php echo $isi['id']; ?>" class="btn btn-danger">HAPUS</a>
    </div>

    </td>
    </tr>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT BARANG</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
  <form class="row g-3" method="post" action="aksi.php">
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">NAMA BARANG</label>
        <input name="id" type="hidden" value="<?php echo $isi['id']; ?>">
        <input name="namabarang" type="text" value="<?php echo $isi['namabarang']; ?>" class="form-control" id="inputEmail4">
      </div>
      <div class="col-md-6">
        <label class="form-label">JUMLAH</label>
        <input name="jumlah" value="<?php echo $isi['jumlah']; ?>" type="number" class="form-control">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">HARGA</label>
        <input type="number" value="<?php echo $isi['harga']; ?>" name="harga" class="form-control" >
      </div>
      <br><br>
      <div class="col-12">
        <button type="submit" name="edit" class="btn btn-primary">UBAH</button>
      </div>
  </form>
      </div>
      </div>
      </div>
      </div>
    <?php $n++; } ?>
  </tbody>
</table>
      </div>
     
    </div>
  </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH BARANG</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<form class="row g-3" method="post" action="aksi.php">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">NAMA BARANG</label>
    <input name="namabarang" type="text" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">JUMLAH</label>
    <input name="jumlah" type="number" class="form-control">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">HARGA</label>
    <input name="harga" type="number" class="form-control" >
  </div>
  <div class="col-12">
    <button type="submit" name="tambah" class="btn btn-primary">TAMBAH</button>
  </div>
</form>


      </div>
      
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<!-- partial -->
  <script  src="js.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>