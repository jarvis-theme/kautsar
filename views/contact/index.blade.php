<div class="container blogs">
	<div class="row mp">
		<div class="col-sm-4 col-md-3">
			@if(count(best_seller()) > 0)
			<div class="left-section">
				<div class="header-left-section">
					<h1>Produk Terlaris</h1>
				</div>
				<ul id="tab-best-selling">
					@foreach(best_seller(3) as $bestproduk)
					<li>
						<a href="{{product_url($bestproduk)}}">
							<div class="best-selling">
								{{HTML::image(product_image_url($bestproduk->gambar1,'thumb'), $bestproduk->nama)}}
							</div>
							<h3 class="product-name">{{short_description($bestproduk->nama,50)}}</h3>
							<h3 class="price">{{price($bestproduk->hargaJual)}}</h3>
						</a>
					</li>
					@endforeach
				</ul>
				<div class="link-more-news">
					<a href="{{url('produk')}}" class="btn btn-success">Lihat Semua</a>
				</div>
			</div>
			@endif

			@foreach(vertical_banner() as $banners)
			<div class="banner-left">
				<a href="{{url($banners->url)}}">
					{{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('class'=>'img-responsive'))}}
				</a>
			</div>
			@endforeach

			{{ Theme::partial('subscribe') }}
			@if(count(list_blog()) > 0)
			<div class="left-section">
				<div class="header-left-section">
					<h1>Artikel Terbaru</h1>
				</div>
				<ul id="tab-lates-news">
					@foreach(list_blog(3,@$blog_category) as $blog)
					<li>
						<a href="{{blog_url($blog)}}">
							<div class="best-selling">
								<h3>{{short_description($blog->judul,26)}}</h3>
							</div>
						</a>
						<p>
							{{short_description($blog->isi,134)}}
							<a href="{{blog_url($blog)}}" class="more-read">Selengkapnya</a>
						</p>
						<span class="date">{{waktuTgl($blog->created_at)}}</span>
					</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
		<div class="col-sm-8 col-md-9">
			<div class="single-page">
				<!-- <h1>Kontak</h1> -->
				<div class="col-md-12 col-xs-12" id="mapdetail">
					<div class="maps" >
						<h2 class="title">Peta Lokasi</h2>
						@if($kontak->lat!='0' || $kontak->lng!='0')
						<iframe class="locate" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
						@else
						<iframe class="locate" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{str_replace(' ','+',$kontak->alamat)}}&amp;aq=0&amp;oq=gegerkalong+hil&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;hq=&amp;hnear={{str_replace(' ','+',$kontak->alamat)}}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
						@endif
					</div>
				</div>
				<br><br>
				<div class="col-md-12">
					<div class="contact-us" >
						<div class="contact-desc">
							@if(!empty($kontak->alamat))
							<strong>Alamat :</strong> {{$kontak->alamat}}<br>
							@endif
							@if(!empty($kontak->telepon))
							<strong>Telepon :</strong> {{$kontak->telepon}}<br>
							@endif
							@if(!empty($kontak->hp))
							<strong>HP :</strong> {{$kontak->hp}}<br>
							@endif
							@if(!empty($kontak->bb))
							<strong>BBM :</strong> {{$kontak->bb}}<br>
							@endif
							@if(!empty($kontak->email))
							<strong>Email :</strong> <a href="{{$kontak->email}}">{{$kontak->email}}</a>
							@endif
							<div class="clr"></div>
						</div>
						<br><br>
						<div class="col-xs-12 col-sm-7 zeropadleft">
							<h2>Hubungi Kami</h2>
							<form class="contact-form" action="{{url('kontak')}}" method="post">
								<div class="form-group">
									<input class="form-control" placeholder="Nama" name="namaKontak" type="text" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Email Anda" name="emailKontak" type="text" required>
								</div>
								<div class="form-group">
									<textarea class="form-control" placeholder="Pesan" name="messageKontak" rows="4" required></textarea>
								</div>
								<button class="btn btn-success submitnewletter" type="submit">Kirim Pesan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>