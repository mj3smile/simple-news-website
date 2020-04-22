<?php require 'templates/header.php'; ?>
			<!-- Page Header -->
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
                        <ul class="page-header-breadcrumb">								
									<li>Search results for</li>
								</ul>
								<h1><?php echo $query; ?></h1>
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

                                <?php
                                    foreach($news->articles as $h){
                                        echo '<div class="col-md-12">';
                                        echo '<div class="post post-row">';
                                        echo '<a class="post-img" href="blog-post.html"><img src="'. $h->urlToImage .'" alt=""></a>';
                                        echo '<div class="post-body">';
                                        echo '<div class="post-meta">';
                                        echo '<span class="post-date">'. date('F j, Y', strtotime($h->publishedAt)) .'</span>';
                                        echo '</div>';
                                        echo '<h3 class="post-title"><a href="'. url('news'). "/" . urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($h->title)))) .'">'. $h->title .'</a></h3>
                                        <p>'. substr($h->content, 0, 150).'...' .'</p>';
                                        echo '</div> </div> </div>';
                                    }
								?>

							</div>
						</div>
						
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /section -->
<?php require 'templates/footer.php'; ?>