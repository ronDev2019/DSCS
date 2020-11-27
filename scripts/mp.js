function P_filter(){

	var AgentId = $('#agentKey').val();

	var dateFrom = $('#dateFrom').val();
	var dateTo = $('#dateTo').val();

	var click = "cliked";

	//console.log(dateFrom+' - '+dateTo);

	$.ajax({
		url:'Views/ProspectResults/PersonalProspectTable.php',
		method:'POST',
		data:{filter:click, dateFrom:dateFrom, dateTo:dateTo},
		success:function(data){
			$('#resu').html(data);
		}
	});

}

function P_resetFilter(){

	var click = "cliked";

	$.ajax({
		url:'Views/ProspectResults/PersonalProspectTable.php',
		method:'POST',
		data:{reset:click},
		success:function(data){
			$('#resu').html(data);
		}
	});

}

function drange(){

	//alert('nani');

	$('.l-drange').slideUp(function(){
		$('.drange').slideDown();
	});

}

function closeFilter(){

	$('.drange').slideUp(function(){
		$('.l-drange').slideDown();
	});
}

function cloz(){

	$('.drange').slideUp(function(){
		$('.l-drange').slideDown();
	});

}