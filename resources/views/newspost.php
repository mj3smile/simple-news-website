<?php require 'templates/header.php' ?>
			<!-- Page Header -->
			<div id="post-header" class="page-header">
				<div class="background-img" style="background-image: url('<?php echo $news->articles[0]->urlToImage; ?>');"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">
								<span class="post-date"><?php echo date('F j, Y', strtotime($news->articles[0]->publishedAt)); ?></span>
							</div>
							<h1><?php echo $news->articles[0]->title; ?></h1>
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
                                    <?php echo $news->articles[0]->content; ?>
                                </p>
							</div>
						</div>
						
						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="<?php echo url('img/author.png'); ?>" style="width: 85px;" alt="">
									</div>
									<div class="media-body" style="vertical-align: middle;">
										<h3><?php echo $news->articles[0]->author; ?></h3>
										<?php echo $news->articles[0]->source->name; ?>
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
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
        <!-- /section -->
<?php require 'templates/footer.php' ?>