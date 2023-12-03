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
	{{-- {{dd($card_category)}} --}}
	{{-- @foreach ($product_card as $item)
		{{dd($item)}}
	@endforeach --}}
	{{-- {{dd($cards)}} --}}
	

	<div class="holder breadcrumbs-wrap mt-0">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="index.html">Home</a></li>
				<li><a href="category.html">Women</a></li>
				<li><span>Leather Pegged Pants</span></li>
			</ul>
		</div>
	</div>
	
	{{-- {{dd($card_category->photos)}} --}}

	<div class="holder">
		<div class="container js-prd-gallery" id="prdGallery">
			<div class="row prd-block prd-block-under prd-block--prv-bottom">

				<div class="col">
					<div class="js-prd-d-holder">
						<div class="prd-block_title-wrap">
							<div class="prd-block_reviews" data-toggle="tooltip" data-placement="top" title="Scroll To Reviews">
								
								<span class="reviews-link">
									<a href="#" class="js-reviews-link"> 
										(17 reviews)
									</a>
								</span>
							</div>
							<h1 class="prd-block_title">{{$card_category->name}} : <span> <small> ({{$card_category->products_count}}) باقة/ باقات </small></span></h1>
							
						</div>
					</div>
				</div>

			</div>

			{{-- {{dd($card_category)}} --}}
			<div class="row prd-block prd-block--prv-bottom">
				{{-- related to image  --}}
				<div class="col-md-5 col-lg-5 col-xl-5 aside--sticky js-sticky-collision">
					<div class="aside-content">
						<div class="mb-2 js-prd-m-holder"></div>

						{{-- image show --}}
						<div class="prd-block_main-image">
							<div class="prd-block_main-image-holder" id="prdMainImage">

								<div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">

									@foreach ($card_category->photos as $photo)
									
										<div data-value="Beige">
											<span class="prd-img">
												<img
													src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
													data-src="{{asset('assets/card_categories/' . $photo->file_name)}}"
													class="lazyload fade-up elzoom" 
													alt="{{$card_category->name}}"
													data-zoom-image="{{asset('assets/card_categories/' . $photo->file_name)}}" 
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
						{{-- image show temp  --}}
						<div class="product-previews-wrapper">

							<div class="product-previews-carousel js-product-previews-carousel">

								@foreach ($card_category->photos as $photo)
									<a href="#" data-value="Beige">
										<span class="prd-img">
											<img
												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
												data-src="{{asset('assets/card_categories/'. $photo->file_name)}}"
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


				<div class="col-md-7 col-lg-7 col-xl-7 mt-1 mt-md-0">
					<div class="prd-block_info prd-block_info--style1"
						data-prd-handle="/card_categories/copy-of-suede-leather-mini-skirt">
						

						<div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-3 data-to-show-md-2 data-to-show-sm-2 data-to-show-xs-2"
							 {{-- data-slick='{"slidesToShow": 2, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}' --}}
						>

							@forelse ($cards as $card_product)

							  <div class=" prd prd--style2 prd-labels--max prd-labels-shadow"
 
							  >
								<div class="prd-inside">
								  <div class="prd-img-area">
									<a href="{{route('frontend.card',$card_product->slug)}}" class="prd-img image-container">
									  <img
										src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
										data-src="{{asset('assets/products/'.$card_product->firstMedia->file_name)}}"
										alt="بطائق الدفع"
										class="js-prd-img lazyload fade-up"
									  />
									  <img
										src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
										data-src="{{asset('assets/products/'.$card_product->lastMedia->file_name)}}"
										alt="بطائق الدفع"
										class="js-prd-img lazyload fade-up"
									  />
									  <div class="foxic-loader"></div>
									  <div class="prd-big-circle-labels">
										<div class="label-sale">
										  <span>-{{$card_product->offer_price}}% <span class="sale-text">تخفيض</span></span>
										  <div class="countdown-circle">
											<div
											  class="countdown js-countdown"
											  data-countdown="2021/07/01"
											></div>
										  </div>
										</div>
									  </div>
									</a>
									<div class="prd-circle-labels">
									  <a
										href="#"
										class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
										title="Add To Wishlist"
										><i class="icon-heart-stroke"></i></a
									  ><a
										href="#"
										class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
										title="Remove From Wishlist"
										><i class="icon-heart-hover"></i
									  ></a>
									  <a
										href="#"
										class="circle-label-qview js-prd-quickview prd-hide-mobile"
										data-src="ajax/ajax-quickview.html"
										><i class="icon-eye"></i><span>استعراض سريع</span></a
									  >
									</div>
								  </div>
								  <div class="prd-info">
									<div class="prd-info-wrap">
									  <div class="prd-info-top">
										<div class="prd-tag"><a href="#">القسم</a></div>
									  </div>
									  <div class="prd-rating justify-content-center">
										<i class="icon-star-fill fill"></i
										><i class="icon-star-fill fill"></i
										><i class="icon-star-fill fill"></i
										><i class="icon-star-fill fill"></i
										><i class="icon-star-fill fill"></i>
									  </div>
									  <div class="prd-tag"><a href="#">القسم</a></div>
									  <h2 class="prd-title">
										<a href="product.html">{{$card_product->name}}</a>
									  </h2>
									  <div class="prd-description">
										Quisque volutpat condimentum velit. Class aptent taciti
										sociosqu ad litora torquent per conubia nostra, per
										inceptos himenaeos. Nam nec ante sed lacinia.
									  </div>
									</div>
									<div class="prd-hovers">
									  <div class="prd-circle-labels">
										<div>
										  <a
											href="#"
											class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
											title="Add To Wishlist"
											><i class="icon-heart-stroke"></i></a
										  ><a
											href="#"
											class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
											title="Remove From Wishlist"
											><i class="icon-heart-hover"></i
										  ></a>
										</div>
										<div>
										  <a
											href="#"
											class="circle-label-qview prd-hide-mobile js-prd-quickview"
											data-src="ajax/ajax-quickview.html"
											><i class="icon-eye"></i><span>استعراض سريع</span></a
										  >
										</div>
									  </div>
									  <div class="prd-price">
										<div class="price-old">$ 200</div>
										<div class="price-new">$ {{$card_product->price}}</div>
									  </div>
									  <div class="prd-action">
										<div class="prd-action-left">
										  <form action="#">
											<button
											  class="btn js-prd-addtocart"
											  data-product='{"name": "{{$card_product->name}}", "path":"{{asset('assets/products/'.$card_product->lastMedia->file_name)}}", "url":"product.html", "aspect_ratio":0.778}'
											>
											  اضافة للسلة
											</button>
										  </form>
										</div>
									  </div>
									</div>
								  </div>
								</div>
							  </div>
							@empty
								
							@endforelse
					
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

					<p>{!! $card_category->description !!}</p>
					
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

	
	
	  {{-- card categories  --}}
	  <div class="holder global_width">
		<div class="container">
		  <div class="title-wrap text-center">
			<h2 class="h1-style">قد يعجبك ايضا</h2>
		  </div>
		  <div
			class="prd-grid prd-promo-carousel data-to-show-4 js-prd-promo-carousel"
		  >
	
			@forelse ($card_categories as $card_category)
			  <div class="prd-promo prd-promo--lg prd-has-loader">
				<div class="prd-inside">
				  <div class="prd-img-area">
					<a href="{{route('frontend.card_category',$card_category->slug)}}" class="image-hover-scale">
					  <img
						src="{{asset('assets/card_categories/'.$card_category->firstMedia->file_name)}}"
						alt="{{$card_category->name}}"
						class="js-prd-img"
					  />
					  <div class="prd-big-circle-labels">
						<div class="label-sale">
						  <span>-false <span class="sale-text">Sale</span></span>
						  <div class="countdown-circle">
							<div
							  class="countdown js-countdown"
							  data-countdown="2021/07/01"
							></div>
						  </div>
						</div>
					  </div>
					</a>
				  </div>
				  <div class="prd-info text-center">
					<h2 class="prd-title"><a href="product.html">{{$card_category->name}}</a></h2>
					{{-- <div class="prd-rating">
					  <i class="icon-star-fill fill"></i
					  ><i class="icon-star-fill fill"></i
					  ><i class="icon-star-fill fill"></i
					  ><i class="icon-star-fill fill"></i
					  ><i class="icon-star-fill fill"></i>
					  <span></span>
					</div> --}}
					<div class="prd-hover">
					  {{-- <div class="prd-price">
						<div class="price-old">$ 200</div>
						<div class="price-new">$ 180</div>
					  </div> --}}
					  <div class="prd-action">
						<button
						  class="btn js-prd-addtocart"
						  {{-- data-product='{"name": "بطائق الدفع", "path":"{{asset('frontend/images/games/products/product-07-1.webp')}}", "url":"product.html", "aspect_ratio":0.778}' --}}
						>
						   عرض الباقات
						</button>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			@empty
				
			@endforelse
	
			
			
			
	
		  </div>
		</div>
	  </div>

</div>


@endsection