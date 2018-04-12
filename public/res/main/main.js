var checkbox_id=0;
function generate_list(json) {
  checkbox_id=0;
  $( "#list_content" ).empty();
  $("#path_input").val(json.path);
  if (json.dirs != null)
  for (var i = 0; i < json.dirs.length; i++) {
    checkbox_id++;
    $("#list_content").append(get_dir_html(json.dirs[i]));
  }
  if (json.files != null)
  for (var i = 0; i < json.files.length; i++) {
    checkbox_id++;
    $("#list_content").append(get_file_html(json.files[i]));
  }
document.getElementById('path_input').focus();
}
function get_file_html(name) {
  return '<div class="panel panel-default colorx" style="margin: 0px; ">'+
    '<div class="panel-body" style="padding : 0px; ">'+

      '<label style="width: 100%;">'+
        '<div class="row" style="margin-top: 3px; margin-bottom: -5px;">'+
          '<div class="col-xs-1 text-center " >'+
            '<input id="f_'+checkbox_id+'" value="'+name+'" type="checkbox">'+
          '</div>'+
        '<div class="col-xs-1 vc-tr">'+
            '<span class="glyphicon glyphicon-file" style="color: #ffc800;" aria-hidden="true"></span>'+
          '</div>'+
          '<div class="col-xs-8 vc-tr">'+
            name+
          '</div>'+
        '</div>'+
      '</label>'+
    '</div>'+
  '</div>';

}
function get_dir_html(name) {
  return '<div class="panel panel-default colorx" style="margin: 0px; ">'+
    '<div class="panel-body" style="padding : 0px; ">'+

      '<label style="width: 100%;">'+
        '<div class="row" style="margin-top: 3px; margin-bottom: -5px;">'+
          '<div class="col-xs-1 text-center vc-tr" >'+
            '<input id="f_'+checkbox_id+'" value="'+name+'" type="checkbox">'+
          '</div>'+
        '<div class="col-xs-1 vc-tr">'+
            '<span class="glyphicon glyphicon-folder-open" style="color: white;" aria-hidden="true"></span>'+
          '</div>'+
          '<div class="col-xs-8 vc-tr">'+
            name+
          '</div>'+
          '<div class="col-xs-2">'+
            '<button value="'+name+'"style="background:white;" id="open_dir" class="btn open_dirs" >'+
              '<span style="color:cadetblue;"  class="glyphicon glyphicon-log-in" aria-hidden="true"></span>'+
            '</button>'+
          '</div>'+
        '</div>'+
      '</label>'+
    '</div>'+
  '</div>';

}

function get_list() {
  $.get( "api/get_dir_list", function(data) {
    var json=JSON.parse(data);
    generate_list(json);
  })
  .fail(function() {
    console.log('error');
  });
}
get_list();
