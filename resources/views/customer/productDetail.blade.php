@extends('layouts.app')

@section('content')
<div class="col s12">
	<h3>{{ $product->urunAd }}</h3>
</div>
<div class="col s12">
	<img class="responsive-img materialboxed" src='{{ asset("/images/$catalogImage->resimYol") }}' alt="" style="padding:10px;">
</div>
<div class="col s6">
	<div class="row">
		@foreach ($productImage as $resim)
		<div class="col s4">
			<img class="responsive-img materialboxed" src='{{ asset("/images/$resim->resimYol") }}' alt="" style="padding:10px;">
		</div>
		@endforeach
	</div>
</div>
@endsection
