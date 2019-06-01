@extends('backend.master')
@section('title','Edit Category')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Sửa danh mục
						</div>
						<div class="panel-body">
							@include("errors.login")
							<form action="" method="post">
								<div class="form-group">
									<label>Tên danh mục:</label>
									<input required type="text" value="{{$cate_id->cate_name}}" name="cate_name" class="form-control" placeholder="Tên danh mục...">
								</div>
								<div class="form-group">
										<input type="submit" name="edit" value='Edit' class="form-control btn btn-primary" placeholder="Tên danh mục...">
								</div>
								<div class="form-group">
									<a class="form-control btn btn-danger" href="{{asset('admin/category')}}">Cancel</a>
								</div>
								{{csrf_field()}}
							</form>
						</div>
					</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection