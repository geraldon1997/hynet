@extends('layouts.dashboard')
    @section('content')

        <div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card" style="background: inherit;">

									<div class="card" style="background: inherit;">
										<div class="card-header" style="text-align: center;">
											<div class="card-title">Add Payment Method</div>
										</div>

										<form action="{{ route('paymentmethod.store') }}" method="post">
                                        @csrf
											<div class="card-body">
												<div class="form-group">
													<label for="squareInput">Name</label>
													<input type="text" name="name" class="form-control input-square" placeholder="Name">
												</div>
												<div class="form-group">
													<label for="squareInput">Symbol</label>
													<input type="text" class="form-control input-square" name="symbol" placeholder="Symbol">
												</div>
                                                <div class="form-group">
													<label for="squareInput">Address</label>
													<input type="text" class="form-control input-square" name="address" placeholder="Address">
												</div>

												<div class="card-action" style="text-align: center;">
													<button class="btn btn-primary">Add</button>
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
