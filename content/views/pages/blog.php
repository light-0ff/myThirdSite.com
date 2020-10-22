<main>
	<!-- introBannerHolder -->
	<section class="introBannerHolder d-flex w-100 bgCover" style="background-image: url(http://placehold.it/1920x300);">
		<div class="container">
			<div class="row">
				<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
					<h1 class="headingIV fwEbold playfair mb-4">Blog</h1>
					<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
						<li class="mr-2"><a href="home.html">Home</a></li>
						<li class="mr-2">/</li>
						<li class="active">Blog</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- twoColumns -->
	<div class="twoColumns container pt-lg-23 pb-lg-20 pt-md-16 pb-md-4 pt-10 pb-4">
		<div class="row">
			<div class="col-12 col-lg-9 order-lg-3">
				<!-- content -->
				<article id="content">
					<?php
					// varDump($data);
					for ($i = 0; $i < count($data['posts']); $i++) {
					?>
						<div class="newsBlogColumn mb-md-9 mb-6">
							<div class="imgHolder position-relative mb-6">
								<a href="/post/getpost/?post=<?php echo $data['posts'][$i]['id'] ?>">
									<img src="<?php echo $data['posts'][$i]['imgsrc'] ?>" alt="<?php echo $data['posts'][$i]['imgalt'] ?>" class="img-fluid">
								</a>
							</div>
							<div class="textHolder d-flex align-items-start">
								<time class="time text-center text-uppercase py-sm-3 py-1 px-1" datetime="2019-02-03 20:00"> <strong class="fwEbold d-block mb-1">число</strong> месяц</time>
								<div class="alignLeft pl-sm-6 pl-3">
									<h2 class="headingV fwEbold mb-2"><a href="/post/getpost/?post=<?php echo $data['posts'][$i]['id'] ?>"><?php echo $data['posts'][$i]['title'] ?></a></h2>
									<span class="postBy d-block pb-sm-6 pb-2 mb-3">Post by: <a href="#">Автор</a></span>
									<p class="mb-0"><?php echo $data['posts'][$i]['slogan'] ?></p>
								</div>
							</div>
						</div>
					<?php
					}
					?>
					<!-- newsBlogColumn -->
					<!-- <div class="newsBlogColumn mb-md-9 mb-6">
								<div class="imgHolder position-relative mb-6">
									<a href="blog-detail.html">
										<img src="http://placehold.it/870x450" alt="image description" class="img-fluid">
									</a>
								</div>
								<div class="textHolder d-flex align-items-start">
									<time class="time text-center text-uppercase py-sm-3 py-1 px-1" datetime="2019-02-03 20:00"> <strong class="fwEbold d-block mb-1">20</strong> Sep</time>
									<div class="alignLeft pl-sm-6 pl-3">
										<h2 class="headingV fwEbold mb-2"><a href="blog-detail.html">Aptent taciti soci litora cianpen</a></h2>
										<span class="postBy d-block pb-sm-6 pb-2 mb-3">Post by: <a href="blog-detail.html">Jane doe</a></span>
										<p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...</p>
									</div>
								</div>
							</div> -->
					<!-- newsBlogColumn -->
					<!-- <div class="newsBlogColumn mb-md-9 mb-6">
								<div class="imgHolder position-relative mb-6">
									<a href="blog-detail.html">
										<img src="http://placehold.it/870x450" alt="image description" class="img-fluid">
									</a>
								</div>
								<div class="textHolder d-flex align-items-start">
									<time class="time text-center text-uppercase py-sm-3 py-1 px-1" datetime="2019-02-03 20:00"> <strong class="fwEbold d-block mb-1">20</strong> Sep</time>
									<div class="alignLeft pl-sm-6 pl-3">
										<h2 class="headingV fwEbold mb-2"><a href="blog-detail.html">Aptent taciti soci litora cianpen</a></h2>
										<span class="postBy d-block pb-sm-6 pb-2 mb-3">Post by: <a href="blog-detail.html">Jane doe</a></span>
										<p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...</p>
									</div>
								</div>
							</div> -->
					<!-- newsBlogColumn -->
					<!-- <div class="newsBlogColumn mb-md-9 mb-6">
								<div class="imgHolder position-relative mb-6">
									<a href="blog-detail.html">
										<img src="http://placehold.it/870x450" alt="image description" class="img-fluid">
									</a>
								</div>
								<div class="textHolder d-flex align-items-start">
									<time class="time text-center text-uppercase py-sm-3 py-1 px-1" datetime="2019-02-03 20:00"> <strong class="fwEbold d-block mb-1">20</strong> Sep</time>
									<div class="alignLeft pl-sm-6 pl-3">
										<h2 class="headingV fwEbold mb-2"><a href="blog-detail.html">Aptent taciti soci litora cianpen</a></h2>
										<span class="postBy d-block pb-sm-6 pb-2 mb-3">Post by: <a href="blog-detail.html">Jane doe</a></span>
										<p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...</p>
									</div>
								</div>
							</div> -->
					<div class="col-12 mb-sm-0 mb-6">
						<!-- pagination -->
						<ul class="list-unstyled pagination d-flex justify-content-center align-items-end">
							<?php
							$currentPage = empty($_GET['cpage']) ? 1 : $currentPage = intval($_GET['cpage']);
							$category_id = empty($_GET['category']) ? null : $category_id = intval($_GET['category']);
							?>
							<li class="page-item"><a class="page-link" href="/post/?<?php if ($category_id != null) echo "category=$category_id&"; ?>cpage=1">В начало</a></li>
							<li><a href="/post/?
								<?php
								if ($category_id != null) echo "category=$category_id&"; ?>
								cpage=<?php echo $currentPage > 1 ? $currentPage - 1 : 1 ?>"><i class="fas fa-chevron-left"></i></a></li>
							<!-- <li class="active"><a href="javascript:void(0);">1</a></li> -->
							<!-- <li><a href="javascript:void(0);">2</a></li> -->
							<!-- <li>...</li> -->
							<!-- ----------------------------------------------------------------------- -->
							<?php
							// varDump($data['pageCount']);
							?>
							<?php for ($i = 1; $i < $data['pageCount'] + 1; $i++) { ?>
								<li class="<?php echo $i == $currentPage ? "active" : '' ?>"><a href="/post/?
								<?php
								if ($category_id != null) echo "category=$category_id&";
								?>cpage=
								<?php
								echo $i;
								?>"><?php echo $i ?></a></li>
							<?php } ?>
							<!-- ----------------------------------------------------------------------- -->
							<li><a href="/post/?
								<?php if ($category_id != null) echo "category=$category_id&"; ?>
								cpage=<?php echo $currentPage < $data['pageCount'] ? $currentPage + 1 : $data['pageCount'] ?>"><i class="fas fa-chevron-right"></i></a></li>
							<li class="page-item"><a class="page-link" href="/post/?<?php if ($category_id != null) echo "category=$category_id&"; ?>cpage=<?php echo  $data['pageCount'] ?>">В конец</a></li>
						</ul>
					</div>
				</article>
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
						<h3 class="headingVII fwEbold text-uppercase mb-4">CATEGORIES (Выгрузить)</h3>
						<ul class="list-unstyled archiveList mb-0">

							<?php
							// varDump($data["categories"]);
							for ($i = 0; $i < count($data['categories']); $i++) {
							?>
								<li class="mb-3"><a href="http://mythirdsite.com/post/?category=<?php echo $data['categories'][$i]['id'] ?>" class="d-block"><?php echo $data['categories'][$i]['category'] ?></a></li>
							<?php
							}
							?>
							<!-- <li class="mb-3"><a href="http://http://mythirdsite.com/post/?category=2" class="d-block">Creative</a></li>
							<li class="mb-3"><a href="javascript:void(0);" class="d-block">Fashion</a></li>
							<li class="mb-3"><a href="javascript:void(0);" class="d-block">Image</a></li>
							<li class="mb-3"><a href="javascript:void(0);" class="d-block">Photography</a></li>
							<li class="mb-3"><a href="javascript:void(0);" class="d-block">Travel</a></li>
							<li class="mb-3"><a href="javascript:void(0);" class="d-block">Videos</a></li>
							<li class="mb-3"><a href="javascript:void(0);" class="d-block">WordPress</a></li> -->
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
	</div>
	<div class="container mb-lg-24 mb-md-16 mb-10">
		<!-- subscribeSecBlock -->
		<section class="subscribeSecBlock bgCover col-12 pt-lg-24 pb-lg-12 pt-md-16 pb-md-8 py-10" style="background-image: url(http://placehold.it/1170x465)">
			<header class="col-12 mainHeader mb-9 text-center">
				<h1 class="headingIV playfair fwEblod mb-4">Subscribe Our Newsletter</h1>
				<span class="headerBorder d-block mb-5"><img src="images/hbdr.png" alt="Header Border" class="img-fluid img-bdr"></span>
				<p class="mb-6">Enter Your email address to join our mailing list and keep yourself update</p>
			</header>
			<form class="emailForm1 mx-auto overflow-hidden d-flex flex-wrap">
				<input type="email" class="form-control px-4 border-0" placeholder="Enter your mail...">
				<button type="submit" class="btn btnTheme btnShop fwEbold text-white py-3 px-4 py-md-3 px-md-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></button>
			</form>
		</section>
	</div>
</main>