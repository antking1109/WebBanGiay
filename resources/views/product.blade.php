@extends('layouts.site')
@section('title',$product['title'])
@section('sale')
    <div class="sale">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center">
                    <div class="row">
                        <div class="owl-carousel2">
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('product-detail')
    <div class="colorlib-product">
        <div class="container">
            <div class="row row-pb-lg product-detail-wrap">
                <div class="col-sm-8">
                    <div class="owl-carousel">
                        @foreach($product->images as $image)
                            <div class="item">
                                <div class="product-entry border">
                                    <a href="{{$image['slug']}}" class="prod-img">
                                        <img src="{{$image['slug']}}" class="img-fluid" alt="{{$image['alt']}}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-desc">
                        <h3>{{$product['title']}}</h3>
                        <p class="price">
                            @if($product['price'] != $product['promotion_price'])
                                <span class="price"><b>{{$product['promotion_price']}} VNĐ</b></span>
                                <span class="price"><strike>{{$product['price']}} VNĐ</strike></span>
                            @else
                                <span class="price"><b>{{$product['promotion_price']}} VNĐ</b></span>
                            @endif
                        </p>
                        <div class="size-wrap">
                            <div class="block-26 mb-2">
                                <h4>Chọn Size</h4>
                                <ul>
                                    @foreach($has_sizes as $has_size)
                                        <li><a href="javascript:void(0)">{{$has_size->size}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="block-26 mb-4">
                                <h4>Chọn Màu</h4>
                                <ul>
                                    @foreach($has_colors as $has_color)
                                        <li><a href="javascript:void(0)">{{$has_color->color}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="input-group mb-4">
                     	<span class="input-group-btn">
                        	<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                           <i class="icon-minus2"></i>
                        	</button>
                    		</span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1"
                                   min="1" max="100">
                            <span class="input-group-btn ml-1">
                        	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                             <i class="icon-plus2"></i>
                         </button>
                     	</span>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <p class="addtocart"><a href="cart.html" class="btn btn-primary btn-addtocart"><i
                                            class="icon-shopping-cart"></i> Chọn mua</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-12 pills">
                            <div class="bd-example bd-example-tabs">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-description-tab" data-toggle="pill"
                                           href="#pills-description" role="tab" aria-controls="pills-description"
                                           aria-expanded="true" aria-selected="false">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill"
                                           href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer"
                                           aria-expanded="true" aria-selected="false">Manufacturer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="pills-review-tab" data-toggle="pill"
                                           href="#pills-review" role="tab" aria-controls="pills-review"
                                           aria-expanded="true" aria-selected="true">Review</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane border fade" id="pills-description" role="tabpanel"
                                         aria-labelledby="pills-description-tab">
                                        <p>Even the all-powerful Pointing has no control about the blind texts it is an
                                            almost unorthographic life One day however a small line of blind text by the
                                            name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                        <p>When she reached the first hills of the Italic Mountains, she had a last view
                                            back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet
                                            Village and the subline of her own road, the Line Lane. Pityful a rethoric
                                            question ran over her cheek, then she continued her way.</p>
                                        <ul>
                                            <li>The Big Oxmox advised her not to do so</li>
                                            <li>Because there were thousands of bad Commas</li>
                                            <li>Wild Question Marks and devious Semikoli</li>
                                            <li>She packed her seven versalia</li>
                                            <li>tial into the belt and made herself on the way.</li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane border fade" id="pills-manufacturer" role="tabpanel"
                                         aria-labelledby="pills-manufacturer-tab">
                                        <p>Even the all-powerful Pointing has no control about the blind texts it is an
                                            almost unorthographic life One day however a small line of blind text by the
                                            name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                        <p>When she reached the first hills of the Italic Mountains, she had a last view
                                            back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet
                                            Village and the subline of her own road, the Line Lane. Pityful a rethoric
                                            question ran over her cheek, then she continued her way.</p>
                                    </div>

                                    <div class="tab-pane border fade active show" id="pills-review" role="tabpanel"
                                         aria-labelledby="pills-review-tab">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3 class="head">23 Reviews</h3>
                                                <div class="review">
                                                    <div class="user-img"
                                                         style="background-image: url(images/person1.jpg)"></div>
                                                    <div class="desc">
                                                        <h4>
                                                            <span class="text-left">Jacob Webb</span>
                                                            <span class="text-right">14 March 2018</span>
                                                        </h4>
                                                        <p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
                                                            <span class="text-right"><a href="#" class="reply"><i
                                                                        class="icon-reply"></i></a></span>
                                                        </p>
                                                        <p>When she reached the first hills of the Italic Mountains, she
                                                            had a last view back on the skyline of her hometown
                                                            Bookmarksgrov</p>
                                                    </div>
                                                </div>
                                                <div class="review">
                                                    <div class="user-img"
                                                         style="background-image: url(images/person2.jpg)"></div>
                                                    <div class="desc">
                                                        <h4>
                                                            <span class="text-left">Jacob Webb</span>
                                                            <span class="text-right">14 March 2018</span>
                                                        </h4>
                                                        <p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
                                                            <span class="text-right"><a href="#" class="reply"><i
                                                                        class="icon-reply"></i></a></span>
                                                        </p>
                                                        <p>When she reached the first hills of the Italic Mountains, she
                                                            had a last view back on the skyline of her hometown
                                                            Bookmarksgrov</p>
                                                    </div>
                                                </div>
                                                <div class="review">
                                                    <div class="user-img"
                                                         style="background-image: url(images/person3.jpg)"></div>
                                                    <div class="desc">
                                                        <h4>
                                                            <span class="text-left">Jacob Webb</span>
                                                            <span class="text-right">14 March 2018</span>
                                                        </h4>
                                                        <p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
                                                            <span class="text-right"><a href="#" class="reply"><i
                                                                        class="icon-reply"></i></a></span>
                                                        </p>
                                                        <p>When she reached the first hills of the Italic Mountains, she
                                                            had a last view back on the skyline of her hometown
                                                            Bookmarksgrov</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="rating-wrap">
                                                    <h3 class="head">Give a Review</h3>
                                                    <div class="wrap">
                                                        <p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					(98%)
									   					</span>
                                                            <span>20 Reviews</span>
                                                        </p>
                                                        <p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					(85%)
									   					</span>
                                                            <span>10 Reviews</span>
                                                        </p>
                                                        <p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					(70%)
									   					</span>
                                                            <span>5 Reviews</span>
                                                        </p>
                                                        <p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					(10%)
									   					</span>
                                                            <span>0 Reviews</span>
                                                        </p>
                                                        <p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					(0%)
									   					</span>
                                                            <span>0 Reviews</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function (e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
@endsection
