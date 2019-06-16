@extends('layout')

@section('body')
<section class="content-header">
      <h1>Login</h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-4">
	    	<!-- general form elements -->
		    <div class="box box-primary">
		        <div class="box-header with-border">
		            <h3 class="box-title">Silahkan Login</h3>
		        </div>
		        <!-- /.box-header -->
		        <!-- form start -->
		        <form role="form" action="{{ action('LoginController@loginDo') }}" method="post">
		        	@csrf
		            <div class="box-body">

		            	@if(Session::has('msg'))
						<div style="color: red; font-size: 0.8em; margin-bottom: 10px; ">
							{{ session('msg')}}
						</div>
						@endif

		                <div class="form-group">
		                    <label for="exampleInputEmail1">Email</label>
		                    <input value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan email">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">Password</label>
		                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		                </div>
		            </div>
		            <!-- /.box-body -->
		            <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Login</button>
		            </div>
		        </form>
		    </div>
		    <!-- /.box -->
		</div>
	</div>
</section>


@endsection