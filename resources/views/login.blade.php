@extends('layout')

@section('body')

<div class="container" style="margin-top: 20px; text-align: center;">
<div class="card" style="width: 18rem; margin: auto; text-align: left;">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;">Login</h5>

	<form action="{{ action('LoginController@loginDo') }}" method="post">
		@csrf
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input value="{{ old('email') }}" name="email"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  </div >

	  @if(Session::has('msg'))
	  <div style="color: red; font-size: 0.8em; margin-bottom: 10px; ">
	  	{{ session('msg')}}
	  </div>
	  @endif

	  <div style="text-align: center;">
	  <button type="submit" class="btn btn-primary">Login</button>
	</div>

	</form>

  </div>
</div>
</div>


@endsection