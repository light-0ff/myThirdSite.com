<!-- pageWrapper -->
<div id="pageWrapper">
	<main>
		<!-- introBannerHolder -->
		<section class="introBannerHolder d-flex w-100 bgCover" style="background-image: url(http://placehold.it/1920x300);">
			<div class="container">
				<div class="row">
					<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
						<h1 class="headingIV fwEbold playfair mb-4">Blog</h1>
						<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
							<li class="mr-sm-2 mr-1"><a href="home.html">Home</a></li>
							<li class="mr-sm-2 mr-1">/</li>
							<li class="mr-sm-2 mr-1"><a href="blog.html">Blog</a></li>
							<li class="mr-sm-2 mr-1">/</li>
							<li class="active"><?php echo $data['postdata']["title"] ?></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- twoColumns -->
		<div class="twoColumns container pt-xl-23 pb-xl-20 py-lg-20 py-md-16 py-10">
			<div class="row border-bottom mb-9">
				<div class="col-12 col-lg-9 order-lg-3">
					<!-- newsBlogColumn -->
					<div class="newsBlogColumn mb-9">
						<div class="imgHolder mb-6">
							<img src="<?php echo $data['postdata']["imgsrc"] ?>" alt="<?php echo $data['postdata']["imgalt"] ?>" class="img-fluid">
						</div>
						<div class="textHolder d-flex align-items-start mb-1">
							<time class="time text-center text-uppercase py-sm-3 py-1 px-1" datetime="2019-02-03 20:00"> <strong class="fwEbold d-block mb-1">20</strong> Sep</time>
							<div class="alignLeft pl-6 w-100">
								<h2 class="headingV fwEbold mb-2"><?php echo $data['postdata']["title"] ?></h2>
								<?php
								// varDump($data)
								?>
								<span class="postBy d-block pb-6 mb-3">Post by: Jane doe</span>
							</div>
						</div>
						<p>слоган: <?php echo $data['postdata']["slogan"] ?></p>
						<p><?php echo $data['postdata']["content"] ?> ---</p>
					</div>
				</div>
				<div class="col-12 col-lg-3 order-lg-1">
					<!-- sidebar -->
					<aside id="sidebar">
						<!-- widget -->
						<section class="widget overflow-hidden mb-md-9 mb-6">
							<h3 class="headingVII fwEbold text-uppercase mb-4">Search</h3>
							<form action="javascript:void(0);" class="searchForm position-relative border">
								<fieldset>
									<input type="search" class="form-control" placeholder="Search product...">
									<button class="position-absolute"><i class="icon-search"></i></button>
								</fieldset>
							</form>
						</section>
						<!-- widget -->
						<section class="widget overflow-hidden mb-md-9 mb-6">
							<h3 class="headingVII fwEbold text-uppercase mb-2">RECENT POSTS</h3>
							<ul class="list-unstyled recentPostList mb-0">
								<li><a href="javascript:void(0);" class="py-2 d-block">Blog image post</a></li>
								<li><a href="javascript:void(0);" class="py-2 d-block">Post with Gallery</a></li>
								<li><a href="javascript:void(0);" class="py-2 d-block">Post with Audio</a></li>
								<li><a href="javascript:void(0);" class="py-2 d-block">Post with Video</a></li>
								<li><a href="javascript:void(0);" class="py-2 d-block">Maecenas ultricies</a></li>
							</ul>
						</section>
						<!-- widget -->
						<section class="widget overflow-hidden mb-md-9 mb-6">
							<h3 class="headingVII fwEbold text-uppercase mb-2">RECENT COMMENTS</h3>
							<ul class="list-unstyled recentPostList mb-0">
								<li><a href="javascript:void(0);" class="py-2 d-block">Admin on Vivamus blandit</a></li>
								<li><a href="javascript:void(0);" class="py-2 d-block">Admin on Vivamus blandit</a></li>
								<li><a href="javascript:void(0);" class="py-2 d-block">Admin on Vivamus blandit</a></li>
								<li><a href="javascript:void(0);" class="py-2 d-block">Admin on Vivamus blandit</a></li>
								<li><a href="javascript:void(0);" class="py-2 d-block">Admin on Vivamus blandit</a></li>
							</ul>
						</section>
						<!-- widget -->
						<section class="widget overflow-hidden mb-md-6 mb-3">
							<h3 class="headingVII fwEbold text-uppercase mb-4">ARCHIVES</h3>
							<ul class="list-unstyled archiveList mb-0">
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">March 2018</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">December 2018</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">November 2018</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">September 2018</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">August 2018</a></li>
							</ul>
						</section>
						<!-- widget -->
						<section class="widget overflow-hidden mb-md-5 mb-3">
							<h3 class="headingVII fwEbold text-uppercase mb-4">CATEGORIES</h3>
							<ul class="list-unstyled archiveList mb-0">
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">Creative</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">Fashion</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">Image</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">Photography</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">Travel</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">Videos</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">WordPress</a></li>
							</ul>
						</section>
						<!-- widget -->
						<section class="widget overflow-hidden mb-md-9 mb-6">
							<h3 class="headingVII fwEbold text-uppercase mb-4">META</h3>
							<ul class="list-unstyled archiveList mb-0">
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">Log in</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">Entries RSS</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">Comments RSS</a></li>
								<li class="mb-3"><a href="javascript:void(0);" class="d-block">WordPress.org</a></li>
							</ul>
						</section>
					</aside>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- socialNetworkList -->
					<ul class="list-unstyled socialNetworkList d-flex flex-nowrap mb-5">
						<li class="text-uppercase mr-12">SHARE THIS POST:</li>
						<li class="mr-4"><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
						<li class="mr-4"><a href="javascript:void(0);" class="fab fa-google-plus-g"></a></li>
						<li class="mr-4"><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
						<li class="mr-4"><a href="javascript:void(0);" class="fab fa-pinterest-p"></a></li>
					</ul>
				</div>
			</div>
			<div class="row mb-10">
				<div class="col-12 border-bottom">
					<!-- commentsBlock -->
					<div class="commentsBlock overflow-hidden mb-2">
						<?php
						$countComments = count($data['comments'])
						?>
						<h4 class="headingVII text-uppercase mb-5"><?php echo $countComments ?> COMMENTS</h4>
						<!-- commentArea -->
						<?php echo comment_render($data['comments']) ?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- commentFormArea -->
					<div class="commentFormArea">
						<h2 class="headingVII text-uppercase mb-5">LeaVe A Comment</h2>
						<form class="commentform" enctype="multipart/form-data" action="/post/add_coment" method="POST">
							<div class="form-group w-100 mb-5">
								<textarea class="form-control" placeholder="comment" name="comment"></textarea>
								<!-- <input type="text" id="comment" name="comment" class="form-control"> -->
							</div>
							<div class="d-flex flex-wrap row1 mb-md-5">
								<div class="form-group coll mb-5 invisible">
									<!-- <label for="postNumber" class="mb-1" name="date">Date *</label> -->
									<input type="text" id="post" name="postId" class="form-control" value="<?php echo $_GET['post']; ?>">
								</div>
								<div class="form-group coll mb-5 invisible">
									<label for="email" class="mb-1">Ответить на</label>
									<input type="text" id="parent" name="parentId" class="form-control" value="0">
								</div>
								<!-- <div class="form-group coll mb-5">
									<label for="website" class="mb-1">Website *</label>
									<input type="text" class="form-control" id="website" name="thisUser" value="0">
								</div> -->
							</div>
							<button type="submit" class="btn btnTheme btnShop md-round fwEbold text-white py-3 px-4 py-md-3 px-md-4">Post Now <i class="fas fa-arrow-right ml-2"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="container mb-lg-24 mb-md-16 mb-10">
			<!-- subscribeSecBlock -->
			<section class="subscribeSecBlock bgCover col-12 pt-xl-24 pb-xl-12 pt-lg-20 pt-md-16 pt-10 pb-md-8 pb-5" style="background-image: url(http://placehold.it/1720x465)">
				<header class="col-12 mainHeader mb-sm-9 mb-6 text-center">
					<h1 class="headingIV playfair fwEblod mb-4">Subscribe Our Newsletter</h1>
					<span class="headerBorder d-block mb-md-5 mb-3"><img src="/content/static/images/hbdr.png" alt="Header Border" class="img-fluid img-bdr"></span>
					<p class="mb-sm-6 mb-3">Enter Your email address to join our mailing list and keep yourself update</p>
				</header>
				<form class="emailForm1 mx-auto overflow-hidden d-flex flex-wrap" action="/main/notifyme" method="POST">
					<input type="email" class="form-control px-4 border-0" name='email' placeholder="Enter your mail...">
					<button type="submit" class="btn btnTheme btnShop fwEbold text-white py-3 px-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></button>
				</form>
				<div id="login-page">
			</section>
		</div>
</div>
<script src="/content/static/js/commentreply.js"></script>