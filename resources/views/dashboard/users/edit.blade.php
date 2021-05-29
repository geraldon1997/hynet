@extends('layouts.dashboard')
    @section('content')

        <div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card" style="background: inherit;">

									<div class="card" style="background: inherit;">
										<div class="card-header" style="text-align: center;">
											<div class="card-title">Edit Method</div>
										</div>

										<form action="{{ route('user.update', $user->id) }}" method="post">
                                            @method('PUT')
                                            @csrf
											<div class="card-body">
												<div class="form-group">
													<label for="squareInput">Fullname</label>
													<input type="text" name="fullname" class="form-control input-square" value="{{ $user->fullname }}" placeholder="Fullname">
												</div>
												<div class="form-group">
													<label for="squareInput">Email</label>
													<input type="email" class="form-control input-square" name="email" value="{{ $user->email }}" placeholder="Email">
												</div>
                                                <div class="form-group">
													<label for="squareInput">Username</label>
													<input type="text" class="form-control input-square" name="username" value="{{ $user->username }}" placeholder="Username">
												</div>

												<div class="card-action" style="text-align: center;">
													<button class="btn btn-primary">Update</button>
												</div>

											</div>
										</form>

									</div>

					</div>

				</div>
			<div class="col-md-2"></div>
			</div>
    </form>
    @endsection
