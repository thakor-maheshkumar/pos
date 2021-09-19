@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="card">

				<div class="card-header"><h4 class="float-left">Add Product</h4><a href="#" style="float:right" class="btn btn-dark" data-toggle="modal" data-target="#addproduct"><i class="fa fa-plus" style="float: right;">Add Product</i></a></div>
				<div class="card-body">
					<table class="table table-bordered table-left">
						<thead>
							<tr>
								<th>#</th>
								<th>Product Name</th>
								<th>Brand</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Stock</th>
							</tr>
						</thead>
						<tbody>	
							@foreach($product as $key=>$value)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$value->product_name}}</td>
								<td>{{$value->brand}}</td>
								<td>{{ number_format($value->price,2) }}</td>
								<td>{{ $value->quantity }}</td>
								<td>
									@if($value->alert_stock >=$value->quantity) 
									<span class="badge badge-danger">Low Stock > {{$value->alert_stock}}</span>
									@else 
									<span class="badge badge-success">{{$value->alert_stock}}<span>
									@endif
							</td> 
								<td>
									<div class="btn-group">
										<a href="#" data-toggle="modal" data-target="#edituser{{ $value->id }}" class="btn btn-info btn-sm"><i class="fa fa-edit">Edit</i></a>
										<a href="#" data-toggle="modal" data-target="#deleteproduct{{ $value->id }}" class="btn btn-danger btn -sm"><i class="fa fa-trash"></i>Delete</a>
									</div>
								</td> -
							</tr>
							@include('product.edit')
								<div class="modal right fade" id="deleteproduct{{ $value->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="staticBackdropLabel">Add User</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form method="post" action="{{route('product.destroy',$value->id)}}">
													@csrf
													@method('delete')
												<p>Are You sure want to delete this user{{ $value->product_name }}</p>
													<div class="modal-footer">
														<button class="btn btn-default" data-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-danger">Delete</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</tbody>
						</table>
					</div>

				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="card-header"><h4><i class="fa fa-plus"></i>Search</h4></div>
					<div class="card-body">
						.......
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="modal right fade" id="addproduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="staticBackdropLabel">Add Product</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data" autocomplete="off">
							@csrf
							<div class="form-group">
								<label for="name">Product Name</label>
								<input type="text" name="product_name" id="" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Product Code</label>
								<input type="text" name="product_code" id="" class="form-control" >
							</div>
							<div class="form-group">
								<label for="name">Brand</label>
								<input type="text" name="brand" id="" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Price</label>
								<input type="number" name="price" id="" class="form-control" >
							</div>
							<div class="form-group">
								<label for="name">Quantity</label>
								<input type="number" name="quantity" id="" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Stock</label>
								<input type="text" name="alert_stock" id="" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Description</label>
								<textarea name="description" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="name">Image</label>
								<input type="file" name="product_image" class="form-control">
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary btn-block">Save User</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<style type="text/css">
		.modal.right .modal-dialog{
			top: 0;
			right: 0;
			margin-right: 0;
		}
		.modal.fade:not(.in).right .modal-dialog{
			-webkit-transform: translated(25%,0,0);
			transform: translated3d(25%, ,0,0);
		}
	</style>
	@endsection