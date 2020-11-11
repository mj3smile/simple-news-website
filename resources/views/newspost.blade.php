@extends('templates.master')

@section('content')
			<!-- Page Header -->
			<div id="post-header" class="page-header">
				<div class="background-img" style="background-image: url('{{$news['urlToImage']}}');"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">
								<span class="post-date">@php echo date('F j, Y', strtotime($news['publishedAt']))@endphp></span>
							</div>
							<h1>{{$news['title']}}</h1>
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
					<!-- Post content -->
					<div class="col-md-8">
						<div class="section-row">
							<div class="main-post">
								<p style="text-align: justify;">
                                    {{$news['content']}}
                                </p>
							</div>
						</div>

						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="{{url('img/author.png')}}" style="width: 85px;" alt="">
									</div>
									<div class="media-body" style="vertical-align: middle;">
										<h3>{{$news['author']}}</h3>
										{{$news['source']}}
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->
					</div>
					<!-- /Post content -->

					<!-- aside -->
					<div class="col-md-4">
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<div class="category-widget">
								<ul>
                                    <li><a href="{{url('category/business')}}" class="cat-1">Business</a></li>
									<li><a href="{{url('category/entertainment')}}" class="cat-2">Entertainment</a></li>
									<li><a href="{{url('category/health')}}" class="cat-3">Health</a></li>
                                    <li><a href="{{url('category/science')}}" class="cat-4">Science</a></li>
                                    <li><a href="{{url('category/sports')}}" class="cat-5">Sports</a></li>
									<li><a href="{{url('category/technology')}}" class="cat-6">Technology</a></li>
								</ul>
							</div>
						</div>
						<!-- /catagories -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
        <!-- /section -->
@endsection
