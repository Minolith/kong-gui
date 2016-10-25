<?php
$meta['alt-nav']="logout-nav.php";
$meta['title'] = "Login - Minolith Kong GUI";
$meta['description']="Login to your Minolith account.";

\GUI\Views::includeHeader($meta);

?>
<div class="container pad-top-70">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<div class=" pull-right">
				<a href="https://minolith.io" target="_blank">
					<img src="https://minolith.io/assets/img/icon.svg" width="60">
				</a>
				<span style="font-weight:bold;">MINOLITH</span>
			</div>
			<p>KONG ADMIN GUI</p>
			<form method="post" action="/login">
				<div class="form-group">
					<label for="inputUsername">Username</label>
					<input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">
				</div>
				<div class="form-group">
					<label for="inputPassword">Password</label>
					<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-warning btn-block">Login</button>
			</form>
			<p><a href="/forgot-password">Forgot?</a></p>
		</div>
	</div>
</div>

<?php
\GUI\Views::includeFooter();
?>