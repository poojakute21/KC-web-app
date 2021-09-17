$(document).ready(function(){

    // $("#submitEdit").click(function(){
    $("#editForm").submit(function(event){

        $("#editForm input[name='documentName']").val($("#editForm input[name='documentName']").val().trim());
        var emptyFields = [];
        // check empty fields
        if ($("#editForm input[name='documentName']").val().trim().length === 0) {
            emptyFields.push("Document Name");
        }

        var documentStatus_typeData = [];
        $.each($("#editForm input[name='documentStatus']:checked"), function(){
            documentStatus_typeData.push($(this).val().trim());
        });

        if (documentStatus_typeData.length === 0) {
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
        
        var formData = $("#editForm").serialize();
        $.ajax({
            url : WEBSITE + 'ajax_index.php?page=ajax_files/admin_ajax',
            type: 'POST',
            data:{'type' : 'updateDocument' , 'uData' : formData},
            success:function(response){
                console.log(response);
                //window.location.reload();
                          
                var resObj = JSON.parse(response);
                //alert(response);
                if(resObj.result == "success"){
                    swal({
                        title: "Success",
                        text: "Document Updated Successfully",
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
                    swal("Something went wrong","Document not Updated","error");
                    window.location.reload();
                }
                
            }
        });
    });
});
