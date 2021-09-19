@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="card">

				<div class="card-header"><h4 class="float-left">Add User</h4><a href="#" style="float:right" class="btn btn-dark" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus" style="float: right;">Add Employee</i></a></div>
				<div class="card-body">
					<table class="table table-bordered table-left">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								
								<th>Role</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>	
							@foreach($user as $key=>$value)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$value->name}}</td>
								<td>{{$value->email}}</td>
								<td> @if($value->is_admin==1)
									Admin 
								@else Cashier @endif</td>
								<td>
									<div class="btn-group">
										<a href="#" data-toggle="modal" data-target="#edituser{{ $value->id }}" class="btn btn-info btn-sm"><i class="fa fa-edit">Edit</i></a>
										<a href="#" data-toggle="modal" data-target="#deleteuser{{ $value->id }}" class="btn btn-danger btn -sm"><i class="fa fa-trash"></i>Delete</a>
									</div>
								</td>
							</tr>
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
												<form method="post" action="{{route('users.update',$value->id)}}">
													@csrf
													@method('put')
													<div class="form-group">
														<label for="name">Name</label>
														<input type="text" name="name" id="" class="form-control" value="{{ $value->name }}">
													</div>
													<div class="form-group">
														<label for="name">Email</label>
														<input type="email" name="email" id="" class="form-control" value="{{$value->email}}">
													</div>

													<div class="form-group">
														<label for="name">Password</label>
														<input type="password" name="password" id="" class="form-control" value="{{ $value->password }}" readonly="">
													</div>

													<div class="form-group">
														<label for="name">Role</label>
														<select name="is_admin" class="form-control" id="">
															<option value="1" @if($value->is_admin==1) selected @endif>Admin</option>
															<option value="2" @if($value->is_admin==2) selected @endif>Cashier</option>	
														</select>
													</div>
													<div class="modal-footer">
														<button class="btn btn-primary btn-block">Save User</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="modal right fade" id="deleteuser{{ $value->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="staticBackdropLabel">Add User</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form method="post" action="{{route('users.destroy',$value->id)}}">
													@csrf
													@method('delete')
												<p>Are You sure want to delete this user{{ $value->name }}</p>
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
	<div class="modal right fade" id="addUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="staticBackdropLabel">Add User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="{{route('users.store')}}">
							@csrf
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Email</label>
								<input type="email" name="email" id="" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Phone</label>
								<input type="text" name="phone" id="" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Password</label>
								<input type="password" name="password" id="" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Confirm Password</label>
								<input type="password" name="confirm_password" id="" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Role</label>
								<select name="is_admin" class="form-control" id="">
									<option value="1">Admin</option>
									<option value="2">Cashier</option>	
								</select>
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