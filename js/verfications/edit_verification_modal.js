$(document).ready(function(){

    $("#submitEdit").click(function(){
        var formData = $("#addForm").serialize();
        
        $.ajax({
            url : WEBSITE + 'ajax_index.php?page=ajax_files/verification_ajax',
            type: 'POST',
            data:{'type' : 'updateverification' , 'uData' : formData},
            success:function(response){
                console.log(response);
                //window.location.reload();
                          
                var resObj = JSON.parse(response);
                //alert(response);
                if(resObj.result == "success"){
                    swal({
                        title: "Success",
                        text: "Details Updated Successfully",
                        type: "success",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ok",
                        closeOnConfirm: true
                    })
                    .then((isConfirm) => {
                        if (isConfirm) {
                            window.location = WEBSITE + 'main.php?page=verifications/verifications';
                        } 
                    });
                }else if(resObj.result == "same"){
                    
                    swal("Something went wrong","Details Already Exists.","error");
                    location.reload();
                
                }else{
                    swal("Something went wrong","Details not Updated","error");
                    window.location.reload();
                }
                
            }
        });
    });
});
