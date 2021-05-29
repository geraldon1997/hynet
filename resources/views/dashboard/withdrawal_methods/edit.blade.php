@extends('layouts.dashboard')
    @section('content')

        <div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card" style="background: inherit;">

									<div class="card" style="background: inherit;">
										<div class="card-header" style="text-align: center;">
											<div class="card-title">Edit Withdrawal Method</div>
										</div>

										<form action="{{ route('withdrawalmethod.update', $method->id) }}" method="post">
                                            @method('PUT')
                                        @csrf
											<div class="card-body">
												<div class="form-group">
													<label for="squareInput">Name</label>
													<input type="text" name="name" class="form-control input-square" placeholder="Name" value="{{ $method->name }}">
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
