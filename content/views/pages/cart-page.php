		<main>
			<!-- introBannerHolder -->
			<section class="introBannerHolder d-flex w-100 bgCover" style="background-image: url(http://placehold.it/1920x300);">
				<div class="container">
					<div class="row">
						<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">My Cart</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-sm-2 mr-1"><a href="home.html">Home</a></li>
								<li class="mr-sm-2 mr-1">/</li>
								<li class="mr-sm-2 mr-1"><a href="shop.html">Shop</a></li>
								<li class="mr-sm-2 mr-1">/</li>
								<li class="active">My Cart</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- cartHolder -->
			<div class="cartHolder container pt-xl-21 pb-xl-24 py-lg-20 py-md-16 py-10">

				<div class="row">
					<!-- table-responsive -->
					<div class="col-12 table-responsive mb-xl-22 mb-lg-20 mb-md-16 mb-10">
						<!-- cartTable -->
						<table class="table cartTable">
							<thead>
								<tr>
									<th scope="col" class="text-uppercase fwEbold border-top-0">product</th>
									<th scope="col" class="text-uppercase fwEbold border-top-0">price</th>
									<th scope="col" class="text-uppercase fwEbold border-top-0">quantity</th>
									<th scope="col" class="text-uppercase fwEbold border-top-0">total</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<!-- <div class="col-12">
							<form action="javascript:void(0);" class="cartForm mb-5">
								<div class="form-group mb-0">
									<label for="note" class="fwEbold text-uppercase d-block mb-1">add note</label>
									<textarea id="note" class="form-control"></textarea>
								</div>
							</form>
						</div> -->
					<!-- <div class="col-12 col-md-6">
							<form action="javascript:void(0);" class="couponForm mb-md-0 mb-5">
								<fieldset>
									<div class="mt-holder d-inline-block align-bottom mr-lg-5 mr-0 mb-lg-0 mb-2">
										<label for="code" class="fwEbold text-uppercase d-block mb-1">promo code</label>
										<input type="text" id="code" class="form-control">
									</div>
									<button type="submit" class="btn btnTheme btnCart fwEbold text-center text-white md-round py-3 px-4 py-md-3 px-md-4">Apply</button>
								</fieldset>
							</form>
						</div> -->
					<div class="col-12 col-md-6">
						<div class="d-flex justify-content-between">
							<strong class="txt fwEbold text-uppercase mb-1">subtotal</strong>
							<strong class="totalPrice price fwEbold text-uppercase mb-1">900.00 $</strong>
						</div>
						<!-- <a href="javascript:void(0);" class="btn btnTheme w-100 fwEbold text-center text-white md-round py-3 px-4 py-md-3 px-md-4">Proceed to checkout</a> -->

					</div>
				</div>
				<form role="form" class="form-horizontal" enctype="multipart/form-data" action="/kart/buy_order" method="POST">
					<input type="email" class="form-control" placeholder="email" autofocus name='email'>
					<br>
					<input type="phone" class="form-control" placeholder="phone" name="phone">
					<input type="hidden" name="products" value="" class="clientCardProducts">
					<button type="button" name="savecatpostok" class="savecatpostok btn btnTheme w-100 fwEbold text-center text-white md-round py-3 px-4 py-md-3 px-md-4">buy</button>
					<script>
						$('.savecatpostok').on('click', function() {
							var clientCard = clientCard = window.sessionStorage.getItem('clientCard');
							if (clientCard != null) {
								$('.clientCardProducts').val(clientCard);
								$('.clientCardProducts').closest('.form-horizontal').submit();
							}
						})
					</script>
				</form>
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
			<!-- footerHolder -->
			<!-- <aside class="footerHolder overflow-hidden bg-lightGray pt-xl-23 pb-xl-8 pt-lg-10 pb-lg-8 pt-md-12 pb-md-8 pt-10">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-6 col-lg-4 mb-lg-0 mb-4">
							<h3 class="headingVI fwEbold text-uppercase mb-7">Contact Us</h3>
							<ul class="list-unstyled footerContactList mb-3">
								<li class="mb-3 d-flex flex-nowrap pr-xl-20 pr-0"><span class="icon icon-place mr-3"></span>
									<address class="fwEbold m-0">Address: London Oxford Street, 012 United Kingdom.</address>
								</li>
								<li class="mb-3 d-flex flex-nowrap"><span class="icon icon-phone mr-3"></span> <span class="leftAlign">Phone : <a href="javascript:void(0);">(+032) 3456 7890</a></span></li>
								<li class="email d-flex flex-nowrap"><span class="icon icon-email mr-2"></span> <span class="leftAlign">Email: <a href="javascript:void(0);">Botanicalstore@gmail.com</a></span></li>
							</ul>
							<ul class="list-unstyled followSocailNetwork d-flex flex-nowrap">
								<li class="fwEbold mr-xl-11 mr-md-8 mr-3">Follow us:</li>
								<li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
								<li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
								<li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-pinterest"></a></li>
								<li class="mr-2"><a href="javascript:void(0);" class="fab fa-google-plus-g"></a></li>
							</ul>
						</div>
						<div class="col-12 col-sm-6 col-lg-3 pl-xl-14 mb-lg-0 mb-4">
							<h3 class="headingVI fwEbold text-uppercase mb-6">Information</h3>
							<ul class="list-unstyled footerNavList">
								<li class="mb-1"><a href="javascript:void(0);">New Products</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Top Sellers</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Our Blog</a></li>
								<li class="mb-2"><a href="javascript:void(0);">About Our Shop</a></li>
								<li><a href="javascript:void(0);">Privacy policy</a></li>
							</ul>
						</div>
						<div class="col-12 col-sm-6 col-lg-3 pl-xl-12 mb-lg-0 mb-4">
							<h3 class="headingVI fwEbold text-uppercase mb-7">My Account</h3>
							<ul class="list-unstyled footerNavList">
								<li class="mb-1"><a href="javascript:void(0);">My account</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Discount</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Orders history</a></li>
								<li><a href="javascript:void(0);">Personal information</a></li>
							</ul>
						</div>
						<div class="col-12 col-sm-6 col-lg-2 pl-xl-18 mb-lg-0 mb-4">
							<h3 class="headingVI fwEbold text-uppercase mb-5">PRODUCTS</h3>
							<ul class="list-unstyled footerNavList">
								<li class="mb-2"><a href="javascript:void(0);">Delivery</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Legal notice</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Prices drop</a></li>
								<li class="mb-2"><a href="javascript:void(0);">New products</a></li>
								<li><a href="javascript:void(0);">Best sales</a></li>
							</ul>
						</div>
					</div>
				</div>
			</aside> -->
		</main>


		<script src="/content/static/js/sendproductcard.js"></script>