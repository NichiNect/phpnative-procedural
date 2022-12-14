<?php
require 'lib/helper.php';

if(isset($_POST['username'])) {
	if(register($_POST) > 0) {
		echo "<script>
				alert('Register Berhasil!');
				window.location.href = 'login.php';
			</script>";
	} else {
		echo "<script>alert('Register Gagal!');</script>";
	}
}

loadHeader('Form Register User');
?>

<div class="container my-5">
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">Form Register</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group">
						    <label for="username">Username</label>
						    <input type="text" name="username" id="username" class="form-control" placeholder="Username...">
						</div>
						<div class="form-group">
						    <label for="password">Password</label>
						    <input type="password" name="password" id="password" class="form-control" placeholder="Password...">
						</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
						<div class="row text-center">
							<div class="col-md">
								<a href="login.php">Sudah memiliki akun admin? Silahkan login</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php loadFooter(); ?>