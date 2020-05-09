<?php require APPPATH . 'views/chunks/header.php' ?>

<div class="container my-3">
  <div class="row">
    <div class="col-md-6">
	  <h1 class="mb-3">Lihat Mahasiswa</h1>
	  <table class="table table-bordered">
        <tbody>
          <tr>
            <td><strong>Nama</strong></td>
            <td><?= $mahasiswa->nama ?></td>
          </tr>
          <tr>
            <td><strong>NIM</strong></td>
            <td><?= $mahasiswa->nim ?></td>
          </tr>
          <tr>
            <td><strong>Email</strong></td>
            <td><?= $mahasiswa->email ?></td>
          </tr>
          <tr>
            <td><strong>Jurusan</strong></td>
            <td><?= $mahasiswa->jurusan ?></td>
          </tr>
        </tbody>
      </table>
      <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
	</div>
  </div>
</div>

<?php require APPPATH . 'views/chunks/footer.php' ?>