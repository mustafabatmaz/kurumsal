@extends('layouts.admin')

@section('title', 'Sayfa Düzenle')

@section('content')
<form method="post" action="/kanepe/pages/new">
	{!! csrf_field() !!}
	<input type="text" name="id" hidden="" value="{{$page->id}}">
	Slug<input type='text' name='slug' value="{{$page->slug}}">
	Baslik<input type='text' name='title' value="{{$page->title}}">
	İcerik<textarea rows="10" cols="10" name="content" class="materialize-textarea">{{$page->content}}</textarea>
	<button class="btn waves-effect waves-light" type="submit" name="action">Kaydet
    	<i class="material-icons right">send</i>
    </button>
</form>
<script>
var simplemde = new SimpleMDE();
</script>
@endsection
