$(document).ready(function(){

    $("#submitAdd").click(function(){
        var formData = $("#addForm").serialize();
        $.ajax({
            url : WEBSITE + 'ajax_index.php?page=ajax_files/verification_ajax',
            type: 'POST',
            data:{'type' : 'adddetails' , 'aData' : formData},
            success:function(response){
                console.log(response);
                //window.location.reload();
                          
                var resObj = JSON.parse(response);
                //alert(response);
                if(resObj.result == "success"){
                    swal({
                        title: "Success",
                        text: "Details Added Successfully",
                        type: "success",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ok",
                        closeOnConfirm: true
                    })
                    .then((isConfirm) => {
                        if (isConfirm) {
                            window.location.reload();
                        } 
                    });
                }else if(resObj.result == "same"){
                    
                    swal("Something went wrong","Details Already Exists.","error");
                    location.reload();
                
                }else{
                    swal("Something went wrong","Details not Added","error");
                    window.location.reload();
                }
                
            }
        });
    });
});
