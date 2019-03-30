
$(document).ready(function() {




//---------------- replace the "Choose a file" label ------------------
$('#file').on('change',function(e){
    //get the file login
    //  var fileName = $(this).val();
    var fileName = e.target.files[0].name;
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
    //$(this).next('.form-text').html(fileName);
});




});