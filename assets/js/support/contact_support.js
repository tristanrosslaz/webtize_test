$(function(){
    var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

$('#ADDFILE').click(function (event){
    event.preventDefault();
    var counter = $('.uploadFileContainer .document').length;

    if(counter < 5){
        addFileInput();
    }else{
        $.toast({
            heading: 'Warning',
            text: 'You can only upload up to 5 documents',
            icon: 'warning',
            loader: false,  
            stack: false,
            position: 'top-center', 
            allowToastClose: false,
            bgColor: '#f0ad4e;',
            textColor: 'white'  
        });
    }
});

$("#BtnSave").click(function(e){
    e.preventDefault();

    // var submodule = $("#submodule").val();
    // var details = $("#details").val();
    var formData = new FormData();

    var serial = $("#contact_form").serializeArray();
    for(var i = 0; i < serial.length; i++){
        var formDataItem = serial[i];
        if(formDataItem.value != ""){
            formData.append(formDataItem.name, formDataItem.value);
        }
    }

    var fileInputs = $('.document');
  
    $.each(fileInputs, function(i,fileInput){
        if( fileInput.files.length > 0 ){
            $.each(fileInput.files, function(k,file){
                formData.append('images[]', file);
            });
        }
    });


    $.ajax({
        method: 'post',
        url: base_url+'Main_support/save_support_ticket',
        data: formData,
        dataType: 'json',
        processData: false,
        contentType:false,
        beforeSend:function(data){
            $.LoadingOverlay("show"); 
        },
        complete: function(data){
            $.LoadingOverlay("hide"); 
        },
        success:function(data){
            if(data.success == 1) {
                $.toast({
                    heading: 'Success',
                    text: data.message,
                    icon: 'success',
                    loader: false,  
                    stack: false,
                    position: 'top-center', 
                    bgColor: '#5cb85c',
                    textColor: 'white',
                    allowToastClose: false,
                    hideAfter: 10000
                });

                $(".document").val("");
                $("#details").val("");
                
            }else{
                $.toast({
                    heading: 'Warning',
                    text: data.message,
                    icon: 'warning',
                    loader: false,   
                    stack: false,
                    position: 'top-center',  
                    bgColor: '#f0ad4e',
                    textColor: 'white'   
                });
            }
            
        }
    });

});

    var counter = 0;
    function addFileInput(){
        var html='';

        var html = '';
        html += '<div class = "alert alert-info">';
        html += '<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>';
        html += '<strong>Upload file</strong>';
        html += '<input type="file" name="images[]" class="document col-md-8">';
        html += '</div>';

        if(counter < 5){
            $(".uploadFileContainer").append(html);
            counter++;
        }else{
            $.toast({
                heading: 'Warning',
                text: 'You can only upload up to 2 photos',
                icon: 'warning',
                loader: false,  
                stack: false,
                position: 'top-center', 
                allowToastClose: false,
                bgColor: '#f0ad4e;',
                textColor: 'white'  
            });
        }
    }

    $(".uploadFileContainer").delegate("#remove", "click", function(e){
        e.preventDefault();
        $(this).parent().css('display', 'none');
        counter = 0;
    });

    function hasExtension(inputID, exts) {
        var fileName = inputID.val();
        return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
    }

    //Validated the photos to be uploaded
    $('.uploadFileContainer').delegate('.document', 'change', function(e){
        var filesize = $(this)[0].files[0].size;
        if(!hasExtension($('.document'),['.jpg', '.png']) || filesize > 2000000){
            $.toast({
                heading: 'Warning',
                text: 'Please select valid file to upload. Only PNG and JPG file are allowed.',
                icon: 'warning',
                loader: false,  
                stack: false,
                position: 'top-center', 
                allowToastClose: false,
                bgColor: '#f0ad4e;',
                textColor: 'white'  
            });
            $(this).val("");
        }
    }); 

});