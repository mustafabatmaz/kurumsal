@extends('layouts.app')
@section('title', 'Iletisim')
@section('content')
<div class="row">
	<div class="row">
		<div class="input-field col s6" style="float: left;">
			<h5><b> İLETİŞİM BİLGİLERİ</b></h5>
			<div class="row">
				<table>
					<tr>
						<th>Telefon</th>
						<td>:</td>
						<td>+90 (000) 000 00 00</td>
					</tr>
					<tr>
						<th>Fax</th>
						<td>:</td>
						<td>+90 (000) 000 00 00</td>
					</tr>
					<tr>
						<th>Mail</th>
						<td>:</td>
						<td>info@burokent.com</td>
					</tr>
					<tr>
						<th>Adres</th>
						<td>:</td>
						<td> XXX </td>
					</tr>
				</table>
		</div>
		</div>
		<div class="input-field col s6" style="float: right;">
			<form action="/mail" method="post">
				{!! csrf_field() !!}
			<div class="row">
				<h5><b>BİZE YAZIN</b></h5>
				  <div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input id="name" name='name' type="text" class="validate" pattern=".{3, 50}" required title="Min 3 Characters, Max 50 Characters">
						<label class="active" for="first_name2">Ad ve Soyad</label>
				  </div>
				  <div class="input-field col s6">
						<i class="material-icons prefix">email</i>
						 <input id="mail" name='mail' type="email" class="validate">
						 <label for="email" data-error="wrong" data-success="right">Email</label>
				  </div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					  <i class="material-icons prefix">mode_edit</i>
					  <textarea id="textarea1" name='content' class="materialize-textarea" maxlength="300" minlength="5"></textarea>
					  <label for="textarea1">Mesajınız</label>
				</div>
				<button class="btn waves-effect waves-light" type="submit" name="action">Gönder
			    	<i class="material-icons right">send</i>
			    </button>
			</div>
		</form>
		</div>
	</div>
	<div>

</div>
</div>
<script>
var simplemde = new SimpleMDE();
</script>
@endsection
