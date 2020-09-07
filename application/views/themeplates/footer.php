	<footer class="blockquote-footer bg-dark pb-3">
		<?php foreach($identitas as $i) : ?>
		<div class="container">
			<div class="row">
				<div class="col-md-4 text-center">
					Copyright <i class="fa fa-copyright"></i> <?= $i['nama_web']; ?>
				</div>
				<div class="col-md-8 text-center">
					<i class="fa fa-envelope"> <?= $i['email']; ?></i> | 
					<i class="fa fa-map-marker"> <?= $i['alamat']; ?></i> |
					<i class="fa fa-phone-square"> <?= $i['telepon']; ?></i>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</footer>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/css/mystyle.css'); ?>"></script>
</html>