@extends('layouts.app')

@section('style')

<style>
	.panel-group--style2 .panel-body {
		padding: 20px;
		color: #fff;
		background: inherit;
	}

	.panel-group--style2 .panel-heading {
		padding: 0;
		border-bottom: 0;
		border-radius: 0;
		background-color: inherit;
	}

	.prd-block_links-wrap-bg {
		background-color: inherit;
	}

	.prd-block_info-box,
	.prd-block .prd-block_qty .qty {
		background-color: inherit;
	}
	.tags-list li a {
		color: black;
		font-weight: bold;
		font-size: 14px;
	}

</style>
@endsection

@section('content')
<div class="container">

	<div class="holder breadcrumbs-wrap mt-0">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="index.html">Home</a></li>
				<li><a href="category.html">Women</a></li>
				<li><span>Leather Pegged Pants</span></li>
			</ul>
		</div>
	</div>

	{{-- review and card show image and detail part --}}
	<div class="holder">
		<div class="container js-prd-gallery" id="prdGallery">
			<div class="row prd-block prd-block-under prd-block--prv-bottom">

				@foreach ($reviews as $review)
					{{-- {{dd($review)}} --}}
				@endforeach

				{{-- <h1>This is my title</h1> {{dd($card->reviews )}} <br> --}}
				<h3>rating is </h3>{{$card->reviews_avg_rating}}
				@foreach ($card->reviews as $review)
				
				@endforeach
				
				{{-- rating and  review part --}}
				<div class="col">
					<div class="js-prd-d-holder">
						<div class="prd-block_title-wrap">
							<div class="prd-block_reviews" data-toggle="tooltip" data-placement="top" title="Scroll To Reviews">
								

								{{-- need:to check and fix reviews --}}
								@if ( round($card->reviews_avg_rating)  != '')
									@for ($i = 0; $i < 5; $i++)
										<i class="{{$card->reviews_avg_rating <= $i ? 'icon-star' : 'icon-star-fill fill'}}"></i>
									@endfor
								@else
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
								@endif
								<span class="reviews-link">
									<a href="#" class="js-reviews-link"> 
										(17 reviews)
									</a>
								</span>
							</div>
							<h1 class="prd-block_title">{{$card->name}}</h1>
						</div>
					</div>
				</div>

				

			</div>
			<div class="row prd-block prd-block--prv-bottom">
				{{-- slider show for card product  --}}
				<div class="col-md-5 col-lg-5 col-xl-5 aside--sticky js-sticky-collision">
					<div class="aside-content">
						<div class="mb-2 js-prd-m-holder"></div>

						{{-- This part is for main product image of the product  --}}
						<div class="prd-block_main-image">
							<div class="prd-block_main-image-holder" id="prdMainImage">
								{{-- main images in the frame  --}}
								<div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">

									@foreach ($card->photos as $photo)
									
										<div data-value="Beige">
											<span class="prd-img">
												<img
													src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
													data-src="{{asset('assets/cards/' . $photo->file_name)}}"
													class="lazyload fade-up elzoom" 
													alt="{{$card->name}}"
													data-zoom-image="{{asset('assets/cards/' . $photo->file_name)}}" 
												/>
											</span>
										</div>
									@endforeach
									
								</div>
								<div class="prd-block_label-sale-squared justify-content-center align-items-center">
									<span>Sale</span>
								</div>
							</div>
							
							
						</div>

						{{-- images link views --}}
						<div class="product-previews-wrapper">

							<div class="product-previews-carousel js-product-previews-carousel">

								@foreach ($card->photos as $photo)
									<a href="#" data-value="Beige">
										<span class="prd-img">
											<img
												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
												data-src="{{asset('assets/cards/'. $photo->file_name)}}"
												class="lazyload fade-up"
												alt="" 
											/>
										</span>
									</a>

								@endforeach

							</div>
						</div>

					</div>
				</div>


				{{-- description part  --}}
				<div class="col-md-7 col-lg-7 col-xl-7 mt-1 mt-md-0">
					<div class="prd-block_info prd-block_info--style1"
						data-prd-handle="/cards/copy-of-suede-leather-mini-skirt">
						<div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
							<div class="prd-block_price prd-block_price--style2">
								<div class="prd-block_price--actual">${{$card->price - $card->offer_price}}</div>
								<div class="prd-block_price-old-wrap">
									<span class="prd-block_price--old">${{$card->price}}</span>
									<span class="prd-block_price--text">حافظت على : ${{$card->offer_price}} (%)</span>
								</div>
							</div>
							<div class="prd-block_viewed-wrap d-none d-md-flex">
								<div class="prd-block_viewed">
									<i class="icon-time"></i>
									<span>تمت مشاهدة هذا المنتج 13 مرة خلال الساعة الماضية</span>
								</div>
							</div>
						</div>
						<div class="prd-block_description prd-block_info_item ">
							<h3>وصف قصير</h3>
							<p>
								{!! $card->description !!}
							</p>
							<div class="mt-1"></div>
							{{-- نصائح الاستخدام --}}
							<div class="row vert-margin-less">
								<div class="col-sm">
									<ul class="list-marker">
										<li>100% Polyester</li>
										<li>Lining:100% Viscose</li>
									</ul>
								</div>
								<div class="col-sm">
									<ul class="list-marker">
										<li>Do not dry clean</li>
										<li>Only non-chlorine</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="prd-progress prd-block_info_item" data-left-in-stock="">
							<div class="prd-progress-text">
								اسرع اكثر ! تبقى <span class="prd-progress-text-left js-stock-left">26</span> في المخزون
							</div>
							<div class="prd-progress-text-null"></div>
							<div class="prd-progress-bar-wrap progress">
								<div class="prd-progress-bar progress-bar active"
									data-stock="50, 10, 30, 25, 1000, 15000" style="width: 53%;"></div>
							</div>
						</div>
						<div class="prd-block_countdown js-countdown-wrap prd-block_info_item countdown-init">
							<div class="countdown-box-full-text w-md">
								<div class="row no-gutters align-items-center">
									<div class="col-sm-auto text-center">
										<div class="countdown js-countdown" data-countdown="2021/07/01"></div>
									</div>
									<div class="col">
										<div class="countdown-txt"> TIME IS RUNNING OUT!</div>
									</div>
								</div>
							</div>
						</div>
						<div class="prd-block_order-info prd-block_info_item " data-order-time="" data-locale="en">
							<i class="icon-box-2"></i>
							<div>Order in the next <span class="prd-block_order-info-time countdownCircleTimer"
									data-time="8:00:00, 15:30:00, 23:59:59"><span><span>04</span>:</span><span><span>46</span>:</span><span><span>24</span></span></span>
								to get it by <span data-date="">Tuesday, September 08, 2020</span></div>
						</div>
						<div class="prd-block_info_item prd-block_info-when-arrives d-none" data-when-arrives>
							<div class="prd-block_links prd-block_links m-0 d-inline-flex">
								<i class="icon-email-1"></i>
								<div><a href="#" data-follow-up="" data-name="Oversize Cotton Dress"
										class="prd-in-stock" data-src="#whenArrives">Inform me when the item
										arrives</a></div>
							</div>
						</div>
						<div class="prd-block_info-box prd-block_info_item">
							<div class="two-column">
								<p>Availability:
									<span class="prd-in-stock" data-stock-status="">In stock</span>
								</p>
								<p class="prd-taxes">Tax Info:
									<span>Tax included.</span>
								</p>
								<p>Collection: <span> <a href="collections.html" data-toggle="tooltip"
											data-placement="top" data-original-title="View all">Women</a></span></p>
								<p>Sku: <span data-sku="">FOXic-45812</span></p>
								<p>Vendor: <span>Banita</span></p>
								<p>Barcode: <span>314363563</span></p>
							</div>
						</div>

						<div class="order-0 order-md-100">
							<form method="post" action="#">
								
								<div class="prd-block_actions prd-block_actions--wishlist">
									<div class="prd-block_qty">
										<div class="qty qty-changer">
											<button class="decrease js-qty-button"></button>
											<input type="number" class="qty-input" name="quantity" value="1"
												data-min="1" data-max="1000">
											<button class="increase js-qty-button"></button>
										</div>
									</div>
									<div class="btn-wrap">
										<button class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart"
											data-product='{"name":  "Leather Pegged Pants ",  "url ": "product.html",  "path ": "{{asset('
											frontend/assests/images/skins/fashion/product-page/product-01.webp')}}", "aspect_ratio "
											: "0.78" }'>Add
											to cart</button>
									</div>
									<div class="btn-wishlist-wrap">
										<a href="#"
											class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--add js-add-wishlist"
											title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
										<a href="#"
											class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--off js-remove-wishlist"
											title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
									</div>
								</div>
							</form>
							<div class="prd-block_agreement prd-block_info_item order-0 order-md-100 text-right"
								data-agree>
								<input id="agreementCheckboxProductPage" class="js-agreement-checkbox"
									data-button=".shopify-payment-agree" name="agreementCheckboxProductPage"
									type="checkbox">
								<label for="agreementCheckboxProductPage"><a href="#" data-fancybox
										class="modal-info-link" data-src="#agreementInfo">I agree to the terms of
										service</a></label>
							</div>
						</div>

						<div class="prd-block_info_item">
							<ul class="prd-block_links list-unstyled">
								<li><i class="icon-size-guide"></i><a href="#" data-fancybox class="modal-info-link"
										data-src="#sizeGuide">Size Guide</a></li>
								<li><i class="icon-delivery-1"></i><a href="#" data-fancybox class="modal-info-link"
										data-src="#deliveryInfo">Delivery and Return</a></li>
								<li><i class="icon-email-1"></i><a href="#" data-fancybox class="modal-info-link"
										data-src="#contactModal">Ask about this product</a></li>
							</ul>

							<div id="sizeGuide" style="display: none;" class="modal-info-content modal-info-content-lg">
								<div class="modal-info-heading">
									<div class="mb-1"><i class="icon-size-guide"></i></div>
									<h2>Size Guide</h2>
								</div>
								<div class="table-responsive">
									<table class="table table-striped table-borderless text-center">
										<thead>
											<tr>
												<th>USA</th>
												<th>UK</th>
												<th>France</th>
												<th>Japanese</th>
												<th>Bust</th>
												<th>Waist</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>4</td>
												<td>8</td>
												<td>36</td>
												<td>7</td>
												<td>32"</td>
												<td>61 cm</td>
											</tr>
											<tr>
												<td>6</td>
												<td>10</td>
												<td>38</td>
												<td>11</td>
												<td>34"</td>
												<td>67 cm</td>
											</tr>
											<tr>
												<td>8</td>
												<td>12</td>
												<td>40</td>
												<td>15</td>
												<td>36"</td>
												<td>74 cm</td>
											</tr>
											<tr>
												<td>10</td>
												<td>14</td>
												<td>42</td>
												<td>17</td>
												<td>38"</td>
												<td>79 cm</td>
											</tr>
											<tr>
												<td>12</td>
												<td>16</td>
												<td>44</td>
												<td>21</td>
												<td>40"</td>
												<td>84 cm</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div id="deliveryInfo" style="display: none;"
								class="modal-info-content modal-info-content-lg">
								<div class="modal-info-heading">
									<div class="mb-1"><i class="icon-delivery-1"></i></div>
									<h2>Delivery and Return</h2>
								</div>
								<br>
								<h5>Our parcel courier service</h5>
								<p>Foxic is proud to offer an exceptional international parcel shipping service. It
									is straightforward and very easy to organise international parcel shipping. Our
									customer service team works around the clock to make sure that you receive high
									quality courier service from start to finish.</p>
								<p>Sending a parcel with us is simple. To start the process you will first need to
									get a quote using our free online quotation service. From this, you’ll be able
									to navigate through the online form to book a collection date for your parcel,
									selecting a shipping day suitable for you.</p>
								<br>
								<h5>Shipping Time</h5>
								<p>The shipping time is based on the shipping method you chose.<br>
									EMS takes about 5-10 working days for delivery.<br>
									DHL takes about 2-5 working days for delivery.<br>
									DPEX takes about 2-8 working days for delivery.<br>
									JCEX takes about 3-7 working days for delivery.<br>
									China Post Registered Mail takes 20-40 working days for delivery.</p>
							</div>
							
							<div id="contactModal" style="display: none;"
								class="modal-info-content modal-info-content-sm">
								<div class="modal-info-heading">
									<div class="mb-1"><i class="icon-envelope"></i></div>
									<h2>Have a question?</h2>
								</div>
								<form method="post" action="#" id="contactForm" class="contact-form">
									<div class="form-group">
										<input type="text" name="contact[name]" class="form-control form-control--sm"
											placeholder="Name">
									</div>
									<div class="form-group">
										<input type="text" name="contact[email]" class="form-control form-control--sm"
											placeholder="Email" required="">
									</div>
									<div class="form-group">
										<input type="text" name="contact[phone]" class="form-control form-control--sm"
											placeholder="Phone Number">
									</div>
									<div class="form-group">
										<textarea class="form-control textarea--height-170" name="contact[body]"
											placeholder="Message"
											required="">Hi! I need next info about the "Oversize Cotton Dress":</textarea>
									</div>
									<button class="btn" type="submit">Ask our consultant</button>
									<p class="p--small mt-15 mb-0">and we will contact you soon</p><input
										name="recaptcha-v3-token" type="hidden"
										value="03AGdBq27T8WvzvZu79QsHn8lp5GhjNX-w3wkcpVJgCH15Ehh0tu8c9wTKj4aNXyU0OLM949jTA4cDxfznP9myOBw9m-wggkfcp1Cv_vhsi-TQ9E_EbeLl33dqRhp2sa5tKBOtDspTgwoEDODTHAz3nuvG28jE7foIFoqGWiCqdQo5iEphqtGTvY1G7XgWPAkNPnD0B9V221SYth9vMazf1mkYX3YHAj_g_6qhikdQDsgF2Sa2wOcoLKWiTBMF6L0wxdwhIoGFz3k3VptYem75sxPM4lpS8Y_UAxfvF06fywFATA0nNH0IRnd5eEPnnhJuYc5LYsV6Djg7_S4wLBmOzYnahC-S60MHvQFf-scQqqhPWOtgEKPihUYiGFBJYRn2p1bZwIIhozAgveOtTNQQi7FGqmlbKkRWCA">
								</form>
							</div>
						</div>
						<div class="prd-block_info_item">
							<img class="img-responsive lazyload d-none d-sm-block"
								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
								data-src="{{asset('frontend/assests/images/payment/safecheckout.webp')}}" alt="">
							<img class="img-responsive lazyload d-sm-none"
								src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
								data-src="{{asset('frontend/assests/images/payment/safecheckout-m.webp')}}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="holder prd-block_links-wrap-bg d-none d-md-block">
		<div class="prd-block_links-wrap prd-block_info_item container mt-2 mt-md-5 py-1">
			<div class="prd-block_link"><span><i class="icon-call-center"></i>24/7 الدعم</span></div>
			<div class="prd-block_link">
				<span>انشي حساب في  center pay  لتحصل على تخفيض 15 %</span>
			</div>
			<div class="prd-block_link"><span><i class="icon-delivery-truck"></i> استجابة سريعة</span></div>
		</div>
	</div>

	<div class="holder mt-3 mt-md-5">
		<div class="container">
			<ul class="nav nav-tabs product-tab">
				<li class="nav-item"><a href="#Tab1" class="nav-link" data-toggle="tab">الوصف
						<span class="toggle-arrow"><span></span><span></span></span>
					</a></li>
				<li class="nav-item"><a href="#Tab4" class="nav-link" data-toggle="tab">كلمات مفتاحية مخصصة
						<span class="toggle-arrow"><span></span><span></span></span>
					</a></li>
				<li class="nav-item"><a href="#Tab5" class="nav-link" data-toggle="tab">التعليقات
						<span class="toggle-arrow"><span></span><span></span></span>
					</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade" id="Tab1">
					{{-- <h4 class="mb-15">{!!$card->name!!}</h4> --}}

					<p>{!! $card->description !!}</p>
					
				</div>
				
			
				<div role="tabpanel" class="tab-pane fade" id="Tab4">
					<ul class="tags-list">
						<li><a href="#">Jeans</a></li>
						<li><a href="#">St.Valentine’s gift</a></li>
						<li><a href="#">Sunglasses</a></li>
						<li><a href="#">Discount</a></li>
				
					</ul>
					<h3>اضف كلماتك المفتاحية على المنتج</h3>
					<form class="form--simple" action="#">
						<label>كلمة مفتاحية<span class="required">*</span></label>
						<input class="form-control form-control--sm">
						<button class="btn btn--md">Submit Tag</button>
						<div class="required-text">* Required Fields</div>
					</form>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="Tab5">
					<div id="productReviews">
						<div class="row align-items-center">
							<div class="col">
								<h2>تعليقات العملاء</h2>
							</div>
							<div class="col-18 col-md-auto mb-3 mb-md-0"><a href="#" class="review-write-link"><i
										class="icon-pencil"></i>إكتب تعليق</a></div>
						</div>
						<div id="productReviewsBottom">
							<div class="review-item">
								<div class="review-item_rating">
									<i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
										class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
										class="icon-star-fill fill"></i>
								</div>
								<div class="review-item_top row align-items-center">
									<div class="col">
										<h5 class="review-item_author">Jaden Ngo on May 25, 2018</h5>
									</div>
									<div class="col-auto"><a href="#" class="review-item_report">Report as
											Inappropriate</a></div>
								</div>
								<div class="review-item_content">
									<h4>Good ball and company</h4>
									<p>I recently bought this ball and this is the first ball that I actually buy
										based on quality and material, I always been playing my friend ball and one
										of them recommended me this, read some review online and decided to buy it,
										the ball feel sticky at first but quality is nice and the hand wrote letter
										was awesome because it shows how much season creator actually care about
										their customers.</p>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="holder">
		<div class="container">

			<div class="title-wrap text-center">
				<h2 class="h1-style">قد يعجبك ايضا </h2>
				<div class="carousel-arrows carousel-arrows--center"></div>
			</div>

			<div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
				data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>
				
				@forelse ($related_cards as $related_card)
					<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
						<div class="prd-inside">
							<div class="prd-img-area">
								{{-- image area --}}
								<a href="{{route('frontend.card',$related_card->slug)}}" class="prd-img image-hover-scale image-container">
									<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
										data-src="{{asset('assets/cards/'. $related_card->firstMedia->file_name)}}"
										alt="Midi Dress with Belt" class="js-prd-img lazyload fade-up">
									<div class="foxic-loader"></div>
									<div class="prd-big-squared-labels">
									</div>
								</a>
								{{-- top control area  --}}
								<div class="prd-circle-labels">
									<a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
										title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#"
										class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
										title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
									<a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile"
										data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK
											VIEW</span></a>

									

								</div>
								{{-- color style switcher  --}}
								<ul class="list-options color-swatch">

									@foreach ($related_card->photos as $photo)

										<li data-image="{{asset('assets/cards/' . $photo->file_name)}}"
											class="{{ $loop->first ? 'active': null}}"
										>
											<a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="{{$related_card->name}}">
												<img
													src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
													data-src="{{asset('assets/cards/' . $photo->file_name)}}"
													class="lazyload fade-up" 
													alt="{{$related_card->name}}"
												>
											</a>
										</li>

									@endforeach
												
								</ul>
							</div>

							{{-- button info --}}
							<div class="prd-info">
								<div class="prd-info-wrap">
									<div class="prd-info-top">
										<div class="prd-rating"><i class="icon-star-fill fill"></i><i
												class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
												class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i>
										</div>
									</div>
									<div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i
											class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
											class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
									<div class="prd-tag"><a href="#">Seiko</a></div>
									<h2 class="prd-title"><a href="product.html">Midi Dress with Belt</a></h2>
									<div class="prd-description">
										Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora
										torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
									</div>
									<div class="prd-action">
										<form action="#">
											<button class="btn js-prd-addtocart"
												data-product='{"name": "Midi Dress with Belt", "path":"{{asset('
												frontend/assests/images/skins/fashion/cards/product-06-1.webp')}}", "url"
												:"product.html", "aspect_ratio" :0.778}'>Add
												To Cart</button>
										</form>
									</div>
								</div>
								<div class="prd-hovers">
									<div class="prd-circle-labels">
										<div><a href="#"
												class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
												title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#"
												class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
												title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
										<div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview"
												data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK
													VIEW</span></a></div>
									</div>
									<div class="prd-price">
										<div class="price-new">$ 180</div>
									</div>
									<div class="prd-action">
										<div class="prd-action-left">
											<form action="#">
												<button class="btn js-prd-addtocart"
													data-product='{"name": "Midi Dress with Belt", "path":"{{asset('
													frontend/assests/images/skins/fashion/cards/product-06-1.webp')}}", "url"
													:"product.html", "aspect_ratio" :0.778}'>Add
													To Cart</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@empty
					There is no Product related to this Product
				@endforelse
			</div>
		</div>
	</div>
</div>


@endsection