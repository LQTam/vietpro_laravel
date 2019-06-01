@extends('frontend.master')
@section('title','Home')
@section('main')
<script>
	function updateCart(qty,rowID){
		//ajax get from server
		$.get(
			// url,
			// object,
			// method
			"{{asset('cart/update')}}",
			{qty:qty, rowID:rowID},
			function(){
				location.reload();
			}
		)
	}
</script>
	<div id="wrap-inner">
		<div id="list-cart">
			<h3>Giỏ hàng</h3>
			@if($totalCart >=1)
			<form>
				<table class="table table-bordered .table-responsive text-center">
					<tr class="active">
						<td width="11.111%">Ảnh mô tả</td>
						<td width="22.222%">Tên sản phẩm</td>
						<td width="22.222%">Số lượng</td>
						<td width="16.6665%">Đơn giá</td>
						<td width="16.6665%">Thành tiền</td>
						<td width="11.112%">Xóa</td>
					</tr>
					@foreach ($carts as $cart)
					<tr>
						<td><img height='200px' class="img-responsive" src="{{asset('productImage/images/'.$cart->cart_img)}}"></td>
						<td>{{$cart->cart_name}}</td>
						<td>
							<div class="form-group">
								<input onchange="updateCart(this.value,'{{$cart->cart_id}}')" class="form-control" type="number" value='{{$cart->cart_qty}}'>
							</div>
						</td>
						<td><span class="price">{{number_format($cart->cart_price,0,',','.')}} đ</span></td>
						<td><span class="price">{{number_format(($cart->cart_price * $cart->cart_qty),0,',','.')}} đ</span></td>
						<td><a href="{{asset('cart/delete/'.$cart->cart_id)}}">Xóa</a></td>
					</tr>
					@endforeach
				</table>
				<div class="row" id="total-price">
					<div class="col-md-6 col-sm-12 col-xs-12">										
							Tổng thanh toán: <span class="total-price">{{number_format($total,0,',','.')}} đ</span>
																									
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<a href="{{asset('/')}}" class="my-btn btn">Mua tiếp</a>
						<a href="#" class="my-btn btn">Cập nhật</a>
						<a href="{{asset('cart/deleteAll')}}" class="my-btn btn">Xóa giỏ hàng</a>
					</div>
				</div>
			</form>   
			
			<div id="xac-nhan">
					<h3>Xác nhận mua hàng</h3>
					<form>
						<div class="form-group">
							<label for="email">Email address:</label>
							<input required type="email" class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
							<label for="name">Họ và tên:</label>
							<input required type="text" class="form-control" id="name" name="name">
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại:</label>
							<input required type="number" class="form-control" id="phone" name="phone">
						</div>
						<div class="form-group">
							<label for="add">Địa chỉ:</label>
							<input required type="text" class="form-control" id="add" name="add">
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
						</div>
					</form>
				</div>
			</div>
			@else
				<h3 class='text-center'>Gio Hang Trong</h3>
			@endif
		</div>

		
@endsection