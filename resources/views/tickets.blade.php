@include('inc.head')
@include('inc.header')



<div class="app-content content">
	<div class="content-wrapper">  
		<div class="content-body">
			<!-- Item table -->
			@if(Permission::check('view','tickets') == True)
			<section id="item-table">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">{{__('Items Mangment')}}</h4>
								<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<a class="btn btn-blue btn-lg additem-btn @if(auth::user()->lang_id == 'ar') pull-left @else pull-right @endif" ><i class="icon-plus"></i></a>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show  table-responsive">
								<div class="card-body card-dashboard">
									<table class="table table-striped table-bordered zero-configuration dataTable" id="itemtable">
										<thead>
											<tr>
												<th>{{__('Title')}}</th>
												<th>{{__('Content')}}</th>
												<th>{{__('Admin Name')}}</th>
												<th>{{__('Deadline')}}</th>
												<th>{{__('status')}}</th>
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
												<th>{{__('Title')}}</th>
												<th>{{__('Content')}}</th>
												<th>{{__('Admin Name')}}</th>
												<th>{{__('Deadline')}}</th>
												<th>{{__('status')}}</th>
												@if(Permission::check('edite','users') == True)
													<th>{{__('Update')}}</th>
												@endif
												@if(Permission::check('delet','users') == True)
													<th>{{__('Delete')}}</th>
												@endif
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- / Item table -->
			@endif
			@if(Permission::check('add','tickets') == True Or Permission::check('edite','users'))
			<!-- Item Form -->
			<section  id="item-form-add" class="hideit">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">{{__('Tickets Mangment')}}</h4>
								<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<a class="btn btn-outline-danger btn-lg close-item-form @if(auth::user()->lang == 'ar') pull-left @else pull-right @endif"><i class="icon-close"></i></a>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
																<div class="col-md-12">
										<div class="card" >
											
											<div class="card-content collapse show">
												<div class="card-body">
													<div id="loading" class="hideit">
														<div class="d-flex justify-content-center">
															<div class="spinner-border" role="status">
																<div class="loader"></div>
															</div>
														</div>
													</div>
													<div id="error_msg"></div>
                                                    <form  class="form-item" id="item-response-from" enctype="multipart/form-data">
                                                    {{csrf_field()}} 
														<div class="form-body">
											
															
															<h4 class="form-section"><i class="icon-user"></i> {{__('Add Ticket')}}</h4>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<label class="required">{{__('Title')}}</label>
																		<input type="text" class="form-control border-primary" placeholder="{{__('Title')}}" name="subject">
																	</div>
																</div>
																
																
																<div class="col-md-12">
																	<div class="form-group">
																		<label for="userinput2" class="required">{{__('Content')}}</label>
																		<textarea name="content" class="form-control"  rows="3" placeholder="{{__('Content')}}"></textarea>
																	</div>
																</div>
																
																<div class="col-md-12">
																	<div class="form-group">
																		<label class="required">{{__('Deadline')}}</label>
																		<input type="date" class="form-control border-primary" placeholder="{{__('Deadline')}}" name="deadline">
																	</div>
																</div>
																<div class="col-md-12">
																	<div class="form-group">
																		<label class="required">{{__('Users')}}</label>
																		<select id="user_id" name="user_id" class="form-control " data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status" data-original-title="" title="">
																			<option value="">{{ __('Users') }}</option>
																			@foreach($users as $key => $value)
																				<option value="{{ $value->id }}">@if(auth::user()->lang == 'ar') {{$value->name_ar}} @else {{$value->name}} @endif</option>
																			@endforeach
																		</select>
																	</div>
																</div>
															</div>
															
															
															
															</div>


															
			
															
															
															

														<div class="form-actions right">
															<button type="button" class="btn btn-warning mr-1 close-item-form">
																<i class="ft-x"></i>{{__('Cancel')}} 
															</button>
															<button type="submit" class="btn btn-blue">
																<i class="fa fa-check-square-o" id="save"></i>{{__('Save')}} 
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
			<!-- / Item Form -->
			@endif
			<!-- Item Form  Delete -->
			@if(Permission::check('delet','users') == True)
			<section  id="item-form-delete"  class="hideit">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"></h4>
								<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<a class="btn btn-outline-danger btn-lg close-item-form  @if(auth::user()->lang_id == 'ar') pull-left @else pull-right @endif"><i class="icon-close"></i></a>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
									<div class="col-md-12">
										<div class="card">
											
											<div class="card-content collapse show">
												<div class="card-body">
													<div id="loading" class="hideit">
														<div class="d-flex justify-content-center">
															<div class="spinner-border" role="status">
																<div class="loader"></div>
															</div>
														</div>
													</div>
													<div id="error_msg_delete"></div>
													<form class="form" id="item-response-delete">
														{{ csrf_field() }}
														<div class="form-body">
															<h4 class="form-section"><i class="icon-user"></i> {{__('Delete Item')}}</h4><h5>{{__('Are you Sure')}}</h5></div>
														<div class="form-actions right">
															<button type="button" class="btn btn-warning mr-1 close-item-form">
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
			@endif
			<!-- / Item Form  Delete-->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- ////////////////////////////////////////////////////////////////////////////-->


@include('inc.footer')
