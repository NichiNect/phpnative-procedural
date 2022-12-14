<?php
require 'lib/helper.php';

if(isset($_SESSION['userdata'])){
	header("Location: index.php");
}

if(isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(login($username, $password)) {
		echo "<script>alert('Login Berhasil!');</script>";
	}
}

loadHeader('Form Login');
?>

<div class="container my-5">
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">Login Form</div>
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
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
						<div class="row text-center">
							<div class="col-md">
								<a href="register.php">Belum memiliki akun admin? Silahkan register</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php loadFooter(); ?>