@extends('layouts.admin')

@section('title', 'Ürün Resimleri')

@section('content')
<table>
	<thead>
	 <tr>
		 <th>Resimler</th>
		 <th></th>
		 <th></th>
	 </tr>
   </thead>
   <tbody>
@foreach($productImage as $productImage)
	<tr>
		<td><img src= '{{ asset("/images/thumbnails/$productImage->resimYol") }} '></td>
		<td><a href='/kanepe/products/imageDelete/{{$productImage->id}}'>Sil</a></td>
	</tr>
@endforeach
</tbody>
</table>
<a class="btn-floating btn-large waves-effect waves-light red" href="/kanepe/products/newImage/{{$product->id}}"><i class="material-icons">add</i></a>
<script>
$(document).ready(function() {
	$('select').material_select();
  });
</script>

@endsection
