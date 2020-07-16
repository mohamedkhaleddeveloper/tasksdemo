@include('inc.head')
@include('inc.header')


<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-body">
			<!-- Staff table -->
			 @if(Permission::check('view','users') == True)
			<section id="staff-table">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">{{__('Staff Mangement')}}</h4>
								<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										@if(Permission::check('add','users') == True)
											<a class="btn btn-blue btn-lg addstaff-btn @if(auth::user()->lang == 'ar') pull-left @else pull-right @endif" ><i class="icon-plus"></i></a>
										@endif
									</ul>
								</div>
							</div>
							<div class="card-content collapse show  table-responsive">
								<div class="card-body card-dashboard">
									<table class="table table-striped table-bordered zero-configuration" id="stufftable">
										<thead>
											<tr>
												
												<th>{{__('Name')}}</th>
												<th>{{__('Email')}}</th>
													@if(Permission::check('prev','users') == True)
													<th>{{__('permission')}}</th>
												@endif
												@if(Permission::check('edite','users') == True)
													<th>{{__('Update')}}</th>
												@endif
												@if(Permission::check('delet','users') == True)
													<th>{{__('Delete')}}</th>
												@endif
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>{{__('Name')}}</th>
												<th>{{__('Email')}}</th>
													@if(Permission::check('prev','users') == True)
													<th>{{__('permission')}}</th>
												@endif
												@if(Permission::check('edite','users') == True)
													<th>{{__('Update')}}</th>
												@endif
												@if(Permission::check('delet','users') == True)
													<th>{{__('Delete')}}</th>
												@endif
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- / Staff table -->
			@if(Permission::check('add','users') == True OR Permission::check('edite','users') == True)
			<!-- Staff Form -->
			<section  id="staff-form-add" style="display : none;">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">{{__('Staff Mangement')}}</h4>
								<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<a class="btn btn-outline-danger btn-lg close-staff-form @if(auth::user()->lang == 'ar') pull-left @else pull-right @endif "><i class="icon-close"></i></a>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
																<div class="col-md-12">
										<div class="card" >

											<div class="card-content collapse show">
												<div class="card-body">
													<div id="error_msg"></div>
													<form class="form" id="staff-response-add" enctype="multipart/form-data">
														{{ csrf_field() }}
														<div class="form-body">
															
															<span class="avatar avatar-online lg @if(auth::user()->lang == 'ar') pull-left @else pull-right @endif ">
															</span>
															<h4 class="form-section"><i class="icon-user"></i> {{__('Add Member')}}</h4>
															<div class="row">
																<div class="col-md-4">
																	<div class="form-group">
																		<label for="userinput1" class="required">{{__('Arabic Name')}}</label>
																		<input type="text" class="form-control border-primary" placeholder="Arabic Name" name="name_ar">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group" class="required">
																		<label for="userinput2">{{__('English Name')}}</label>
																		<input type="text" class="form-control border-primary" placeholder="English Name" name="name" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label for="" class="required"> {{__('Email (optional)')}} </label>
																		<input type="text" class="form-control border-primary" placeholder=" Email (optional)" name="email" >
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="userinput122" class="required">Password</label>
																		<input type="password" class="form-control border-primary" placeholder="Password" name="password">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="userinput2" class="required">confirm Password</label>
																		<input type="password" id="userinput2" class="form-control border-primary" placeholder="Confirm Password" name="password_confirmation">
																	</div>
																</div>
															</div>
														</div>
                                                          
													</div>

														<div class="form-actions right">
															<button type="button" class="btn btn-warning mr-1 close-staff-form">
																<i class="ft-x"></i> {{__('Cancel')}}
															</button>
															<button type="submit" class="btn btn-blue">
																<i class="fa fa-check-square-o" id="save"></i> {{__('Save')}}
															</button>
														</div>
													</form>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- / Staff Form -->
			@endif
			
			@if(Permission::check('prev','users') == True)
			<section  id="staff-form-permissionstaff" style="display : none;">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">{{__('Staff Mangement')}}</h4>
								<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<a class="btn btn-outline-danger btn-lg close-staff-form"><i class="icon-close"></i></a>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
									<div class="col-md-12">
										<div class="card">

											<div class="card-content collapse show">
												<div class="card-body"><div id="error_msg_permission"></div>
												<form class="form" id="stuff-response-roles" method="POST" >
													{{ csrf_field() }}
														<div class="form-body">
															<h1 class="border-bottom pb-1">{{__('permission')}}</h1>
																<div class="row">

																	<!-- start card permission -->
																	@foreach ($roles as $role)
																		<div class="card-content">
																		<div class="card-body">

																			@if(auth::user()->lang == 'ar') <h2>{{$role[0]->category_ar}}</h2> @else <h2>{{$role[0]->category_en}}</h2> @endif

																		@foreach ($role as $item)
																				<fieldset class="checkboxsas">
																				<label>
																				<input type="checkbox" value="{{$item->id}}" name="roles[]"> 	@if(auth::user()->lang == 'ar') {{$item->name_ar}} @else {{$item->name_en}} @endif
																				</label>
																			</fieldset>
																				@endforeach


																			<hr/>
																		</div>
																	</div>
																	@endforeach
																	<!-- end card permission -->


																	<!-- end card permission -->

																</div>


														</div>

														<div class="form-actions right">
															<button type="button" class="btn btn-warning mr-1 close-staff-form">
																<i class="ft-x"></i> {{__('Cancel')}}
															</button>
															<button type="submit" class="btn btn-blue">
																<i class="fa fa-check-square-o"></i> {{__('Save')}}
															</button>
														</div>
													</form>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			@endif
			<!--------------->

			@if(Permission::check('delet','users') == True)
			<!-- Staff Form  Delete -->
			<section  id="staff-form-delete" style="display : none;">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">{{__('Staff Mangement')}}</h4>
								<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<a class="btn btn-outline-danger btn-lg close-staff-form"><i class="icon-close"></i></a>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
									<div class="col-md-12">
										<div class="card">

											<div class="card-content collapse show">
												<div class="card-body">
													<div id="error_msg_delete"></div>
													<form class="form" id="staff-response-delete">
														{{ csrf_field() }}
														<div class="form-body">
															<h4 class="form-section"><i class="icon-user"></i> {{__('Delete User')}}</h4>
																<h5>{{__('Are you Sure')}}</h5>
														</div>

														<div class="form-actions right">
															<button type="button" class="btn btn-warning mr-1 close-staff-form">
																<i class="ft-x"></i> {{__('Cancel')}}
															</button>
															<button type="submit" class="btn btn-danger">
																<i class="fa fa-check-square-o" id="delete"></i> {{__('Delete')}}
															</button>
														</div>
													</form>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- / Staff Form  Delete-->
	@endif		
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endif
@include('inc.footer')
