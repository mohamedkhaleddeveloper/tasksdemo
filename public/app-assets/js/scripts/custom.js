$( document ).ready(function() {
	var url = $(location).attr('href');
	var parts = url.split("/");
	var last_part = parts[parts.length-1];
	var last_part1 = parts[parts.length-2];
	
	if(last_part == 'stuffs'){
		getstuff('stuffs/getstuffs');
	}
	if(last_part == 'tickets'){
		getitems('tickets/getitems');
	}
	
	
	
	// Login Stuff
	$('#userlogin').submit(function(event) {
		event.preventDefault();
		event.stopImmediatePropagation();
		var career_submit = document.getElementById("save");
		//career_submit.disabled = true;
		console.log('login');
		var formData = new FormData(this);
		$.ajax({
				type: 'POST',
				url: 'loginp',
				dataType: 'json',
				data: formData,
				beforeSend: function() {
					console.log("before");
					$("#loading").show();
				},
				success: function (response) {
						console.log("afte222r");
						if(response.errors) {
							console.log(response.errors);
							var error_msg = document.getElementById("error_msg");
							$('#error_msg').removeClass("alert alert-success");
							$('#error_msg').addClass( "alert alert-danger hideit" );
							error_msg.innerHTML= response.errors;
									$("#loading").hide();
									$("#error_msg").fadeIn(2000);
						}

						if(response.message) {
							console.log(response.message);
							var error_msg = document.getElementById("error_msg");
							$('#error_msg').removeClass("alert alert-danger hideit");
							$('#error_msg').addClass( "alert alert-success hideit" );
							error_msg.innerHTML= response.message;
							$("#loading").hide();
							window.location.replace("home");
						}
				},
				cache: false,
				contentType: false,
				processData: false
		});
		
	});
	// /Login Stuff
		//$("#customers-table").fadeOut();
		//$("#customer-form-delete").fadeIn();
		
	
	


	
	//  staff ajax

	function getstuff(url) {
			
		$.get( url, function( data ) {
			// $( ".result" ).html( data );
			// alert( "Load was performed." );
			tabledata = $('#stufftable').DataTable();
			tabledata.rows().remove().draw();
            //console.log(data);
			var lang = $('#lang').attr('data-lang');
			//console.log(lang);
			$.each(data, function(key, value){
                //console.log(value.id);
                if(lang == 'ar'){
                    var name = value.name_ar
                }else{
                    var name =value.name
                }
			
				var row  = [name,  value.email];
							
				if(view_permission ==1)
				{
					var permission = '<a class="btn btn-grey btn-sm permissionstaff" data-id="'+value.id+'"><i class="icon-shield"></i></a>';
					row.push(permission);
				}
				
							
				if(edit_users  == 1)
				{
					var edite = '<a class="btn btn-warning btn-sm editestaff-btn" data-id="'+value.id+'"><i class="icon-pencil"></i></a>';
					row.push(edite);
				}
							
				if(delete_users == 1)
				{
					var delet = '<a class="btn btn-danger btn-sm delete-staff-btn" data-id="'+value.id+'"><i class="icon-trash"></i></a>';
					row.push(delet);
				}		
				
				tabledata.row.add(row).draw();
			})
		});
	  } 
	
	/*  open Model Staff Form  Addtion*/	
	$( ".addstaff-btn" ).click(function () {
		$("#staff-table").fadeOut();
		$("#staff-form-delete").fadeOut();
		$("#staff-form-cahngepassword").fadeOut();
		$('#staff-response-add').attr('data-action', 'addtion');
		$("#staff-response-add")[0].reset();
		$("#staff-form-add").fadeIn();
		getcountry();
	});
	/*  / open Model Staff Form  Addtion*/
	
		// ADD & Edite Stuff -> Operation 
		$('#staff-response-add').submit(function(event) {
			event.preventDefault();
			event.stopImmediatePropagation();
			var career_submit = document.getElementById("save");
			career_submit.disabled = true;
			var action = $(this).attr('data-action');
			var idupdate = $(this).attr('data-id');
			var url;
			// console.log(action);
			if(action == 'addtion')
			{
				url = 'stuffs/store';
			}else{
				url = 'stuffs/update/'+idupdate;
			}
			
			console.log(url);
			// exit;
			var urlhome = $(this).attr('date-home');
			var formData = new FormData(this);
			// console.log(formData);
			$.ajax({
					type: 'POST',
					url: url,
					dataType: 'json',
					data: formData,
					beforeSend: function() {
						console.log("before");
						$("#loading").show();
					},
					success: function (response) {
							console.log("after");
							if(response.errors) {
								//console.log(response.errors);
								var error_msg = document.getElementById("error_msg");
								$('#error_msg').removeClass("alert alert-success");
								$('#error_msg').addClass( "alert alert-danger hideit" );
								error_msg.innerHTML= response.errors;
										$("#loading").hide();
										$("#error_msg").fadeIn(2000);
							}
	
							if(response.message) {
								console.log(response.message);
								var error_msg = document.getElementById("error_msg");
								$('#error_msg').removeClass("alert alert-danger hideit");
								$('#error_msg').addClass( "alert alert-success hideit" );
								error_msg.innerHTML= response.message;
								$("#loading").hide();
								$("#staff-response-add").fadeOut(100);
								$("#error_msg").fadeIn(2000,function(){		
									$("#staff-form-add").fadeOut();
									$("#staff-response-add").fadeIn();
									$("#staff-table").fadeIn();
									$("#error_msg").fadeOut();
									getstuff('stuffs/getstuffs');
								});	
								$("#staff-response-add")[0].reset();
							}
					},
					cache: false,
					contentType: false,
					processData: false
			});
		});
		// /ADD & Edite Stuff
	
	/*  open Model Staff Form  edite*/	
	$(document).on('click', '.editestaff-btn', function(e) {
		$("#staff-table").fadeOut();
		$("#staff-form-add").fadeIn();
		$("#staff-form-delete").fadeOut();
		$("#staff-form-cahngepassword").fadeOut();
		$("#staff-form-add").fadeIn();
		$('#staff-response-add').attr('data-action', 'update');
		$("#error_msg").fadeOut();
		$("#staff-form-add").fadeIn();
		var id = $(this).attr('data-id');
		$('#staff-response-add').attr('data-id', id);
		$.get( "stuffs/show/"+id , function( data ) {	
			$.each(data.stuff, function(key, value){
				if(key != 'password'){
					$('[name='+ key +']').val(value);	
				}
					
			})
		});
	});
	/* / open Model Staff Form  edite*/	

	/*  open Model Staff Form  Change Password*/
	$(document).on('click', '.permissionstaff', function(e) {
		var id = $(this).attr('data-id');	
		$("#staff-table").fadeOut();
		$("#staff-form-delete").fadeOut();
		$("#staff-form-add").fadeOut();
		$("#staff-form-cahngepassword").fadeOut();
		$("#stuff-response-roles").attr('action', 'stuffs/roles/'+id);
		$("#staff-form-permissionstaff").fadeIn();
		$.get( "stuffs/getroles/"+id , function( data ) {
			if(data.length >0)
			{
				$.each(data, function(key, value){
					$('input[value="'+value+'"]').prop("checked", true);
				})
			}
			else
			{
				$('input[type="checkbox"]').prop("checked", false);
			}
			
		});	
	
	});
	/*  /open Model Staff Form  Change Password*/	
	

	

	/*  open Model Staff Form  delete*/	
	$(document).on('click', '.delete-staff-btn', function(e) {	
		$("#staff-table").fadeOut();
		$("#staff-form-delete").fadeIn();
		var id = $(this).attr('data-id');
		$('#staff-response-delete').attr('data-id', id);
	});
	/*  / open Model Staff Form  delete*/
	

	
	// delete Stuff -> Operation 
	$('#staff-response-delete').submit(function(event) {
		event.preventDefault();
		event.stopImmediatePropagation();
		var career_submit = document.getElementById("delete");
		career_submit.disabled = true;
		var iddelete = $(this).attr('data-id');
		console.log(iddelete);
		var formData = new FormData(this);
		$.ajax({
				type: 'POST',
				url: 'stuffs/destroy/'+iddelete,
				dataType: 'json',
				data: formData,
				beforeSend: function() {
					console.log("before");
					$("#loading").show();
				},
				success: function (response) {
						console.log("after");
						if(response.errors) {
							//console.log(response.errors);
							var error_msg = document.getElementById("error_msg_delete");
							$('#error_msg_delete').removeClass("alert alert-success");
							$('#error_msg_delete').addClass( "alert alert-danger hideit" );
							error_msg.innerHTML= response.errors;
									$("#loading").hide();
									$("#error_msg_delete").fadeIn(2000);
						}

						if(response.message) {
							//console.log(response.message);
							var error_msg = document.getElementById("error_msg_delete");
							$('#error_msg_delete').removeClass("alert alert-danger hideit");
							$('#error_msg_delete').addClass( "alert alert-success hideit" );
							error_msg.innerHTML= response.message;
							$("#loading").hide();
							$("#staff-response-delete").fadeOut();
							$("#error_msg_delete").fadeIn(2000,function(){		
								$("#staff-form-delete").fadeOut();
								$("#staff-table").fadeIn();
								$("#staff-response-delete").fadeIn();
								$("#error_msg_delete").fadeOut();
								getstuff('stuffs/getstuffs');
							});	
							
						}
				},
				cache: false,
				contentType: false,
				processData: false
		});
		
	});
	// /delete Stuff
	
	
	/*  Close All model and Back Data tbale */	
	$( ".close-staff-form" ).click(function () {
		$("#staff-table").fadeIn();
		$("#staff-form-add").fadeOut();
		$("#staff-form-cahngepassword").fadeOut();
		$("#staff-form-delete").fadeOut();
		$("#staff-form-permissionstaff").fadeOut();
	});
	/*  / Close All model and Back Data tbale */	
	
	
	// / staff ajax 
	
	
	// item ajax 

	//get data include in tabel 


	$('.zero-configuration').DataTable();

	function getitems(url) {
			
		$.get( url, function( data ) {
			// $( ".result" ).html( data );
			// alert( "Load was performed." );
			//console.log(data);
			tabledata = $('#itemtable').DataTable();
			tabledata.rows().remove().draw();
			var lang = $('#lang').attr('data-lang');
			$.each(data, function(key, value){
                //console.log(value.id);
				if(lang == 'ar'){
                    var name = value['admin'].name_ar;
                }else{
                    var name = value['admin'].name;
                }
				var row  = [value.subject, value.content, name, value.deadline];
				
				if(edit_users  == 1)
				{
					var edite = '<a class="btn btn-warning btn-sm editeitem-btn" data-id="'+value.id+'"><i class="icon-pencil"></i></a>';
					row.push(edite);
				}

					var delet = '<a class="btn btn-danger btn-sm delete-item-form" data-id="'+value.id+'"><i class="icon-trash"></i></a>';
					row.push(delet);
				
				tabledata.row.add(row).draw();
			})
		});
	  } 
	
	  
	
	/*  open Model Item Form  Addtion*/	
	$( ".additem-btn" ).click(function () {
		$("#addslotmulti").fadeOut();
		$("#item-table").fadeOut();
		$("#item-form-delete").fadeOut();
		$("#item-form-cahngepassword").fadeOut();
		$("#item-form-add").fadeIn();
		$('#item-response-from').attr('data-action', 'addtion');
		$("#item-response-from")[0].reset();
		$("#item-response-from").fadeIn();
	});
	/*  / open Model Item Form  Addtion*/

	// ADD & Edite Item -> Operation 
		$('#item-response-from').submit(function(event) {
			event.preventDefault();
			event.stopImmediatePropagation();
			var career_submit = document.getElementById("save");
			career_submit.disabled = true;
			var action = $(this).attr('data-action');
			var idupdate = $(this).attr('data-id');
			var url;
			// console.log(action);
			if(action == 'addtion')
			{
				url = 'tickets/store';
			}else{
				url = 'tickets/update/'+idupdate;
			}
			console.log(url);
			var formData = new FormData(this);
					$.ajax({
							type: 'POST',
							url: url,
							dataType: 'json',
							data: formData,
							beforeSend: function() {
								//console.log("before");
								$("#loading").show();
							},
							success: function (response) {
									//console.log("after");
									if(response.errors) {
										//console.log(response.errors);
										var error_msg = document.getElementById("error_msg");
										$('#error_msg').removeClass("alert alert-success");
										$('#error_msg').addClass( "alert alert-danger hideit" );
										error_msg.innerHTML= response.errors;
												$("#loading").hide();
												$("#error_msg").fadeIn(2000);
									}
	
									if(response.message) {
										//console.log(response.message);
										var error_msg = document.getElementById("error_msg");
										$('#error_msg').removeClass("alert alert-danger hideit");
										$('#error_msg').addClass( "alert alert-success hideit" );
										error_msg.innerHTML= response.message;
										$("#loading").hide();
										$("#item-response-from").fadeOut(100);
										$("#error_msg").fadeIn(2000,function(){
										getitems('tickets/getitems');
										$("#item-form-add").fadeOut();
										$("#item-table").fadeIn();
										$("#error_msg").fadeOut();
										$("#item-response-from").fadeIn();
										});	
									}
							},
							cache: false,
							contentType: false,
							processData: false
					});
			
			});
	// /ADD & Edite Item
	
	/*  Close All model and Back Data tbale */	
	$( ".close-item-form" ).click(function () {
		$("#item-table").fadeIn();
		$("#item-form-add").fadeOut();
		$("#item-form-delete").fadeOut();
	});
	/*  / Close All model and Back Data tbale */	
	
	/*  open Model Item Form  edite*/	
	$(document).on('click', '.editeitem-btn', function(e) {
		//console.log('help');
		$("#item-table").fadeOut();
		$(".filter-gym").fadeOut();
		$(".filter-beauty").fadeOut();
		$(".filter-spa").fadeOut();
		$("#item-form-add").fadeIn();
		$('#item-response-from').attr('data-action', 'update');
		var id = $(this).attr('data-id');
		$('#item-response-from').attr('data-id', id);
		$.get( "tickets/show/"+id , function( data ) {
			
			

			//console.log(data.item);
				$.each(data, function(key, value){
						$('[name='+ key +']').val(value);
				})
			
		  });
	  });
	/* / open Model Item Form  edite*/
	
	/*  open Model Item Form  delete*/	
	$(document).on('click', '.delete-item-form', function(e) {
		$("#item-table").fadeOut();
		$("#item-form-delete").fadeIn();
		var id = $(this).attr('data-id');
		$('#item-response-delete').attr('data-id', id);
	});
	/*  / open Model Item Form  delete*/


	
	// Delete Item -> Operation 
	$('#item-response-delete').submit(function(event) {
		event.preventDefault();
		event.stopImmediatePropagation();
		var career_submit = document.getElementById("delete");
		career_submit.disabled = true;
		var iddelete = $(this).attr('data-id');
		console.log(iddelete);
		var formData = new FormData(this);
		$.ajax({
				type: 'POST',
				url: 'tickets/destroy/'+iddelete,
				dataType: 'json',
				data: formData,
				beforeSend: function() {
					console.log("before");
					$("#loading").show();
				},
				success: function (response) {
						console.log("after");
						if(response.errors) {
							//console.log(response.errors);
							var error_msg = document.getElementById("error_msg_delete");
							$('#error_msg_delete').removeClass("alert alert-success");
							$('#error_msg_delete').addClass( "alert alert-danger hideit" );
							error_msg.innerHTML= response.errors;
									$("#loading").hide();
									$("#error_msg_delete").fadeIn(2000);
						}

						if(response.message) {
							//console.log(response.message);
							var error_msg = document.getElementById("error_msg_delete");
							$('#error_msg_delete').removeClass("alert alert-danger hideit");
							$('#error_msg_delete').addClass( "alert alert-success hideit" );
							error_msg.innerHTML= response.message;
							$("#loading").hide();
							$("#item-response-delete").fadeOut();
							$("#error_msg_delete").fadeIn(2000,function(){		
								$("#item-form-delete").fadeOut();
								$("#item-table").fadeIn();
								$("#item-response-delete").fadeIn();
								$("#item").fadeOut();
								getitems('tickets/getitems');
							});	
							
						}
				},
				cache: false,
				contentType: false,
				processData: false
		});
		
	});
	// /Delete Item
	
	// / item ajax 

	/*  open Model Staff Form  Change Password*/
	$(document).on('click', '.permissionstaff', function(e) {
		var id = $(this).attr('data-id');	
		$("#staff-table").fadeOut();
		$("#staff-form-delete").fadeOut();
		$("#staff-form-add").fadeOut();
		$("#staff-form-cahngepassword").fadeOut();
		$("#stuff-response-roles").attr('action', 'stuffs/roles/'+id);
		$("#staff-form-permissionstaff").fadeIn();
		$.get( "users/getroles/"+id , function( data ) {
			if(data.length >0)
			{
				$.each(data, function(key, value){
					$('input[value="'+value+'"]').prop("checked", true);
				})
			}
			else
			{
				$('input[type="checkbox"]').prop("checked", false);
			}
			
		});	
	
	});
	/*  /open Model Staff Form  Change Password*/	
	
// ADD & Edite permission -> Operation 
$('#stuff-response-roles').submit(function(event) {
	event.preventDefault();
	event.stopImmediatePropagation();
	var career_submit = document.getElementById("save");
	career_submit.disabled = true;
	var action = $(this).attr('action');
	var idupdate = $(this).attr('data-id');
	var url;
	// console.log(action);
	var formData = new FormData(this);
			$.ajax({
					type: 'POST',
					url: action,
					dataType: 'json',
					data: formData,
					beforeSend: function() {
						//console.log("before");
						$("#loading").show();
					},
					success: function (response) {
							//console.log("after");
							if(response.errors) {
								//console.log(response.errors);
								var error_msg = document.getElementById("error_msg_permission");
								$('#error_msg_permission').removeClass("alert alert-success");
								$('#error_msg_permission').addClass( "alert alert-danger hideit" );
								error_msg.innerHTML= response.errors;
										$("#loading").hide();
										$("#error_msg_permission").fadeIn(2000);
							}

							if(response.message) {
								//console.log(response.message);
								var error_msg = document.getElementById("error_msg_permission");
								$('#error_msg_permission').removeClass("alert alert-danger hideit");
								$('#error_msg_permission').addClass( "alert alert-success hideit" );
								error_msg.innerHTML= response.message;
								$("#loading").hide();
								$("#stuff-response-roles").fadeOut(100);
								$("#error_msg_permission").fadeIn(2000,function(){
								getitems('items/getitems');
								$("#staff-form-permissionstaff").fadeOut();
								$("#staff-table").fadeIn();
								$("#error_msg_permission").fadeOut();
								$("#stuff-response-roles").fadeIn();
								});	
							}
					},
					cache: false,
					contentType: false,
					processData: false
			});
	
	});
// /ADD & Edite Item



});