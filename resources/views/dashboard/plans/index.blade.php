@extends('layouts.dashboard')
@section('content')

@php
$sn = 1;
@endphp
    <div class="col-md-12">
								<div class="card card-tasks">
									<div class="card-header ">
										<h4 class="card-title">All plans</h4>
										<a href="{{ route('plans.create') }}" class="btn btn-primary btn-sm"><span class="la la-plus"></span>Add</a>
									</div>
									<div class="card-body ">
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th>#</th>
														<th>Name</th>
														<th>Description</th>
                                                        <th>Percentage</th>
                                                        <th>Duration</th>
                                                        <th>Minimum</th>
                                                        <th>Maximum</th>
                                                        <th>Action</th>
													</tr>
												</thead>

												<tbody>
													@forelse ($plans as $plan)
                                                        <tr>
                                                            <td>{{ $sn++ }}</td>
                                                            <td>{{ $plan->name }}</td>
                                                            <td>{{ $plan->description }}</td>
                                                            <td>{{ $plan->percentage }}%</td>
                                                            <td>{{ $plan->duration }} days</td>
                                                            <td>${{ $plan->min }}</td>
                                                            <td>${{ $plan->max }}</td>
                                                            <td>
                                                                <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                                <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); $('#destroy-plan-{{ $plan->id }}').submit();"><i class="fa fa-trash"></i></button>
                                                                <form action="{{ route('plans.destroy', $plan->id) }}" method="post" id="destroy-plan-{{ $plan->id }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="100%">No plans found</td>
                                                        </tr>
                                                    @endforelse
												</tbody>

											</table>
										</div>
									</div>
									<div class="card-footer ">
										<div class="stats">

										</div>
									</div>
								</div>
							</div>
    @endsection
