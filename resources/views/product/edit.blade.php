<div class="modal right fade" id="edituser{{ $value->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="staticBackdropLabel">Add User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{route('product.update',$value->id)}}" enctype="multipart/form-data" autocomplete="off">
						@csrf
						@method('put')
						<div class="form-group">
							<label for="name">Product Name</label>
							<input type="text" name="product_name" id="" class="form-control" value="{{ $value->product_name }}">
						</div>
						<div class="form-group">
							<label for="name">Product Code</label>
							<input type="text" name="product_code" id="" class="form-control" value="{{ $value->product_code }}">
						</div>
						<div class="form-group">
							<label for="name">Brand</label>
							<input type="text" name="brand" id="" class="form-control" value="{{ $value->brand }}">
						</div>
						<div class="form-group">
							<label for="name">Price</label>
							<input type="number" name="price" id="" class="form-control" value="{{ $value->price }}">
						</div>
						<div class="form-group">
							<label for="name">Quantity</label>
							<input type="number" name="quantity" id="" class="form-control" value="{{ $value->quantity }}">
						</div>
						<div class="form-group">
							<label for="name">Stock</label>
							<input type="text" name="alert_stock" id="" class="form-control" value="{{ $value->alert_stock }}">
						</div>
						<div class="form-group">
							<label for="name">Description</label>
							<textarea name="description" class="form-control">{{$value->description}}</textarea>
						</div>
						<div class="form-group">
							<label for="name">Image</label>
							<img src="{{ asset('products/images/'.$value->product_image) }}" width="40">
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
