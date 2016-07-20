<div class="container">
	<div class="row mp" id="confirm-order">
		<div class="col-xs-12 col-sm-4 form-inline">
			<h2>Lupa Password</h2><hr><br>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Email">
			</div>
			<button class="btn btn-success" type="button">Reset Password</button>
			<br><br>
		</div>
		<div class="col-xs-12 col-sm-4">
			<h2>Pelanggan Baru</h2><hr><br>
			<p>Nikmati kemudahan berbelanja dengan mendaftar sebagai member.</p>
			<a href="{{url('member/create')}}" class="btn btn-warning">Daftar</a>
			<br><br>
		</div>
		<div class="col-xs-12 col-sm-4">
			{{ Theme::partial('subscribe') }}
		</div>
	</div>
</div>