@extends('layouts.admin')
@section('title','Thêm chi tiết sản phẩm')
@section('contentHeader')
    <h1>
        Thêm
        <small> Chi Tiết Sản phẩm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('product.index') }}"> Sản phẩm</a></li>
        <li><a href="{{ route('product_detail.index',$product['id'])}}"> {{$product['title']}}</a></li>
        <li class="active">Thêm chi tiết sản phẩm</li>
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
                        <label>Chọn size</label>
                        <select class="form-control" name="txtSize">
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Màu</label>
                            <input type="text" class="form-control" placeholder="Nhập màu sắc..." name="txtColor" value="{{ old('txtColor') }}">
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                         <input type="number" class="form-control" placeholder="Số lượng..." name="txtQuantity" value="{{ old('txtQuantity') }}">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
@endsection
