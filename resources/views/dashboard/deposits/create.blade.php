@extends('layouts.dashboard')
    @section('content')
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
									<div class="card">
										<div class="card-header">
											<div class="card-title">Make a deposit</div>
										</div>
										<div class="card-body">
                                        <form action="{{ route('deposit.store') }}" method="post">
                                        @csrf
                                            <div class="form-group">
												<label for="squareSelect">Plan</label>
												<select name="plan_id" class="form-control input-square" id="squareSelect" required>
													<option>Choose Plan</option>
                                                    @forelse ($plans as $plan)
                                                        <option value="{{ $plan->id }}">{{ $plan->name }} : ${{ $plan->min }} - ${{ $plan->max }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $plan->description }} </option>
                                                    @empty
                                                        <option value="">no plans found</option>
                                                    @endforelse
												</select>
											</div>
											<div class="form-group">
												<label for="squareSelect">Payment method</label>
												<select class="form-control input-square" name="payment_method_id" id="squareSelect" required>
													<option>Choose Payment Method</option>
													@forelse ($methods as $method)
                                                    <option value="{{ $method->id }}">{{ $method->name }} - {{ $method->symbol }} </option>
                                                    @empty
                                                    <option value="">no payment methods found</option>
                                                    @endforelse
												</select>
											</div>

                                            <div class="form-group">
												<label for="squareSelect">Deposit From</label>
												<select class="form-control input-square" id="squareSelect" name="deposit_type" required>
                                                    <option>Choose Deposit type</option>
													<option value="fresh">Fresh Deposit</option>
													<option value="account">Account Balance</option>
												</select>
											</div>

											<div class="form-group">
												<label for="Amount">Amount</label>
												<input type="text" class="form-control input-square" name="amount" placeholder="Amount" required>
											</div>
										</div>
										<div class="card-action">
											<button class="btn btn-success">Deposit</button>
											<!-- <button class="btn btn-danger">Cancel</button> -->
										</div>
                                        </form>
									</div>

								</div>
                            <div class="col-md-2"></div>
    </div>
    @endsection
