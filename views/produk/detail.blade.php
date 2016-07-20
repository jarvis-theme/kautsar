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
			@if(count(list_koleksi()) > 0)
			<div class="left-section">
				<div class="header-left-section">
					<h1>Koleksi</h1>
				</div>
				@foreach (list_koleksi() as $kol)
				<div class="side-collection">
					<div class="col-xs-4 col-sm-4">
						<a href="{{koleksi_url($kol)}}">
							{{ HTML::image(koleksi_image_url($kol->gambar,'thumb'), $kol->nama, array('class' => 'img-responsive','width'=>'80','height'=>'80' ))}}
						</a>
					</div>
					<div class="col-xs-8 col-sm-8">
						<a href="{{koleksi_url($kol)}}" class="collection">{{$kol->nama}}</a>
					</div>
					<div class="clearfix"></div>
				</div>
				@endforeach
			</div>
			@endif
		</div>

		<div class="col-sm-8 col-md-9">
			<form action="#" id="addorder">
				<div class="detail-product">
					<div class="row mp">
						<div class="col-sm-6">
							<img id="imgZoom" src="{{product_image_url($produk->gambar1,'medium')}}" data-zoom-image="{{product_image_url($produk->gambar1,'large')}}" alt="{{$produk->nama}}">
							<div id="product_detail">
								@if($produk->gambar1 != '')
								<a href="{{product_image_url($produk->gambar1,'medium')}}" class="elevatezoom-gallery thumbnail-img" data-image="{{product_image_url($produk->gambar1,'medium')}}" data-zoom-image="{{product_image_url($produk->gambar1,'large')}}">
									<img id="img-thumbnail" src="{{product_image_url($produk->gambar1,'thumb')}}" width="100" alt="Gambar 1">
								</a>
								@endif
								@if($produk->gambar2 != '')
								<a href="{{product_image_url($produk->gambar2,'medium')}}" class="elevatezoom-gallery thumbnail-img" data-image="{{product_image_url($produk->gambar2,'medium')}}" data-zoom-image="{{product_image_url($produk->gambar2,'large')}}">
									<img id="img-thumbnail" src="{{product_image_url($produk->gambar2,'thumb')}}" width="100" alt="Gambar 2">
								</a>
								@endif
								@if($produk->gambar3 != '')
								<a href="{{product_image_url($produk->gambar3,'medium')}}" class="elevatezoom-gallery thumbnail-img" data-image="{{product_image_url($produk->gambar3,'medium')}}" data-zoom-image="{{product_image_url($produk->gambar3,'large')}}">
									<img id="img-thumbnail" src="{{product_image_url($produk->gambar3,'thumb')}}" width="100" alt="Gambar 3">
								</a>
								@endif
								@if($produk->gambar4 != '')
								<a href="{{product_image_url($produk->gambar4,'medium')}}" class="elevatezoom-gallery thumbnail-img" data-image="{{product_image_url($produk->gambar4,'medium')}}" data-zoom-image="{{product_image_url($produk->gambar4,'large')}}">
									<img id="img-thumbnail" src="{{product_image_url($produk->gambar4,'thumb')}}" width="100" alt="Gambar 4">
								</a>
								@endif
							</div>
						</div>
						<div class="col-sm-6">
							<div class="product-description">
								<h3 class="detail-title">{{$produk->nama}}</h3>
								<h3 class="detail-price">{{price($produk->hargaJual)}}</h3>
								<div class="tab-rating">
									{{ sosialShare(url(product_url($produk))) }}
								</div>
								<h2>Deskripsi Produk</h2>
								<p>{{short_description($produk->deskripsi, 700)}}</p>
								<div class="tab-quantity">
									<h3>Quantity :</h3>
									<button type='submit' class='qtyminus' field='qty' /><i class="fa fa-caret-left"></i></button>
									<input type='text' name='qty' value='1' class='qty' />
									<button type='button' value='+' class='qtyplus' field='qty' /><i class="fa fa-caret-right"></i></button>
								</div>
								<div class="avalaible-text">
									@if($produk->stok > 0)
									<span><i class="ceklist fa fa-check"></i></span>
									<span>Stok tersedia, <span class="text-color">{{$produk->stok}} item</span></span>
									@else
									<span>
										<i class="fa fa-times-circle" id="empty"></i><span class="text-color" id="text-empty">Stok Habis</span>
									</span>
									@endif
								</div>
								@if($opsiproduk->count() > 0) 
								<div class="size-list">
									<div class="form-group">
										<label class="col-sm-4 control-label">Opsi :</label>
										<div class="col-sm-5">
											<select class="form-control attribute_select" name="opsiproduk">
												<option value="">-- Pilih Opsi --</option>
												@foreach ($opsiproduk as $key => $opsi)
												<option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
													{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
												</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>

				<div class="checkout">
					<div class="col-xs-12 col-sm-6 col-md-3">
						<button class="addtocart btn main-btn" type="submit"><i class="fa fa-cart-plus"></i> Beli</button>
					</div>
				</div>
			</form>
			<div class="related-page">
				<div class="row">
				@if(count(other_product($produk,4)) > 0)
					<h3 class="detail-title">Produk Lain</h3>
					@foreach(other_product($produk,4) as $relproduk)
					<div class="col-xs-6 col-sm-6 col-md-3" id="otherprod">
						<div class="related-product">
							<img src="{{product_image_url($relproduk->gambar1,'medium')}}" alt="{{$relproduk->nama}}">
							<span class="related-caption-product fade-caption">
								<h3>{{short_description($relproduk->nama,12)}}</h3>
								<h2>{{price($relproduk->hargaJual)}}</h2>
								<p>{{short_description($produk->deskripsi,26)}}</p>
								<a href="{{product_url($relproduk)}}" class="btn-chart">Lihat Produk</a>
							</span>
						</div>
					</div>
					@endforeach
				@endif
				</div>
			</div>
			{{ pluginComment(product_url($produk), @$produk) }}
		</div>
	</div>
</div>