<div class="container container-cstm">
	<div class="row no-rutter">
		<div class="product-other" id="homes">
			<div class="col-sm-12">
				<div class="tab-title">
					<h1><i class="fa fa-list-alt" id="homecollection"></i></h1>
					<h1 id="textcollection">&nbsp;&nbsp;Koleksi Produk</h1>
				</div>
				<div class="product-full wow fadeInUp">
					@foreach(home_product() as $home1 )
					<div class="item1">
						<div class="product product-default bg-grey5">
							{{HTML::image(product_image_url($home1->gambar1,'medium'), $home1->nama)}}
							<div class="tab-title-default">
								<h2>{{short_description($home1->nama,25)}}</h2>
								<h3>{{price($home1->hargaJual)}}</h3>
							</div>
							<span class="caption-product-related fade-caption">
								<a href="{{product_url($home1)}}"><h3>{{short_description($home1->nama,25)}}</h3></a>
								<h2>{{price($home1->hargaJual)}}</h2>
								<div class="tab-rating">
								</div>
								<p>{{short_description($home1->deskripsi,134)}}</p>
								<a href="{{product_url($home1)}}" class="btn-chart">Lihat Produk</a>
							</span>
						</div>
					</div>	
					@endforeach
				</div>
				<br><br>
			</div>
		</div>
	</div>
</div>

<div class="container container-cstm">
	<div class="row no-rutter mb">
		<div class="product-other">
			{{-- */ $jml = count(best_seller()) /* --}}
			@if($jml > 0)
			<div class="col-sm-8">
				<div class="tab-title">
					<h1><i class="fa fa-heart" id="homecollection"></i></h1>
					<h1>&nbsp;&nbsp;Best Seller</h1>
				</div>
				<div class="product-lates wow fadeInUp">
					@foreach(best_seller(4) as $bestproduk )
					<div class="item2 {{$jml == 1 ? 'fullwidth' : ''}}">
						<div class="product product-default bg-grey5">
							{{HTML::image(product_image_url($bestproduk->gambar1,'medium'), $bestproduk->nama)}}
							<div class="tab-title-default">
								<h2>{{short_description($bestproduk->nama,25)}}</h2>
								<h3>{{price($bestproduk->hargaJual)}}</h3>
							</div>
							<span class="caption-product-related fade-caption">
								<a href="#"><h3>{{short_description($bestproduk->nama,25)}}</h3></a>
								<h2>{{price($bestproduk->hargaJual)}}</h2>
								<div class="tab-rating">
								</div>
								<p>{{short_description($bestproduk->deskripsi,134)}}</p>
								<a href="{{product_url($bestproduk)}}" class="btn-chart">Lihat Produk</a>
							</span>
						</div>
					</div>	
					@endforeach
				</div>
				<br><br>
			</div>
			<div class="col-sm-4">
			@else
			<div class="col-sm-12">
			@endif
				<div class="tab-title">
					<h1><i class="fa fa-file-text" id="homecollection"></i></h1>
					<h1>&nbsp;&nbsp;Blog</h1>
				</div>
				<div class="hot-news wow fadeInUp">
					<ul>
					@if(count(list_blog(2)) > 0)
						@foreach(list_blog(2) as $blog)
						<li>
							<h1><a href="{{blog_url($blog)}}">{{$blog->judul}}</a></h1>
							<p>{{short_description($blog->isi,209)}}</p>
							<a href="{{blog_url($blog)}}" class="read-more-news">Selengkapnya</a>
							<div class="clearfix"></div>
						</li>
						@endforeach
	                @else
		                <article class="noresult"><small>Tidak ada data.</small></article>
	                @endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>