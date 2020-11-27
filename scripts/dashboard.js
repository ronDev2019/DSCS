
$(".mp").load("Views/main-dash.php");
$(".grm").load("Views/grm-dash.php");


function prospect_list(){

	location.href="";
}


/** View Data Button**/
function view(id){

	alert(id);

}


/** Transfer Prospect Button**/
function transfer(id){

	//alert(id);
	$('#transfer_prospect').modal();
	$.ajax({
		url:'functions/transfer-prospect.php',
		method:'POST',
		cache:false,
		dataType:'json',
		data:{id:id},
		success:function(rem){

			if(rem.message == true){

				$('#cliName').text(rem.client);
				$('#ClientID').val(rem.client_id);

			} else {

				console.log(rem.client);

			}

		},
		error: function(err){

			console.log(err);

		}
	});	

	$('#subsubz').click(function(){

		var submit_transfer = $('#subsubz').val();

		var agentID = $('#chosenAgent').val();

		if(agentID){

			var q = confirm('Are you sure you wan\'t to transfer this client?');

			if(q == true){

				$.ajax({
					url: 'functions/submit-transfer-prospect.php',
					method: 'POST',
					cache: false,
					dataType: 'json',
					data: {id:id, agentID:agentID, submit_transfer:submit_transfer},
					success: function(rem){

						if(rem.returnz == true){

							alert("Prospect Transfered Successfully")
							location.href="";

						} else {

							console.log("Error");

						}

					},
					error: function(err){

						console.log(err);

					}
				});

			}

		} else {

			alert('Please choose agent or grm');

		}

	});

}


/** Edit Data Button**/
function edit(id){

	//alert('edit '+id);

	let update = 'update';

	$.ajax({
		url:'functions/edit-prospect.php',
		method:'POST',
		data:{id:id, update:update},
		dataType:'json',
		cache:false,
		success:function(data){

			if(data.message === true){

				$('#ProspectID').val(data.pId);
				$('#fnamez').val(data.fname);
				$('#mnamez').val(data.lname);
				$('#lnamez').val(data.lname);
				$('#contactz').val(data.cn);
				$('#brgyz').val(data.brgy);
				$('#cityz').val(data.city);
				$('#provincez').val(data.province);
				$('#modelz').val(data.model);
				$('#colorz').val(data.color);
				$('#contract_codez').append('<option selected value="'+data.c_codeId+'">'+data.c_code+'</option>');
				$('#categoryz').append('<option selected value="'+data.catId+'">'+data.cat+'</option>');
				$('#activity_codez').append('<option selected value="'+data.actId+'">'+data.act+'</option>');
				$('#remarksz').append('<option selected value="'+data.remarksId+'">'+data.remarks+'</option>');
				//$('#edit_prospect').modal().show();

			} else {

				alert('ewor ');

			}

		},
		error: function(err){

			console.log(err);

		}
	});

}

function deletez(id){

	var q = confirm("Are you sure you wan't to delete this prospect?");
	var deletez = $('#deletez').val();

	if(q == true){

		$.ajax({
			url:'functions/delete-prospect.php',
			method:'POST',
			dataType:'json',
			data:{key_id:id, deletez:deletez},
			cache: false,
			success: function(rem){

				if(rem === true){

					alert('Prospect Deleted Successfully');
					location.href="";

				} else {

					alert('Something Wen\'t Wrong');

				}

			}
		});

	}

}

function save_pros(){

	//alert("nani");

	var fname = $('#fname').val();
	var mname = $('#mname').val();
	var lname = $('#lname').val();
	var contact = $('#contact').val();
	var brgy = $('#brgy').val();
	var city = $('#city').val();
	var province = $('#province').val();
	var model = $('#model').val();
	var color = $('#color').val();

	var contract_code = $('#contract_code').val();
	var activity_code = $('#activity_code').val();
	var category = $('#category').val();
	var remarks = $('#remarks').val();

	var submit = $('#subsub').val();

	var list = [fname,mname,lname,contact,brgy,city,province,model.color,contract_code,category,remarks];

	//console.log(list);

	if(list[0,1,2,3] == ""){

		alert("Please fill out Client Details");

	} else if(list[4,5,6] == ""){

		alert("Please fill out Address Details");

	} else if(list[7,8] == ""){

		alert("Please fill out Vehicle Details");

	} else if(contract_code == null || category == null || remarks == null){

		alert("Please fill out Call Summary Details");

	} else {

		$.ajax({
			url:'functions/add-prospect.php',
			type:'POST',
			cache: false,
			dataType: 'json',
			data:{fname:fname, mname:mname, lname:lname, contact:contact, brgy:brgy, city:city, province:province, model:model, color:color, contract_code:contract_code, activity_code:activity_code, category:category, remarks:remarks, submit:submit},
			success: function(rem){

				if(rem === true){

					location.href="";

				} else {

					alert(rem);

				}

			},
			error: function(err){

				console.log(err);

			}
		});

	}


}

function update_pros(){

	//alert("nani");

	var pid = $('#ProspectID').val();
	var fname = $('#fnamez').val();
	var mname = $('#mnamez').val();
	var lname = $('#lnamez').val();
	var contact = $('#contactz').val();
	var brgy = $('#brgyz').val();
	var city = $('#cityz').val();
	var province = $('#provincez').val();
	var model = $('#modelz').val();
	var color = $('#colorz').val();

	var contract_code = $('#contract_codez').val();
	var activity_code = $('#activity_codez').val();
	var category = $('#categoryz').val();
	var remarks = $('#remarksz').val();

	var submit = $('#subsub').val();

	var list = [fname,mname,lname,contact,brgy,city,province,model.color,contract_code,category,remarks];

	//console.log(list);

	var q = confirm("Are you sure you want't to update this prospect?");

	if(q == true){

		if(list[0,1,2,3] == ""){

			alert("Please fill out Client Details");

		} else if(list[4,5,6] == ""){

			alert("Please fill out Address Details");

		} else if(list[7,8] == ""){

			alert("Please fill out Vehicle Details");

		} else if(contract_code == null || category == null || remarks == null){

			alert("Please fill out Call Summary Details");

		} else {

			$.ajax({
				url:'functions/update-prospect.php',
				type:'POST',
				cache: false,
				dataType: 'json',
				data:{pid:pid, fname:fname, mname:mname, lname:lname, contact:contact, brgy:brgy, city:city, province:province, model:model, color:color, contract_code:contract_code, activity_code:activity_code, category:category, remarks:remarks, submit:submit},
				success: function(rem){

					if(rem === true){

						alert("Propect Updated Successfully");
						location.href="";

					} else {

						alert(rem);

					}

				},
				error: function(err){

					console.log(err);

				}
			});

		}

	} else {

		alert('Ok');

	}


}



function SubmitTransfer(){

	alert("Transfer Submitted");

}

function category_select(){

	var cat = $('.ddown').val();

	$.ajax({
		url:'functions/categoryDropdown.php',
		method:'POST',
		cache: false,
		data:{agentCategory:cat},
		success: function(data){

			$('#grmSection').html(data);

		}
	});


}


//Indipendent Functions
$(function(){

	$('.closez').click(function(){

		//alert('Modal Closed');
		$('#contract_codez').val('');
		$('#categoryz').val('');
		$('#activity_codez').val('');
		$('#remarksz').val('');

	});

});