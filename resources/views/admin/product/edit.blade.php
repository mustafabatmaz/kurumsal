@extends('layouts.admin')
@section('title', 'Ürün Düzenle')

@section('content')

<form method="post" action="/kanepe/products/new" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<input type="text" name="id" hidden="" value="{{$product->id}}">
	Slug<input type='text' name='slug' value="{{$product->slug}}">
	Urun Adı<input type='text' name='urunAd' value="{{$product->urunAd}}">
	Kategoriler
	<div class="input-field ">
    <select name="category_id">
	  @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
	  @endforeach
    </select>
	</div>
	@if($product->id == -1)
		Resim Ekle <input type="file" name="image"><br>
	@endif
	Açıklama<textarea rows="10" cols="10" name="description" class="materialize-textarea">{{$product->description}}</textarea>
	<button class="btn waves-effect waves-light" type="submit" name="action">Kaydet
    <i class="material-icons right">send</i>
  </button>
</form>

<script>
$(document).ready(function() {
    $('select').material_select();
  });
</script>

 @endsection
