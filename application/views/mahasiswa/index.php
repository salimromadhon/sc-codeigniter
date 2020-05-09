<?php require APPPATH . 'views/chunks/header.php' ?>

<div class="container my-3">
  <div class="row">
    <div class="col-md-6">
	  <h1>Daftar Mahasiswa</h1>
	  <div class="my-3">
	    <a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-primary">Tambah</a>
	  </div>
	  <?= alert('mahasiswa') ?>
	  <?php if ($mahasiswa) : ?>
	    <ul class="list-group">
		  <?php foreach ($mahasiswa as $key => $item) : ?>
	        <li class="list-group-item">
				<div class="d-flex justify-content-between align-items-center">
					<strong><?= $item->nama ?></strong>
					<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
					  <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#mahasiswa-<?= $key ?>" aria-expanded="false" aria-controls="mahasiswa-<?= $key ?>">Detail</button>
					  <a href="<?= base_url('mahasiswa/edit/' . $item->id) ?>" class="btn btn-secondary">Sunting</a>
					  <a href="<?= base_url('mahasiswa/delete/' . $item->id) ?>" class="btn btn-secondary">Hapus</a>
					</div>
				</div>
				<ul class="mt-2 collapse" id="mahasiswa-<?= $key ?>">
					<li><?= $item->nim ?></li>
					<li><?= $item->email ?></li>
					<li><?= $item->jurusan ?></li>
				</ul>
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