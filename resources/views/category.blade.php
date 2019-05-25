@extends('layouts.site')
@section('title',$category['title'])
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
@section('show-categories',"")
@section('all-product')
    <div class="colorlib-product">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                    <h2>Tất cả sản phẩm {{$category['title']}}</h2>
                </div>
            </div>
            <div class="row row-pb-md">
                @foreach($category->products()->paginate(12) as $product)
                    <div class="col-lg-3 mb-4 text-center">
                        <div class="product-entry border">
                            <a href="#" class="prod-img">
                                <img src="{{$product->images->first()['slug']}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                            </a>
                            <div class="desc">
                                <h2><a href="#">{{$product['title']}}</a></h2>
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
                {{$category->products()->paginate(12)->links('vendor.pagination.default')}}
            </div>
        </div>
    </div>
@endsection
