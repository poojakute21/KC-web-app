$(document).ready(function(){

    $("#submitAdd").click(function(){
        var formData = $("#addForm").serialize();
        $.ajax({
            url : WEBSITE + 'ajax_index.php?page=ajax_files/admin_ajax',
            type: 'POST',
            data:{'type' : 'addvolunteer' , 'aData' : formData},
            success:function(response){
                console.log(response);
                //window.location.reload();
                          
                var resObj = JSON.parse(response);
                //alert(response);
                if(resObj.result == "success"){
                    swal({
                        title: "Success",
                        text: "Volunteer Added Successfully",
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
                    
                    swal("Something went wrong","Volunteer Already Exists.","error");
                    location.reload();
                
                }else{
                    swal("Something went wrong","Volunteer not Added","error");
                    window.location.reload();
                }
                
            }
        });
    });
});
