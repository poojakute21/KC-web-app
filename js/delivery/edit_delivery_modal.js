$(document).ready(function(){

    $("#submitEdit").click(function(){
        var formData = $("#editForm").serialize();
        $.ajax({
            url : WEBSITE + 'ajax_index.php?page=ajax_files/verification_ajax',
            type: 'POST',
            data:{'type' : 'updateDelivery' , 'uData' : formData},
            success:function(response){
                console.log(response);
                //window.location.reload();
                          
                var resObj = JSON.parse(response);
                //alert(response);
                if(resObj.result == "success"){
                    swal({
                        title: "Success",
                        text: "Delivery Updated Successfully",
                        type: "success",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ok",
                        closeOnConfirm: true
                    })
                    .then((isConfirm) => {
                        if (isConfirm) {
                            window.location = WEBSITE + 'main.php?page=delivery/delivery';
                        
                        } 
                    });
                }else{
                    swal("Something went wrong","Delivery not Updated","error");
                    window.location.reload();
                }
                
            }
        });
    });
});
