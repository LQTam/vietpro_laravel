@extends('frontend.master')
@section('title','Home')
@section('main')
	<div id="wrap-inner">
		@foreach($product as $product)
		<div id="product-info">
			<div class="clearfix"></div>
			<h3>{{$product->prod_name}}</h3>
			<div class="row">
				<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
					<img height="185px" src="{{asset('productImage/images/'.$product->prod_img)}}">
				</div>
				<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
					<p>Giá: <span class="price">{{number_format($product->prod_price,0,',','.')}}</span></p>
					<p>Bảo hành: {{$product->prod_warranty}}</p> 
					<p>Phụ kiện: {{$product->prod_accessories}}</p>
					<p>Tình trạng: {{$product->prod_condition}}</p>
					<p>Khuyến mại: {{$product->prod_promotion}}</p>
					<p>Còn hàng: @if($product->prod_status == 1) Con hang @else
								Het hang @endif
					</p>
					<form action="{{asset('cart/add')}}" method="post">
						<input type="hidden" name="prod_id" value='{{$product->prod_id}}'>
						<input type="hidden" name="name" value='{{$product->prod_name}}'>
						<input type="hidden" name="price" value='{{$product->prod_price}}'>
						<input type="hidden" name="img" value='{{$product->prod_img}}'>
						<input type="hidden" name="qty" value='1'>
						<input type="submit" name="submit" class='form-control btn btn-danger'  value='Đặt hàng online' id="">
						{{csrf_field()}}
					</form>
				</div>
			</div>							
		</div>
		<div id="product-detail">
			<h3>Chi tiết sản phẩm</h3>
			<p class="text-justify">{!!$product->prod_desc!!}</p>
		</div>
		<div id="comment">
			<h3>Bình luận</h3>
			<div class="col-md-9 comment">
				<form>
					<div class="form-group">
						<label for="email">Email:</label>
						<input required type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="name">Tên:</label>
						<input required type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="cm">Bình luận:</label>
						<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
					</div>
					<div class="form-group text-right">
						<button type="submit" class="cursor-poiter btn btn-default">Gửi</button>
					</div>
				</form>
			</div>
		</div>
		<div id="comment-list">
			@foreach ($comments as $comm)
			<ul>
				<li class="com-title">
					{{$comm->comm_name}}
					<br>
					<span>{{$comm->created_at}}</span>	
				</li>
				<li class="com-details">
					{{$comm->comm_content}}
				</li>
			</ul>
			@endforeach
		</div>
		@endforeach
	</div>					
@endsection