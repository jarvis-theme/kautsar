<div class="container blogs">
	<div class="row mp">
		<div class="col-sm-4 col-md-3">
			@if(count(list_category()) > 0)
			<div class="navigation-left sidey">
				<ul id="category" class="sidenav">
				@foreach(list_category() as $side_menu)
					@if($side_menu->parent == '0')
					<li>
						<a href="{{category_url($side_menu)}}">{{$side_menu->nama}}</a>
						@if($side_menu->anak->count() != 0)
						<ul id="submenu-left">
							@foreach($side_menu->anak as $submenu)
							@if($submenu->parent == $side_menu->id)
							<li>
								<a href="{{category_url($submenu)}}" class="transparent">{{$submenu->nama}}</a>
								@if($submenu->anak->count() != 0)
								<ul>
									@foreach($submenu->anak as $submenu2)
									@if($submenu2->parent == $submenu->id)
									<li>
										<a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a>
									</li>
									@endif
									@endforeach
								</ul>
								@endif
							</li>
							@endif
							@endforeach
						</ul>
						@endif
					</li>
					@endif
				@endforeach
				</ul>
			</div>
			@endif
			@if(count(best_seller()) > 0)
			<div class="left-section">
				<div class="header-left-section">
					<h1>Produk Terlaris</h1>
				</div>
				<ul id="tab-best-selling">
					@foreach(best_seller(3) as $bestproduk )
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
					<a href="{{url('produk')}}" class="btn main-btn">Lihat Semua</a>
				</div>
			</div>
			@endif
			@if(count(list_blog()) > 0)
			<div class="left-section">
				<div class="header-left-section">
					<h1>Artikel Terbaru</h1>
				</div>
				<ul id="tab-lates-news">
					@foreach(list_blog(2,@$blog_category) as $blog)
					<li>
						<a href="{{blog_url($blog)}}">
							<div class="best-selling">
								<h3>{{shortDescription($blog->judul,26)}}</h3>
							</div>
						</a>
						<p>{{shortDescription($blog->isi,134)}}<a href="{{blog_url($blog)}}" class="more-read">Selengkapnya</a></p>
						<span class="date">{{waktuTgl($blog->created_at)}}</span>
					</li>
					@endforeach
				</ul>
			</div>
			@endif

			@if(count(vertical_banner()) > 0)
			@foreach(vertical_banner() as $banners)
			<div class="banner-left">
				<a href="{{URL::to($banners->url)}}">
					{{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('class'=>'img-responsive'))}}
				</a>
			</div>
			@endforeach
			@endif
		</div>
		<div class="col-sm-8 col-md-9">
			<div class="product-categories">
				<div class="row np">
				@if(count(list_product(null, @$category, @$collection)) > 0)
					@foreach(list_product(null, @$category, @$collection) as $produks)
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="product-categories-list">
							{{HTML::image(product_image_url($produks->gambar1,'medium'), $produks->nama)}}
							<div class="tab-title">
								<h3 class="title">{{short_description($produks->nama,17)}}</h3>
								<h3 class="price">{{price($produks->hargaJual)}}</h3>
							</div>
							<span class="caption-product-list fade-caption">
								<h3>{{short_description($produks->nama,17)}}</h3>
								<h2>{{price($produks->hargaJual)}}</h2>
								<p>{{short_description($produks->deskripsi,130)}}</p>
								<a href="{{product_url($produks)}}" class="btn-chart">Lihat</a>
							</span>
						</div>
					</div>
					@endforeach
				@else
					<article class="noresult"><i>Produk tidak ditemukan</i></article>
				@endif
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
				   {{list_product(null, @$category, @$collection)->links()}}
				</div>
			</div>
		</div>
	</div>
</div>