@extends('layout')

@section('body')
<section  class="content-header">
</section>
<section class="content">
	<div class="login-logo">
		<h2 class="headline text-blue"><b>SISTEM INFORMASI MONITORING KESEHATAN </b></h2>
		<th>
			<h2 class="headline text-blue"><b> PASIEN TB RAWAT JALAN RUMAH SAKIT AL ISLAM BANDUNG	 </b></h2>	
		</th>
		
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
	    	<!-- general form elements -->
		    <div class="box box-primary">
		        <div class="login-box-body">
		            <h1 class="login-box-msg headline text-blue ">Silahkan Login</h1>
		        
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
		                    <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan email">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">Password</label>
		                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		                </div>
		            </div>
		            </div>
		            <!-- /.box-body -->
		            <div class="box-footer">
		              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
		            </div>
		        </form>
		    </div>
		    <!-- /.box -->
		</div>
	</div>
</section>


@endsection