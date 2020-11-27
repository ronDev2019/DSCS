function group(){

	$('.dynamic_sec_grm').load('Views/grm-group.php',function(){

		$('.l-drange').hide();

		$('.head-tit').text("Group Members");

	});

}

function member_prospect(AgentId){

	var click = "clicked";

	$.ajax({
		url:'functions/grm.agent.details.php',
		method: 'POST',
		cache: false,
		dataType:'json',
		data:{member_id:AgentId},
		success: function(data){

			$('.agent_name').text(data.fullname);
			$('.p-count').text(data.count);
			$('#agentKey').val(AgentId);
			//console.log(data);

		},
		error: function(err){

			alert(err);

		}
	});

	$.ajax({
		url:'Views/ProspectResults/ProspectTable.php',
		method:'POST',
		data:{reset:click, AgentId:AgentId},
		success:function(data){
			$('#resu').html(data);
		}
	});

}

function filter(){

	var AgentId = $('#agentKey').val();

	var dateFrom = $('#dateFrom').val();
	var dateTo = $('#dateTo').val();

	var click = "cliked";

	//console.log(dateFrom+' - '+dateTo);

	$.ajax({
		url:'Views/ProspectResults/ProspectTable.php',
		method:'POST',
		data:{filter:click, AgentId:AgentId, dateFrom:dateFrom, dateTo:dateTo},
		success:function(data){
			$('#resu').html(data);
		}
	});

}

function resetFilter(){

	var AgentId = $('#agentKey').val();

	var click = "cliked";

	$.ajax({
		url:'Views/ProspectResults/ProspectTable.php',
		method:'POST',
		data:{reset:click, AgentId:AgentId},
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


//Personal Prospect Table
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