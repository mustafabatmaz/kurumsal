@extends('layouts.admin')

@section('title', 'Kategoriler')

@section('content')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	<a class="btn-floating btn-large red" href='/kanepe/categories/new'>
		<i class="large material-icons">mode_edit</i>
	</a>
</div>

	<table>
		<thead>
		 <tr>
			 <th>Kategoriler</th>
			 <th></th>
			 <th></th>
		 </tr>
	   </thead>

	   <tbody>
		@foreach($categories as $category)
			<tr>
				<td><a href="/{{$category->slug}}">{{$category->name}}</a></td>
				<td><a href='/kanepe/categories/edit/{{$category->id}}'>Duzenle</a></td>
				<td><a href='/kanepe/categories/delete/{{$category->id}}'>Sil</a></td>
			</tr>
		@endforeach
	</tbody>
	</table>
@endsection
