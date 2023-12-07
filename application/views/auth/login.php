<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-6 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-2">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<img src="assets/img/baju/3.jpg" class="col-lg-12" height=310px width=400px>
						<div class="col-lg-12">
							<div class="p-4">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Clothes<sup>Go~</sup></h1>
								</div>
								<?= $this->session->flashdata('message'); ?>
								<form class="user" method="post" action="<?= base_url('auth'); ?>">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" value="<?= set_value('email'); ?>" id="email" name="email" placeholder="Masukkan Alamat Email ...">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" value="<?= set_value('nama'); ?>" name="password" id="password" placeholder="Password">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>

									<button type="submit" class="btn btn-danger btn-user btn-block">
										Login
									</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="<?= base_url(); ?>auth/registrasi">Belum buat akun? Registrasi!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>