<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-7">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<img src="assets/img/baju/3.jpg" class="col-lg-12" height=310px width=400px>
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Selamat Datang Kembali!</h1>
								</div>
								<form class="user" method="POST" action="<?= base_url('auth/cek_login') ?>">
									<div class="form-group">
										<input name="nama" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
									</div>

									<button type="submit" class="btn btn-dark btn-user btn-block">
										Login
									</button>

								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="register.html">Buat Akun!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>