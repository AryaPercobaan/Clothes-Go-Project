<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-6 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-12">
							<div class="p-4">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Silahkan Buat Akun Terlebih Dulu!</h1>
								</div>
								<form class="user" method="POST" action="<?= base_url('auth/registrasi'); ?>">
									<div class="form-group">
										<input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap">
										<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<input type="text" value="<?= set_value('email'); ?>" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group row">
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
											<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="col-sm-6">
											<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
										</div>
									</div>
									<button type="submit" class="btn btn-danger btn-user btn-block">
										Register
									</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="<?= base_url(); ?>auth">Sudah punya akun?   Login!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>