<?php require 'chunks/header.php' ?>

<div class="container my-3">
  <div class="row">
    <div class="col-md-6">
	  <h1 class="mb-3">Daftar Mahasiswa</h1>
	  <?php if ($mahasiswa) : ?>
	    <ul class="list-group">
		  <?php foreach ($mahasiswa as $item) : ?>
	        <li class="list-group-item"><?= $item->nama ?></li>
	      <?php endforeach ?>
		</ul>
	  <?php else: ?>
		<div class="alert alert-warning">Tidak ada mahasiswa.</div>
	  <?php endif ?>
	</div>
  </div>
</div>

<?php require 'chunks/footer.php' ?>