<div class="container confirm">
	<div class="row mp" id="logins">
		<br>
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<p>Silahkan Login untuk kemudahan melakukan checkout. Cepat dan Mudah dalam bertransaksi. Mudah untuk mengetahui Order History dan Status.</p>
			<br>
			<h2>Log in</h2>
			<hr><br>
			<form class="form-horizontal" action="{{url('member/login')}}" method="post">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2">Email</label>
					<div class="col-sm-6">
						<input type="email" class="form-control" name="email" placeholder="Email" value="{{Input::old('email')}}" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2">Password</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<small>
							<a href="{{url('member/forget-password')}}">Lupa Password?</a>
						</small>
					</div>
				</div>
				<div class="form-group">
					<div class="pull-left col-sm-2">
						<button type="submit" class="btn btn-success">Log in</button>
						<br><br>
					</div>
					<div class="pull-right col-sm-6">
						<small>Belum punya akun?</small>
						<a href="{{('member/create')}}" class="btn btn-default">Daftar Baru</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>