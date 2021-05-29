
@extends('layouts.dashboard')
    @section('content')

        <div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card">
									<div class="card" style="background: inherit;">
										<div class="card-header" style="text-align: center;">
											<div class="card-title">Add Plan</div>
										</div>

										<form action="{{ route('plans.store') }}" method="post">
                                        @csrf
											<div class="card-body">
												<div class="form-group">
													<label for="squareInput">Plan</label>
													<input type="text" name="name" class="form-control input-square" placeholder="Name of plan">
												</div>
												<div class="form-group">
													<label for="squareInput">Description</label>
													<input type="text" class="form-control input-square" name="description" placeholder="Description">
												</div>
                                                <div class="form-group">
													<label for="squareInput">Percentage</label>
													<input type="text" class="form-control input-square" name="percentage" placeholder="Percentage">
												</div>
                                                <div class="form-group">
													<label for="squareInput">Duration</label>
													<input type="number" class="form-control input-square" name="duration" placeholder="Duration in days">
												</div>
                                                <div class="form-group">
													<label for="squareInput">Minimum</label>
													<input type="number" class="form-control input-square" name="min" placeholder="Minimum">
												</div>
                                                <div class="form-group">
													<label for="squareInput">Maximum</label>
													<input type="number" class="form-control input-square" name="max" placeholder="Maximum">
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

