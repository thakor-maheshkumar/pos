<a href="#" class="btn btn-outline rounded-pill" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-list"></i></a>
<a href="{{ route('users.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-user">User</i></a>
<a href="{{ route('product.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-box">Product</i></a>
<a href="{{ route('order.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop">Cashier</i></a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-file"></i>Report</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill"></i>Transaction</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-chart"></i>Supplier</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-users"></i>Customers</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-file"></i>Incoming</a>
<a href="{{ route('product.barcode') }}" class="btn btn-outline rounded-pill"><i class="fa fa-barcode"></i>BarCode</a>

<style type="text/css">
	.btn-outline{
		border-color: #008B8B;
		color: #008B8B;
	}
	.btn-outline:hover{
		background:#008B8B;
		color: #fff;
	}
</style>