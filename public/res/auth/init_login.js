function gotologin() {
	var post={'username':$("#username").val(),'password':$("#password").val()}
	$.post("login/Authenticating",post,function(data) {
		var obj = JSON.parse(data);
		if(obj.ok){
			window.location.href = 'mainFM';
		}
		else{
			alert('Username or password is incorrect');
		}
	});
}
