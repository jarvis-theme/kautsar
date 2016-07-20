<a href="{{url('checkout')}}"><img src="{{url(dirTemaToko().'kautsar/assets/img/shop-chart.png')}}" class="shop-chart" alt="cart"></i></a>
<span class="chart-list">
	@if(Shpcart::cart()->total_items() > 0)
	<p>{{Shpcart::cart()->total_items()}} item | Total: {{ price(Shpcart::cart()->total() )}}</p>
	@else
	<p>Keranjang masih kosong</p>
	@endif
</span>