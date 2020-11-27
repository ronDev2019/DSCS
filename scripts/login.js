function login(){

	let user_name = $('#user_name').val();
	let pass_word = $('#pass_word').val();
	let log_in = $('#log_in').val();

	if(user_name == "" || pass_word == ""){

		$('#err').html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-warning"></i> Please input all needed data. </div>').slideDown(function(){

			setTimeout(function(){
				$('#err').slideUp();
			},1500);
		});

	} else {

		$.ajax({
			url: 'functions/log-in.php',
			method: 'POST',
			cache: 'false',
			dataType: 'json',
			data:{user:user_name, pass:pass_word, login:log_in},
			success:function(rem){

				if(rem == "true"){

					$('#err').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-spin fa-spinner"></i> Welcome <i class="icon fa fa-user"></i>'+user_name+' </div>').slideDown(function(){

						setTimeout(function(){
							$('#err').slideUp(function(){
								location.href="";
							});
						},2000);
					});

				} else {

					$('#err').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-ban"></i> Wrong Username or Password. </div>').slideDown(function(){

						setTimeout(function(){
							$('#err').slideUp();
						},1500);
					});

				}

			},
			error: function(err, xhr){

				console.log(err);

			}
		});

	}

}


