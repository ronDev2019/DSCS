function logout(){

	let logout = $('#loggout').val();

	$.ajax({
		url: 'functions/log-out.php',
		method: 'POST',
		cache: false,
		data:{logout:logout},
		success: function(data){
			location.href="";
		}

	});

}