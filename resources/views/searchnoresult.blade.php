@extends('templates.master')

@section('title', 'No result')

@section('content')
			<!-- Page Header -->
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
                            <ul class="page-header-breadcrumb"></ul>
								{{$message}}
							</div>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
			</header>
            <!-- /Header -->
@endsection
