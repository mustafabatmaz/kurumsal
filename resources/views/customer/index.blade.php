@extends('layouts.app')
@section('content')
<div style="clear: both"></div>
<div class="slider">
    <ul class="slides">
      <li>
		  <img class="responsive-img" src='/images/slider/xxx.jpg' alt="">
      </li>
	  <li>
		<img class="responsive-img" src='/images/slider/xxx.jpg' alt="">
	  </li>
	  <li>
		<img class="responsive-img" src='/images/slider/xxx.jpg' alt="">
	  </li>
	  <li>
		<img class="responsive-img" src='/images/slider/xxx.jpg' alt="">
	  </li>
	  <li>
		<img class="responsive-img" src='/images/slider/xxx.jpg' alt="">
	  </li>
    </ul>
</div>

<script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true, height: 600});
    });
</script>
@endsection
