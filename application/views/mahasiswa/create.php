<?php require APPPATH . 'views/chunks/header.php' ?>

<div class="container my-3">
  <div class="row">
    <div class="col-md-6">
	  <h1 class="mb-3">Tambah Mahasiswa</h1>
	  <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
	  <form method="post">
	    <div class="form-group">
		  <label for="nama">Nama</label>
		  <input name="nama" type="text" class="form-control" id="nama" value="<?= set_value('nama') ?>">
	    </div>
	    <div class="form-group">
		  <label for="nim">NIM</label>
		  <input name="nim" type="text" class="form-control" id="nim" value="<?= set_value('nim') ?>">
	    </div>
	    <div class="form-group">
		  <label for="email">Email</label>
		  <input name="email" type="email" class="form-control" id="email" value="<?= set_value('email') ?>">
	    </div>
		<div class="form-group">
		  <label for="jurusan">Jurusan</label>
		  <select name="jurusan" class="form-control" id="jurusan">
			<option></option>
		    <option value="Komputer" <?= set_select('jurusan', 'Komputer') ?>>Komputer</option>
		    <option value="Akuntansi" <?= set_select('jurusan', 'Akuntansi') ?>>Akuntansi</option>
		    <option value="Geografi" <?= set_select('jurusan', 'Geografi') ?>>Geografi</option>
		    <option value="Fisika" <?= set_select('jurusan', 'Fisika') ?>>Fisika</option>
		    <option value="Kimia" <?= set_select('jurusan', 'Kimia') ?>>Kimia</option>
		  </select>
		</div>
	    <button type="submit" class="btn btn-primary">Simpan</button>
	  </form>
	</div>
  </div>
</div>

<?php require APPPATH . 'views/chunks/footer.php' ?>