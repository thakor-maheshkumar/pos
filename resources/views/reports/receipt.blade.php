<div class="invoice-pos">
<div id="printed-content">
	<center id="logo">
		<div class="logo"></div>
		<div class="info"></div>
		<h2>POS Ltd</h2>
	</center>
</div>
<div class="mid">
	<div class="info">
		<h2>Contact Us</h2>
		<p>
			Address:
			Email
			Phone
		</p>
	</div>
</div>
<div class="bot">
	<div id="table">
		<table class="table table-dark">
		<tr class="tabletitle"> 
			<td class="item">Item</td>
			<td class="Hours">Qty</td>
			<td class="Rate">Unit</td>
			<td class="Rate">Discount</td>
			<td class="Rate">Sub Total</td>
		</tr>

		@forelse($order_receipt as $receipt)
		<tr class="service"> 
			<td class="item">{{$receipt->product->product_name}}</td>
			<td class="Hours">{{ number_format($receipt->unitprice,2) }}</td>
			<td class="Rate">{{ $receipt->quantity }}</td>
			<td class="Rate">{{ $receipt->discount ? ' ' :'0'}}</td>
			<td class="Rate">${{ number_format($receipt->amount,2) }}</td>
		</tr>
		@empty
		<p>No Data Found</p>
		@endforelse
		<tr class="tabletitle">
			<td></td>
			<td></td>
			<td></td>
			<td class="Rate"><p class="itemtext">Tax-Case</p></td>
			<td class="payement"><p class="itemtext">Sum Total ${{ number_format($receipt->amount,2) }}</p></td>
		</tr>
		<tr class="tabletitle">
			<td></td>
			<td></td>
			<td></td>
			<td class="Rate"><p class="itemtext">Tax-aasha</p></td>
			<td class="payement"><p class="itemtext">Sum Total ${{ number_format($order_receipt->sum('amount'),2) }}</p></td>
		</tr>
		</table>
		<div class="legalcopy">
			<p class="legal"><strong>** Thank You for visiting</strong><br>The good which are subject</p>
		</div>
		<div class="serial-number">
			<span class="seriel">
				123456789
			</span>
		</div>
	</div>
</div>
</div>