@extends('layouts.admin')
@section('title','Sửa sản phẩm')
@section('contentHeader')
    <h1>
        Sửa
        <small> Sản phẩm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('product.index') }}"> Sản phẩm</a></li>
        <li class="active">Sửa sản phẩm</li>
    </ol>
@endsection
@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                position: 'center',
                type: 'success',
                title: '{{session('success')}}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <div class="row">
        <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <b>Lỗi!! Bạn vui vòng kiểm tra lại:</b>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body">
                <form role="form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                         <input type="text" class="form-control" placeholder="Nhập tên sản phẩm..." name="txtName" value="{{ old('txtName',$product['title']) }}">
                    </div>
                    <div class="form-group">
                        <label>Đường dẫn sản phẩm</label>
                         <input type="text" class="form-control" placeholder="Nhập đường sản phẩm..." name="txtSlug" value="{{ old('txtSlug',$product['slug']) }}">
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea id="addProduct" name="txtDescription" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('txtDescription',$product['description'])}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Thương hiệu</label>
                         <input type="text" class="form-control" placeholder="Nhập tên thương hiệu..." name="txtTrademark" value="{{ old('txtTrademark',$product['trademark']) }}">
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                         <input type="text" class="form-control" placeholder="Nhập giá sản phẩm..." name="txtPrice" value="{{ old('txtPrice',$product['price']) }}">
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mãi: Nhập bằng giá ở trên nếu không có khuyến mãi</label>
                         <input type="text" class="form-control" placeholder="Nhập giá khuyến mãi sản phẩm..." name="txtPromotionPrice" value="{{ old('txtPromotionPrice',$product['promotion_price']) }}">
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" name='ddlProductType'>
                            @foreach($product_types as $product_type)
                                @if ($product['product_type_id'] == $product_type->id)
                                    <option value="{{$product_type->id}}" selected>{{$product_type->title}}</option>
                                @else
                                    <option value="{{$product_type->id}}">{{$product_type->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
    <script type="text/javascript">
            $(function () {
                $('#addProduct').wysihtml5()
            })
        </script>
@endsection