
@extends('layouts.dashboard')
    @section('content')

        <div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card">
									<div class="card" style="background: inherit;">
										<div class="card-header" style="text-align: center;">
											<div class="card-title">Edit Plan</div>
										</div>

										<form action="{{ route('plans.update', $plan->id) }}" method="post">
                                        @method('PUT')
                                        @csrf
											<div class="card-body">
												<div class="form-group">
													<label for="squareInput">Plan</label>
													<input type="text" name="name" class="form-control input-square" placeholder="Name of plan" value="{{ $plan->name }}">
												</div>
												<div class="form-group">
													<label for="squareInput">Description</label>
													<input type="text" class="form-control input-square" name="description" placeholder="Description" value="{{ $plan->description }}">
												</div>
                                                <div class="form-group">
													<label for="squareInput">Percentage</label>
													<input type="text" class="form-control input-square" name="percentage" placeholder="Percentage" value="{{ $plan->percentage }}">
												</div>
                                                <div class="form-group">
													<label for="squareInput">Duration</label>
													<input type="number" class="form-control input-square" name="duration" placeholder="Duration in days" value="{{ $plan->duration }}">
												</div>
                                                <div class="form-group">
													<label for="squareInput">Minimum</label>
													<input type="number" class="form-control input-square" name="min" placeholder="Minimum" value="{{ $plan->min }}">
												</div>
                                                <div class="form-group">
													<label for="squareInput">Maximum</label>
													<input type="number" class="form-control input-square" name="max" placeholder="Maximum" value="{{ $plan->max }}">
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

