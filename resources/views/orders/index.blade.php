@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="card">

				<div class="card-header"><h4 class="float-left">Add Product</h4><a href="#" style="float:right" class="btn btn-dark" data-toggle="modal" data-target="#addproduct"><i class="fa fa-plus" style="float: right;">Add Product</i></a></div>
				<form method="post" action="{{route('order.store')}}">
					@csrf
				<div class="card-body">
					<table class="table table-bordered table-left">
						<thead>
							<tr>
								<th></th>
								<th>Product Name</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Dis (%)</th>
								<th>Total</th>
								<th><a href="#" class="btn btn-sm btn-success add_more"><i class="fa fa-plus"></i></a></th>
							</tr>
						</thead>
						<tbody id="addMoreProduct" class="addMoreProduct">	
							<tr>
								<td>1</td>
								<td>
									<select name="product_id[]" id="product_id" class="form-control product_id">
										<option value="Select Item">Select Item</option>
										@foreach($products as $product)
										<option data-price="{{ $product->price }}" value="{{ $product->id }}">{{ $product->product_name }}</option>
										@endforeach
									</select>
								</td>
								<td>
									<input type="number" name="quantity[]" id="quantity" class="form-control quantity">
								</td>
								<td>
									<input type="number" name="price[]" id="price" class="form-control price">
								</td>
								<td>
									<input type="number" name="discount[]" id="discount" class="form-control discount">
								</td>	
								<td>
									<input type="number" name="total_amount[]" id="total_amount" class="form-control total_amount">
								</td>
								<td>
									<a href="#" class="btn btn-sm btn-danger rounded"><i class="fa fa-times"></i></a>
								</td>			
							</tr>
							
							</tbody>
						</table>
					</div>

				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header"><h4 >Total 0.00 <b class="total"></b></h4></div>
					<div class="card-body">
						<div class="btn-group">
							<button type="button" 
							class="btn btn-dark" 
							onclick="PrintReceiptContent('print')"><i class="fa fa-print"></i>Print
							</button>
							<button type="button" 
							class="btn btn-primary" 
							onclick="PrintReceiptContent('print')"><i class="fa fa-print"></i>History
							</button>
							<button type="button" 
							class="btn btn-danger" 
							onclick="PrintReceiptContent('print')"><i class="fa fa-print"></i>Reports
							</button>
						</div> 
						<div class="panel">
							<div class="row">
								<table class="table table-striped">
									<tr>
										<td>
											<label>Customer Name</label>
											<input type="text" name="customer_name" id="customer_name" class="form-control">
										</td>
										<td>
											<label>Customer Address</label>
											<input type="text" name="customer_address" id="customer_name" class="form-control">
										</td>
									</tr>
								</table>
								<td>Payment Method <br>
									<span class="radio-item">
										<input type="radio" name="payment_method" id="payment_method" class="true" value="cash" checked="checked">
										<label for="payment_method"><i class="fa fa-money-bill text-success"></i>Cash</label>
									</span>
									<span class="radio-item">
										<input type="radio" name="payment_method" id="payment_method" 
										class="true" value="Bank Transfer" checked="checked">
										<label for="payment_method"><i class="fa fa-university text-danger"></i>Bank Transfer</label>
									</span>
									<span class="radio-item">
										<input type="radio" name="payment_method" id="payment_method" class="true" value="Credit Card">
										<label for="payment_method"><i class="fa fa-credit-card text-info"></i>Credit Card</label>
									</span>
								</td><br>
								<td>
									Payement
									<input type="number" name="payment_amount" id="payment_amount" class="form-control">
								</td>
								<td>
									Returnring Change
									<input type="number" name="balance" id="balance" class="form-control">
								</td>
								<td>
									<button class="btn-primary btn-lg btn-block mt-5">Save</button>
								</td>
								<td>
									<button class="btn-danger btn-lg btn-block mt-2">Calculator</button>
								</td>
								<br>
								<div class="text-center" style="text-align: center !important;">
									<a href="#" class="text-danger text-center"><i class="fa fa-sign-out-alt"></i></a>
								</div>
							</div>	
						</div>
					</div>
				</div>

			</div>
		</form>
		</div>
	</div>
	<div class="modal right fade" id="addproduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="staticBackdropLabel">Add Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
					<div class="modal-body">
						<form method="post" action="{{route('product.store')}}">
							@csrf
							<div class="form-group">
								<label for="name">Product Name</label>
								<input type="text" name="product_name" id="" class="form-control">
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
							<div class="modal-footer">
								<button class="btn btn-primary btn-block">Save User</button>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
	<div class="modal">
		<div id="print">
			@include('reports.receipt');
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
	
	@push('script')
	<script type="text/javascript">
		
			$('.add_more').on('click',function(){
				//alert('hello');
				var product=$('.product_id').html();

				var numberofrow=($('.addMoreProduct').length-0)+1;
				var tr='<tr><td class "no">'+numberofrow+'</td>'+
						'<td><select class="form-control product_id" name="product_id[]">'+product+'</select></td>'+
						'<td><input type="number" name="quantity[]" class="form-control quantity"></td>'+
						'<td><input type="number" name="price[]" class="form-control price"></td>'+
						'<td><input type="number" class="form-control discount" name="discount[]"></td>'+
						'<td><input type="number" class="form-control total_amount" name="total_amount[]"></td>'+
						'<td><a href="#" class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a></td>'+
						'</tr>';
						$('.addMoreProduct').append(tr);
			});
			$('.addMoreProduct').delegate('.delete','click',function(){
				$(this).parent().parent().remove();
			});
			function TotalAmount(){
				var total=0;
				$('.total_amount').each(function(i,e){
					var amount=$(this).val()-0;
					total+=amount;
				});
				$('.total').html(total);
			}
			$('.addMoreProduct').delegate('.product_id','change',function(){
				var tr=$(this).parent().parent();
				var price=tr.find('.product_id option:selected').attr('data-price');
				tr.find('.price').val(price);
				var qty=tr.find('.quantity').val()-0;
				var disc=tr.find('.discount').val()-0;
				var price=tr.find('.price').val()-0;
				var total_amount=(qty*price)-((qty*price*disc)/100);
				tr.find('.total_amount').val(total_amount);
				TotalAmount();
			});
			$('.addMoreProduct').delegate('.quantity,.discount','keyup',function(){
				var tr=$(this).parent().parent();
				var qty=tr.find('.quantity').val()-0;
				var disc=tr.find('.discount').val()-0;
				var price=tr.find('.price').val()-0;
				var total_amount=(qty*price)-((qty*price*disc)/100);
				tr.find('.total_amount').val(total_amount);
				TotalAmount();
			});
			$('#payment_amount').on('keyup',function(){
				var total=$('.total').html();
				var payment_amount=$(this).val();
				var tot=total-payment_amount;
				$('#balance').val(tot);
			})
			function PrintReceiptContent(el){
				var data='<input type="button" id="printPageButton" '+' class="printPageButton" '+' value="Print Receipt" onClick="window.print()">'; 
				data += document.getElementById(el).innerHTML;
				myReceipt=window.open("","myWin","left=150,top=130,width=400,height=400");
				myReceipt.screnX=0;
				myReceipt.screnY=0;
				myReceipt.document.write(data);
				myReceipt.document.title="Print Receipt";
				myReceipt.focus();
				setTimeout(()=>{
					myReceipt.close();
				},8000);
			}

	</script>
	@endpush