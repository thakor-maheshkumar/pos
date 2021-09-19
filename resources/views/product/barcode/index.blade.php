@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">

				<div class="card-header"><h4 class="float-left">Product Barcodes</h4>
					
				<div class="card-body">
					<div id="print">
						<div class="row">
							@forelse($barcode as $barcodes)
							<div class="col-md-3"> 
								<div class="card">
									<div class="card-body">
										{{-- {!!$barcodes->barcode!!} --}}
										{{-- <img src="products/barcodes/{{$barcodes->barcodes}}"> --}}
									{{-- 	<img src="{{ asset('products/barcodes/'.$barcodes->$barcode) }}"> --}}
										<img src="products/barcodes/{{ $barcodes->barcode }}">
										<h4>{{ $barcodes->product_code }}</h4>
									</div>
								</div>
							</div>
							@empty
							<h2 align="center">No Data</h2>
							@endforelse
						</div>
					</div>	
				</div>
		</div>
	</div>
</div>	
	@endsection