@extends('layouts.admin')

@section('title', 'Kategori Düzenle')

@section('content')
<form method="post" action="/kanepe/categories/new">
	{!! csrf_field() !!}
	<input type="text" name="id" hidden="" value="{{$category->id}}">
	Slug<input type='text' name='slug' value="{{$category->slug}}">
	Baslik<input type='text' name='name' value="{{$category->name}}">
	<button class="btn waves-effect waves-light" type="submit" name="action">Kaydet
    <i class="material-icons right">send</i>
  </button>
</form>
@endsection
