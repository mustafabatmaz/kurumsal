@extends('layouts.app')
@section('title', 'Katalog')
@section('content')
<div style="clear: both"></div>
<div class="row ">
@for ($i = 0; $i < count($products); $i++)
	<div class="col s6 ">
		<div class="card">
		<h4 style="text-align:center"><strong>{{$products[$i]->urunAd}}</strong></h4>
		<center>

		<a href="/urun/{{$products[$i]->slug}}" >
			<img class="responsive-img" src='{{asset("/images/thumbnails/")}}/{{$products[$i]->coverImage()->resimYol}}' alt=""style="padding:10px; height:400px; max-width:100%; ">
		</a>
	</center>
	</div>
	</div>
@endfor
</div>
@endsection
