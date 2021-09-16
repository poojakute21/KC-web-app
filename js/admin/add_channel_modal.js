$(document).ready(function(){

    // $("#submitAdd").click(function(){
    $("#addForm").submit(function(event){

        $("#addForm input[name='channelName']").val($("#addForm input[name='channelName']").val().trim());
        var emptyFields = [];
        // check empty fields
        if ($("#addForm input[name='channelName']").val().trim().length === 0) {
            emptyFields.push("Channel Name");
        }

        var channelStatus_typeData = [];
        $.each($("#addForm input[name='channelStatus']:checked"), function(){
            channelStatus_typeData.push($(this).val().trim());
        });

        if (channelStatus_typeData.length === 0) {
            // alert('Enter Description!');
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
            data:{'type' : 'addChannel' , 'aData' : formData},
            success:function(response){
                console.log(response);
                //window.location.reload();
                          
                var resObj = JSON.parse(response);
                //alert(response);
                if(resObj.result == "success"){
                    swal({
                        title: "Success",
                        text: "Channel Added Successfully",
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
                    swal("Something went wrong","Channel not Added","error");
                    window.location.reload();
                }
                
            }
        });
    });
});
