var post;
function create_db() {
$("#button1").hide();
	 post = {
		'db_name' : $("#db_name").val(),
		'db_username' : $("#db_username").val(),
		'db_password' : $("#db_password").val()
	}
		$.post("install/createDB", post, function(data) {
			var response = jQuery.parseJSON(data);
			
			if(response.ok){
					$("#messagealtersuccess").show();
					$("#messagealtersuccess").text(response.message+"\n please wait for continue...");
					$("#messagealterdanger").hide();

					$( "#panel" ).slideUp( 500 );
					
					setTimeout(function(){
						$("#mycontent").empty()
						$( "#mycontent" ).load( "install/create_user", function() {
							$("#messagealtersuccess").hide();
							$( "#panel" ).slideDown( "slow" );
							});
					},2000); 
					
				}
				else{
					$("#button1").show();
					$("#messagealtersuccess").hide();
					$("#messagealterdanger").show();
					$("#messagealterdanger").text(response.message);
				}
		}).done(function(s) {
			
		}).fail(function(e) {
			var obj = JSON.parse(e.responseText);
			$("#button1").show();
			$("#messagealterdanger").show();
			$("#messagealterdanger").text(obj.text);
		});
}
function create_user() {
	
	post['admin_username']=	$("#username").val();
	post['admin_password1']=$("#password1").val();
	post['admin_password2']=$("#password2").val();
	
	if (post['admin_password1'].length<6) {
		$("#messagealtersuccess").hide();
		$("#messagealterdanger").show();
		$("#messagealterdanger").text('Password must contain at least 6 characters');
		return;
	}
	
	if(post['admin_password2'] !=post['admin_password1']){
		$("#messagealtersuccess").hide();
		$("#messagealterdanger").show();
		$("#messagealterdanger").text('password must be the same with its repeat');
		return;
	}
	$("#messagealtersuccess").hide();
	$("#messagealterdanger").hide();
	$("#button2").hide();
	
	$.post("install/create_admin_user", post, function(data) {
			var response = jQuery.parseJSON(data);	
			if(response.ok){
					$("#messagealtersuccess").show();
					$("#messagealtersuccess").text(response.message+"\n please wait for continue...");
					$("#messagealterdanger").hide();

					
					$( "#panel" ).slideUp( 500 );
					setTimeout(function(){
						window.location.href = 'login';

						
					},1000); 
					
				}
				else{
					$("#button2").show();
					$("#messagealtersuccess").hide();
					$("#messagealterdanger").show();
					$("#messagealterdanger").text(response.message);
				}
		}).done(function(s) {
			
		}).fail(function(e) {
			var obj = JSON.parse(e.responseText);
			$("#button2").show();
			$("#messagealterdanger").show();
			$("#messagealterdanger").text(obj.text);
		});
}