$(document).ready(function(){

    // $("#submitAdd").click(function(){
    $("#addForm").submit(function(event){

        $("#addForm input[name='roleName']").val($("#addForm input[name='roleName']").val().trim());
        var emptyFields = [];
        // check empty fields
        if ($("#addForm input[name='roleName']").val().trim().length === 0) {
            emptyFields.push("Role Name");
        }

        var roleStatus_typeData = [];
        $.each($("#addForm input[name='roleStatus']:checked"), function(){
            roleStatus_typeData.push($(this).val().trim());
        });

        if (roleStatus_typeData.length === 0) {
            emptyFields.push("Status");
        }

        // console.log(emptyFields);
        if(emptyFields.length === 0)
        {
            // all good nothing empty then fetch form data
        }
        else
        {
            // var alertText = "Please fill up following Fields:";
            var alertText = "";
            $( emptyFields ).each(function( index ) {
                alertText += "\n-"+emptyFields[index]+"";
            });

            // alert(alertText);

            swal({
                title: "Failed: Please check:",
                // text: "Please Check fields again!",
                text: alertText,
                type: "warning",
                icon: 'warning',
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            });

            return;
        }
    
        var formData = $("#addForm").serialize();
        $.ajax({
            url : WEBSITE + 'ajax_index.php?page=ajax_files/admin_ajax',
            type: 'POST',
            data:{'type' : 'addrole' , 'aData' : formData},
            success:function(response){
                console.log(response);
                //window.location.reload();
                          
                var resObj = JSON.parse(response);
                //alert(response);
                if(resObj.result == "success"){
                    swal({
                        title: "Success",
                        text: "Role Added Successfully",
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
                }else{
                    swal("Something went wrong","Role not Added","error");
                    window.location.reload();
                }
                
            }
        });
    });
});
