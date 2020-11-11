@extends('templates.master')

@section('title', 'Not Found')

@section('content')
			</header>
			<!-- /Header -->

			<!-- section -->
			<div class="section" style="padding-top: 150px; padding-bottom: 70px;">
				<!-- container -->
				<div class="container ">
					<!-- row -->
					<div class="row text-center">
						<img src="{{url('img/error.gif')}}" alt="Error" style="width: 130px;">
						<br><br>
						<h1>Oops...</h1>
						The page you visited was not found
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /section -->
@endsection
