<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=300px, initial-scale=1">

	<title>Nitro FM</title>
	<link href="public/bootstrap-3.3.7/css/bootstrap.min.css"
	rel="stylesheet">
	<link href="public/res/main/style.css" rel="stylesheet">
</head>
<body style="color: #0b5d09;background: #2f2f2f;" >
<style media="screen">
	.colorx{
		background: cadetblue;
    color: white;
	}
	.vc-tr {
  padding-top: 6px;
 }
</style>
	<script
	src="public/res/jquery.js"></script>
	<script src="public/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script src="public/res/main/main.js"></script>
	<script src="public/lib/upload/vendor/jquery.ui.widget.js"></script>
	<script src="public/lib/upload/jquery.fileupload.js"></script>

	<div class="panel panel-default center-block" style="max-width: 500px;margin-bottom: 5px;">
	  <div class="panel-body">
	    <div class="row">
	    	<div class="col-xs-3" style="min-width:50px; ">
					<button onclick="go_to_back()" class="btn btn-default center-block colorx" >Back</button>
	    	</div>
				<div class="col-xs-6" style="min-width:150px; ">
					<input type="text" class="form-control input-md colorx" id="path_input"  placeholder="path">
	    	</div>
				<div class="col-xs-3">
					<button class="btn btn-default center-block colorx" onclick="go_to_path()">GO</button>
	    	</div>
	    </div>
	  </div>
	</div>

	<div class="panel panel-default center-block" style="max-width: 500px; margin-bottom: 5px;">
	  <div class="panel-body">
	    <div class="row">
	    	<div class="col-xs-3">
					<button onclick="$('#file1').click()" id="button_upload" class="btn btn-default"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
						Upload
					</button>
	    	</div>
				<div class="col-xs-3">
					<button class="btn btn-default" onclick="download_file()"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>Download</button>
	    	</div>
				<div class="col-xs-3">
					<button class="btn btn-default" onclick="go_to_refresh()"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Refresh</button>
	    	</div>
				<div class="col-xs-3">
					<button data-toggle="modal" data-target="#mymodal_delete_file" class="btn btn-default" style="color: red;" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Delete</button>
				</div>
	    </div>
	  </div>
	</div>


	<div class="panel panel-default center-block" style="max-width: 500px; margin-bottom: 5px;">
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-3">
					<button data-toggle="modal" data-target="#mymodal_get_dir_name" style="width: 100%;" id="button_upload" class="btn btn-default">
						New Dir</button>
				</div>
				<div class="col-xs-3">
					<button onclick="unzip_file()" style="width: 100%;" class="btn btn-default" >unzip</button>
				</div>
				<div class="col-xs-3">
					<button style="width: 100%;" class="btn btn-default" onclick="zip_file()">zip</button>
				</div>
				<div class="col-xs-3">
					<button style="width: 100%;" class="btn btn-default" onclick="reasetpath()">Reset Path</button>
				</div>
			</div>
		</div>
	</div>

	<div id="list_content" class="center-block" style="max-width:500px; ">

	</div>


	<!-- progress Modal -->
	<div class="modal fade" id="mymodal_progress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Uploading ... </h4>
	      </div>
				<div class="modal-body">
					<div class="progress">
						<div id="p-bar" class="progress-bar" role="progressbar"  aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
							<span class="sr-only">60% Complete</span>
						</div>
					</div>
				</div>

	    </div>
	  </div>
	</div>

	<!-- Modal get dir name-->
	<div class="modal fade bs-example-modal-sm" id="mymodal_get_dir_name" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Please enter a name</h4>
				</div>
				<div class="modal-body">
					<input type="text" id="new_dir_name_text">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button onclick="make_dir()" id="button_new_dir" type="button" class="btn btn-primary">Make Dir</button>
				</div>
			</div>
		</div>
	</div>

<!-- modal delete file-->
	<div class="modal fade bs-example-modal-sm" id="mymodal_delete_file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Are the selected files removed?</h4>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button onclick="delete_dir()" id="button_delete_item"  type="button" class="btn btn-primary">  YES  </button>
				</div>
			</div>
		</div>
	</div>

	<!-- modal unzip -->
		<div class="modal fade " id="mymodal_unzip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Unzip Info</h4>
					</div>
					<div style="overflow: auto;max-height: 400px;" id="unzip_text_info" class="modal-body">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<input type="file" name="file1" id="file1"  accept="*" style="display:none;">



<script type="text/javascript">


	function _(el){
		return document.getElementById(el);
	}
	$(function () {
    $('#file1').fileupload({
        dataType: 'json',
				url:'api/upload_file',
				add: function (e, data) {

					$("#myModalLabel").text("Uploading ["+data.files[0].name+"]")
					$('#mymodal_progress').modal('show');
					$("#p-bar").attr("aria-valuenow","0");
					$("#p-bar").css( "width","0%" );
					$("#p-bar").removeClass("progress-bar-success");
					data.submit();

        },
        done: function (e, data) {
					if (data.result.ok==true) {
						generate_list(data.result.list);
						$("#myModalLabel").text("Uploaded ["+data.files[0].name+"] :)")
					}
					else {
						alert(data.result.msg);
					}

        },
				fail:function() {
					alert('There is a problem connecting to the Internet');
				},
				progressall: function (e, data) {
	        var progress = parseInt(data.loaded / data.total * 100, 10);
					$("#p-bar").css( "width", progress+"%" );

					$("#p-bar").attr("aria-valuemax",data.total);
					$("#p-bar").attr("aria-valuenow",data.loaded);
					$("#p-bar").attr("aria-valuemin","0");
					if (data.total==data.loaded) {
						$("#p-bar").toggleClass("progress-bar-success");

					}
    		}

    });
});

	function go_to_back() {
		$.get( "api/cd_to",{'dir':'..'}, function(data) {
			var json=JSON.parse(data);
			generate_list(json);
		})
		.fail(function() {
			alert( "error" );
		});
	}
	$( "#open_dir" ).on( "click", function() {
		console.log( $( this ).text() );
	});
	function go_to_dir(name) {
		$.get( "api/cd_to",{'dir':name}, function(data) {
			var json=JSON.parse(data);
			generate_list(json);
		})
		.fail(function() {
			alert( "error" );
		});
	}
	$(document).on('click', '#open_dir', function(arge){

		$.get( "api/cd_to",{'dir':$(this).val()}, function(data) {
			var json=JSON.parse(data);
			generate_list(json);
		})
		.fail(function() {
			alert( "error" );
		});
	});
	function go_to_path() {
		$.get( "api/cd_to",{'path':$("#path_input").val()}, function(data) {
			var json=JSON.parse(data);
			generate_list(json);
		})
		.fail(function() {
			alert( "error" );
		});
	}
	function go_to_refresh() {
		$.get( "api/get_dir_list", function(data) {
			var json=JSON.parse(data);
			generate_list(json);
		})
		.fail(function() {
			alert( "error" );
		});
	}
	function delete_dir() {
		$( "#button_delete_item" ).prop( "disabled", true ).text("please wait ...");

		var names=[];
		for (var i = 1; i <= checkbox_id; i++) {
			if ($('#f_'+i).is(':checked')) {JSON.stringify()
				names.push($('#f_'+i).val());
			}
		}
		$.post( "api/delete_dir",{'names':names}, function(data) {
			var result= JSON.parse(data);
			console.log("delete log : "+JSON.stringify(result.log));
		  $('#mymodal_delete_file').modal('hide');
			$( "#button_delete_item" ).prop( "disabled", false ).text("  YES  ");
			generate_list(result.list);
		})
		.fail(function() {
			$( "#button_delete_item" ).prop( "disabled", false ).text("  YES  ");
			alert( "error" );
		});
	}
	function make_dir() {
		$( "#button_new_dir" ).prop( "disabled", true ).text("please wait ...");
		$( "#new_dir_name_text" ).prop( "disabled", true );

		$.get( "api/new_dir",{'name':$("#new_dir_name_text").val()}, function(data) {
			console.log(data);
			generate_list(JSON.parse(data));
			$('#mymodal_get_dir_name').modal('hide');
			$("#new_dir_name_text").val(null).prop( "disabled", false );
			$( "#button_new_dir" ).prop( "disabled", false ).text("Make Dir");

		})
		.fail(function() {
			$('#mymodal_get_dir_name').modal('hide');
			$("#new_dir_name_text").val(null).prop( "disabled", false );
			$( "#button_new_dir" ).prop( "disabled", false ).text("Make Dir");

			alert( "error" );
		});
	}
	function unzip_file() {
		$("#mymodal_unzip").modal('show');

		var names=[];
		for (var i = 1; i <= checkbox_id; i++) {
			if ($('#f_'+i).is(':checked')) {JSON.stringify()
				names.push($('#f_'+i).val());
			}
		}

		$.get( "api/unzip",{'names':names}, function(data) {
			$("#unzip_text_info").text(data);
			go_to_refresh();
		})
		.fail(function() {
			go_to_refresh();
			alert( "error" );
		});

	}
	function zip_file() {
		var names=[];
		for (var i = 1; i <= checkbox_id; i++) {
			if ($('#f_'+i).is(':checked')) {JSON.stringify()
				names.push($('#f_'+i).val());
			}
		}
		$.get( "api/zip",{'names':names}, function(data) {
			console.log(data);
			go_to_refresh();
		})
		.fail(function() {
			go_to_refresh();
			alert( "error" );
		});
	}
	function download_file() {
		var names=[];
		for (var i = 1; i <= checkbox_id; i++) {
			if ($('#f_'+i).is(':checked')) {JSON.stringify()
				names.push($('#f_'+i).val());
			}
		}
		window.location="api/download_a_file?name="+names[0];
		go_to_refresh();
}
function reasetpath() {
	$.get( "api/resetpath", function(data) {
		console.log(data);
		generate_list(JSON.parse(data));
	})
	.fail(function() {
		go_to_refresh();
		alert( "error" );
	});
}
	</script>
</body>
</html>
