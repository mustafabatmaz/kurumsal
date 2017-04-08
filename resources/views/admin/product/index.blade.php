@extends('layouts.admin')

@section('title', 'Ürünler')

@section('content')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	<a class="btn-floating btn-large red" href='/kanepe/products/new'>
		<i class="large material-icons">mode_edit</i>
	</a>
</div>
	<table>
		<thead>
		 <tr>
			 <th>Ürünler</th>
			 <th></th>
			 <th></th>
		 </tr>
	   </thead>

	   <tbody>
		@foreach($products as $product)
			<tr>
				<td><a href="/urun/{{$product->slug}}">{{$product->urunAd}}</a></td>
				<td><a href='/kanepe/products/edit/{{$product->id}}'>Duzenle</a></td>
				<td><a href="/kanepe/products/indexImage/{{$product->id}}">Resim Bilgisi</a></td>
				<td><a href='/kanepe/products/delete/{{$product->id}}'>Sil</a></td>
			</tr>
		@endforeach
	</tbody>
	</table>
@endsection
