@extends('layouts.dashboard')
    @section('content')

        <div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card" style="background: inherit;">

									<div class="card" style="background: inherit;">
										<div class="card-header" style="text-align: center;">
											<div class="card-title">Fund Account</div>
										</div>

										<form action="{{ route('account.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user_id }}">
											<div class="card-body">
												<div class="form-group">
													<label for="squareInput">Amount</label>
													<input type="text" name="amount" class="form-control input-square" placeholder="Amount">
												</div>


												<div class="card-action" style="text-align: center;">
													<button class="btn btn-primary">Fund</button>
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
