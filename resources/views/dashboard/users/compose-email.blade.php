
@extends('layouts.dashboard')
    @section('content')

        <div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card">
									<div class="card" style="background: inherit;">
										<div class="card-header" style="text-align: center;">
											<div class="card-title">Compose Email</div>
										</div>

										<form action="{{ route('user.send-email') }}" method="post">
                                        @csrf

											<div class="card-body">
												<div class="form-group">
													<label for="squareInput">Email</label>
													<input type="text" name="email" class="form-control input-square" value="{{ $email }}" readonly>
												</div>
												<div class="form-group">
													<label for="squareInput">Subject</label>
													<input type="text" class="form-control input-square" name="subject" placeholder="Subject">
												</div>
                                                <div class="form-group">
													<label for="squareInput">Message</label>
													<textarea name="message" class="form-control input-square" placeholder="Message"></textarea>
												</div>


												<div class="card-action" style="text-align: center;">
													<button class="btn btn-primary">Send</button>
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

