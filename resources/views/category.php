<?php require 'templates/header.php'; ?>

			<!-- Page Header -->
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<ul class="page-header-breadcrumb">
								<li><a href="<?php echo url('.'); ?>">Home</a></li>
								<li><?php echo $category; ?></li>
							</ul>
							<h1><?php echo $category; ?></h1>
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
									<a class="post-img" href="blog-post.html"><img src="<?php echo $news->articles[0]->urlToImage; ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<span class="post-date"><?php echo date('F j, Y', strtotime($news->articles[0]->publishedAt)); ?></span>
										</div>
										<h3 class="post-title"><a href="<?php echo url('news'). "/" . urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($news->articles[0]->title)))) ?>"><?php echo $news->articles[0]->title; ?></a></h3>
									</div>
								</div>
							</div>
                            <!-- /post -->
                            
                            <?php
                                for($i = 1; $i < 3; $i++){
                                    echo '<div class="col-md-6">';
                                    echo '<div class="post">';
                                    echo '<a class="post-img" href="blog-post.html"><img src="'. $news->articles[$i]->urlToImage .'" alt=""></a>';
                                    echo '<div class="post-body">';
                                    echo '<div class="post-meta">';
                                    echo '<span class="post-date">'. date('F j, Y', strtotime($news->articles[$i]->publishedAt)) .'</span>';
                                    echo '</div>';
                                    echo '<h3 class="post-title"><a href="'. url('news'). "/" . urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($news->articles[$i]->title)))) .'">'. $news->articles[$i]->title .'</a></h3>';
                                    echo '</div> </div> </div>';
                                }

                                for($i = 3; $i < sizeof($news->articles); $i++){
                                    echo '<div class="col-md-12">';
                                    echo '<div class="post post-row">';
                                    echo '<a class="post-img" href="blog-post.html"><img src="'. $news->articles[$i]->urlToImage .'" alt=""></a>';
                                    echo '<div class="post-body">';
                                    echo '<div class="post-meta">';
                                    echo '<span class="post-date">'. date('F j, Y', strtotime($news->articles[$i]->publishedAt)) .'</span>';
                                    echo '</div>';
                                    echo '<h3 class="post-title"><a href="'. url('news'). "/" . urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($news->articles[$i]->title)))) .'">'. $news->articles[$i]->title .'</a></h3>
                                    <p>'. substr($news->articles[$i]->content, 0, 150).'...' .'</p>';
                                    echo '</div> </div> </div>';
                                }
                            ?>
                            
							<!-- <div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div> -->
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
                                    <li><a href="<?php echo url('category/business') ?>" class="cat-1">Business</a></li>
									<li><a href="<?php echo url('category/entertainment') ?>" class="cat-2">Entertainment</a></li>
									<li><a href="<?php echo url('category/health') ?>" class="cat-3">Health</a></li>
                                    <li><a href="<?php echo url('category/science') ?>" class="cat-4">Science</a></li>
                                    <li><a href="<?php echo url('category/sports') ?>" class="cat-5">Sports</a></li>
									<li><a href="<?php echo url('category/technology') ?>" class="cat-6">Technology</a></li>
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