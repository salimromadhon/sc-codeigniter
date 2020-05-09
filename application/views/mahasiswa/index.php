<?php require APPPATH . 'views/chunks/header.php' ?>

<div class="container my-3">
  <div class="row">
    <div class="col-md-6">
	  <h1>Daftar Mahasiswa</h1>
	  <div class="d-flex justify-content-between align-middle my-3">
			<form method="post">
			  <div class="input-group">
				<input name="keyword" type="text" class="form-control" placeholder="Cari…" aria-label="Cari…" value="<?= set_value('keyword') ?>">
				<div class="input-group-append">
				  <div class="btn-group" role="group">
					<a href="<?= base_url('mahasiswa') ?>" class="btn btn-outline-secondary rounded-0">×</a>
					<button class="btn btn-secondary" type="button" id="cari">Cari</button>
				  </div>
				</div>
			  </div>
			</form>
			<a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-primary">Tambah</a>
	  </div>
	  <?= alert('mahasiswa') ?>
	  <?php if ($mahasiswa) : ?>
	    <ul class="list-group">
		  <?php foreach ($mahasiswa as $key => $item) : ?>
	        <li class="list-group-item">
				<div class="d-flex justify-content-between align-items-center">
					<strong><?= $item->nama ?></strong>
					<div class="btn-group btn-group-sm" role="group">
					  <a href="<?= base_url('mahasiswa/show/' . $item->id) ?>" class="btn btn-outline-secondary">Lihat</a>
					  <a href="<?= base_url('mahasiswa/edit/' . $item->id) ?>" class="btn btn-outline-secondary">Sunting</a>
					  <a href="<?= base_url('mahasiswa/delete/' . $item->id) ?>" class="btn btn-outline-secondary">Hapus</a>
					</div>
				</div>
			</li>
	      <?php endforeach ?>
		</ul>
	  <?php else: ?>
		<div class="alert alert-warning">Tidak ada mahasiswa.</div>
	  <?php endif ?>
	</div>
  </div>
</div>

<?php require APPPATH . 'views/chunks/footer.php' ?>