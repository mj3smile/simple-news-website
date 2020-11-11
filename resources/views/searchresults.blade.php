@extends('templates.master')

@section('title', 'Search results - ')

@section('content')
			<!-- Page Header -->
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
                        <ul class="page-header-breadcrumb">
									<li>Search results for</li>
								</ul>
								<h1>{{$query}}</h1>
							</div>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
			</header>
			<!-- /Header -->

			<!-- section -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-8">
							<div class="row">
                                @foreach($news->articles as $h)
                                    <div class="col-md-12">
                                    <div class="post post-row">
                                    <a class="post-img"><img src="{{$h->urlToImage}}" alt=""></a>
                                    <div class="post-body">
                                    <div class="post-meta">
                                    <span class="post-date">@php echo date('F j, Y', strtotime($h->publishedAt)) @endphp</span>
                                    </div>
                                    {!!$h->urltoPost!!}
                                    <p>@php echo substr($h->content, 0, 150).'...' @endphp</p>
                                    </div> </div> </div>
                                @endforeach
							</div>
						</div>

					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /section -->
@endsection
