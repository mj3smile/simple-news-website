@extends('templates.master')

@section('content')
		</header>
        <!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

                @for ($i = 0; $i < 2; $i++)
                    <div class="col-md-6">
                        <div class="post post-thumb">
                        <a class="post-img"><img src="{{$recent_news->articles[$i]->urlToImage}}" alt=""></a>
                        <div class="post-body">
                        <div class="post-meta">
                        <span class="post-date">@php echo date('F j, Y', strtotime($recent_news->articles[$i]->publishedAt)) @endphp</span>
                        </div>
                        {!!$recent_news->articles[$i]->urltoPost!!}
                    </div> </div> </div>
                @endfor

				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent News</h2>
						</div>
                    </div>

                    @for ($i = 2; $i < 11; $i++)
                        <div class="col-md-4">
                            <div class="post">
                            <a class="post-img"><img src="{{$recent_news->articles[$i]->urlToImage}}" alt=""></a>
                            <div class="post-body">
                            <div class="post-meta">
                            <span class="post-date">@php echo date('F j, Y', strtotime($recent_news->articles[$i]->publishedAt)) @endphp</span>
                            </div>
                            {!!$recent_news->articles[$i]->urltoPost!!}
                        </div> </div> </div>
                        @if(($i - 1) % 3 == 0)
                            <div class="clearfix visible-md visible-lg"></div>
                        @endif
                    @endfor
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->


		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2>Top Headlines in United States</h2>
								</div>
                            </div>

                            @foreach($news_headline_us->articles as $h)
                                <div class="col-md-12">
                                    <div class="post post-row">
                                    <a class="post-img" href="blog-post.html"><img src="{{$h->urlToImage}}" alt=""></a>
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
