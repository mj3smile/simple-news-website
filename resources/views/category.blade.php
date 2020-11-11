@extends('templates.master')

@section('title', 'Category - ')

@section('content')
			<!-- Page Header -->
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<ul class="page-header-breadcrumb">
								<li><a href="{{url('/')}}">Home</a></li>
								<li>{{$category}}</li>
							</ul>
							<h1>{{$category}}</h1>
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

							<!-- post -->
							<div class="col-md-12">
								<div class="post post-thumb">
									<a class="post-img" href="blog-post.html"><img src="{{$news->articles[0]->urlToImage}}" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<span class="post-date">@php echo date('F j, Y', strtotime($news->articles[0]->publishedAt)); @endphp</span>
										</div>
										{!!$news->articles[0]->urltoPost!!}
									</div>
								</div>
							</div>
                            <!-- /post -->

                            @for ($i = 1; $i < 3; $i++)
                                <div class="col-md-6">
                                    <div class="post">
                                    <a class="post-img"><img src="{{$news->articles[$i]->urlToImage}}" alt=""></a>
                                    <div class="post-body">
                                    <div class="post-meta">
                                    <span class="post-date">@php echo date('F j, Y', strtotime($news->articles[$i]->publishedAt)) @endphp</span>
                                    </div>
                                    {!!$news->articles[$i]->urltoPost!!}
                                </div> </div> </div>
                            @endfor

                            @for ($i = 3; $i < sizeof($news->articles); $i++)
                                <div class="col-md-12">
                                    <div class="post post-row">
                                    <a class="post-img"><img src="{{$news->articles[$i]->urlToImage}}" alt=""></a>
                                    <div class="post-body">
                                    <div class="post-meta">
                                    <span class="post-date">@php echo date('F j, Y', strtotime($news->articles[$i]->publishedAt)) @endphp</span>
                                    </div>
                                    {!!$news->articles[$i]->urltoPost!!}
                                    <p>@php echo substr($news->articles[$i]->content, 0, 150).'...' @endphp</p>
                                </div> </div> </div>
                            @endfor
						</div>
					</div>

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
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
        <!-- /section -->
@endsection
