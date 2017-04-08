@extends('layouts.admin')
@section('title', 'Resim Ekle')

@section('content')
<form method="post" enctype="multipart/form-data" action="/kanepe/products/newImage">
	{!! csrf_field() !!}
	<input type="text" name="id" hidden="" value="{{$product->id}}">
	@if($productImage->id == -1)
		<h5>Resim Ekle</h5> <input type="file" name="image"><br>
	@endif
	<br>
	<button class="btn waves-effect waves-light" type="submit" name="action">Yükle
	<i class="material-icons right">send</i>
  </button>
</form>
<script>
$(document).ready(function() {
	$('select').material_select();
  });
</script>

 @endsection
