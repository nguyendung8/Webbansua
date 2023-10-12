@extends('backend.master')
@section('title', 'Thống kê')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thống kê</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Tổng doanh thu</div>
					<div class="panel-body">
                        {{ number_format($total_sold,0,',','.')}} VND
						<div class="clearfix"></div>
					</div>
				</div>
                <div class="panel panel-primary">
					<div class="panel-heading">Thống kê sản phẩm bán chạy</div>
					<div class="panel-body">
                        <div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tên Sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th width="20%">Ảnh sản phẩm</th>
											<th width="20%">Tình trạng</th>
										</tr>
									</thead>
									<tbody>
										@foreach($product_bestseller as $product)
										<tr>
											<td>{{ $product->prod_id }}</td>
											<td>{{ $product->prod_name }}</td>
											<td>{{ number_format($product->prod_price,0,',','.')}} VND</td>
											<td class="img-product">
												<img height="150px" src="{{ asset('lib/storage/app/avatar/'.$product->prod_img) }}">
											</td>
											<td>{{ ($product->prod_status == 0) ? "Hết hàng" : "Còn hàng" }} </td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
                <div class="panel panel-primary">
					<div class="panel-heading">Thống kê sản phẩm đã hết hàng</div>
					<div class="panel-body">
                        <div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tên Sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th width="20%">Ảnh sản phẩm</th>
											<th width="20%">Tình trạng</th>
										</tr>
									</thead>
									<tbody>
										@foreach($product_out_of_lock as $product)
										<tr>
											<td>{{ $product->prod_id }}</td>
											<td>{{ $product->prod_name }}</td>
											<td>{{ number_format($product->prod_price,0,',','.')}} VND</td>
											<td class="img-product">
												<img height="150px" src="{{ asset('lib/storage/app/avatar/'.$product->prod_img) }}">
											</td>
											<td>{{ ($product->prod_status == 0) ? "Hết hàng" : "" }} </td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>
	<style>
		.img-product {
			display: flex;
			justify-content: center;
		}
	</style>
@stop
