@extends('layouts.site')
@section('title','TCTShop - Bán Giày Online')
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
@section('show-categories')
    <div class="colorlib-product">
        <div class="container-fluid">
            @foreach($categories as $cat)
                @if($loop->index % 2 == 0)
                    <div class="row">
                @endif
                    <div class="col-sm-6 text-center">
                        <div class="featured">
                            <a href="{{route('category',$cat['slug'])}}" class="featured-img" style="background-image: url({{$cat['slug_image']}});"></a>
                            <div class="desc">
                                <h2><a href="{{route('category',$cat['slug'])}}">{{$cat['title']}}</a></h2>
                            </div>
                        </div>
                    </div>
                @if(($loop->index % 2 != 0) || ($loop->index == (count($categories) - 1)))
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
@section('all-product')
    <div class="colorlib-product">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                    <h2>Tất cả sản phẩm </h2>
                </div>
            </div>
            <div class="row row-pb-md">
                @foreach($products as $product)
                    <div class="col-lg-3 mb-4 text-center">
                        <div class="product-entry border">
                            <a href="{{route('product',$product['slug'])}}" class="prod-img">
                                <img src="{{$product->images->first()['slug']}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                            </a>
                            <div class="desc">
                                <h2><a href="{{route('product',$product['slug'])}}">{{$product['title']}}</a></h2>
                                @if($product['price'] != $product['promotion_price'])
                                    <span class="price"><b>{{$product['promotion_price']}} VNĐ</b></span>
                                    <span class="price"><strike>{{$product['price']}} VNĐ</strike></span>
                                @else
                                    <span class="price"><b>{{$product['promotion_price']}} VNĐ</b></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if(($loop->index + 1) % 4 == 0)
                        <div class="w-100"></div>
                    @endif
                @endforeach
                <div class="w-100"></div>
                {{$products->links('vendor.pagination.default')}}
            </div>
        </div>
    </div>
@endsection
