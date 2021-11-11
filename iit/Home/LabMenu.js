$(document).ready(function() {
  $.ajax({
    type: 'GET',
    url: 'labs.js',
    dataType: 'json',
    success: function(Labdoc, status){
     var output = '';  
     $.each(Labdoc.Labs, function(i, Labs) {
        output = '<li><a href="' + Labs.Link + '">' + Labs.Name + '-' + Labs.Desc + '</a></li>';
        $('#labs').append(output);
    });
    }
});
});