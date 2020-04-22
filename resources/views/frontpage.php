<?php
    require 'templates/header.php';
?>
		</header>
        <!-- /Header -->
        
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

                    <?php
                        for ($i = 0; $i < 2; $i++){
                            echo '<div class="col-md-6">';
                            echo '<div class="post post-thumb">';
                            echo '<a class="post-img" href="blog-post.html"><img src="'. $recent_news->articles[$i]->urlToImage .'" alt=""></a>';
                            echo '<div class="post-body">';
                            echo '<div class="post-meta">';
                            echo '<span class="post-date">'. date('F j, Y', strtotime($recent_news->articles[$i]->publishedAt)) .'</span>';
                            echo '</div>';
                            echo '<h3 class="post-title"><a href="news/'. urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($recent_news->articles[$i]->title)))) .'">'. $recent_news->articles[$i]->title .'</a></h3>';
                            echo '</div> </div> </div>';
                        }
                    ?>
                    
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent News</h2>
						</div>
                    </div>
                    
                    <?php
                        for($i = 2; $i < 11; $i++){
                            echo '<div class="col-md-4">';
                            echo '<div class="post">';
                            echo '<a class="post-img" href="blog-post.html"><img src="'. $recent_news->articles[$i]->urlToImage .'" alt=""></a>';
                            echo '<div class="post-body">';
                            echo '<div class="post-meta">';
                            echo '<span class="post-date">'. date('F j, Y', strtotime($recent_news->articles[$i]->publishedAt)) .'</span>';
                            echo '</div>';
                            echo '<h3 class="post-title"><a href="news/'. urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($recent_news->articles[$i]->title)))) .'">'. $recent_news->articles[$i]->title .'</a></h3>';
                            echo '</div> </div> </div>';
                            if(($i - 1) % 3 == 0){
                                echo '<div class="clearfix visible-md visible-lg"></div>';
                            }
                        }
                    ?>

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
                            
                            <?php
                                foreach($news_headline_us->articles as $h){
                                    echo '<div class="col-md-12">';
                                    echo '<div class="post post-row">';
                                    echo '<a class="post-img" href="blog-post.html"><img src="'. $h->urlToImage .'" alt=""></a>';
                                    echo '<div class="post-body">';
                                    echo '<div class="post-meta">';
                                    echo '<span class="post-date">'. date('F j, Y', strtotime($h->publishedAt)) .'</span>';
                                    echo '</div>';
                                    echo '<h3 class="post-title"><a href="news/'. urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($h->title)))) .'">'. $h->title .'</a></h3>
                                    <p>'. substr($h->content, 0, 150).'...' .'</p>';
                                    echo '</div> </div> </div>';
                                }
                            ?>

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
									<li><a href="category/business" class="cat-1">Business</a></li>
									<li><a href="category/entertainment" class="cat-2">Entertainment</a></li>
									<li><a href="category/health" class="cat-3">Health</a></li>
                                    <li><a href="category/science" class="cat-4">Science</a></li>
                                    <li><a href="category/sports" class="cat-5">Sports</a></li>
									<li><a href="category/technology" class="cat-6">Technology</a></li>
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

<?php
    require 'templates/footer.php';
?>