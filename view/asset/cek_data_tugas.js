$(document).ready(function () {
    console.log('ready');
    $.validator.addMethod('filesize', function (value, element, arg) {
        var minsize=1000; // min 1kb
        if((value>minsize)&&(value<=arg)){
            return true;
        }else{
            return false;
        }
    });
    $(document).on('change', $("#form-edit"), function () {
        $("#form-tugas").validate({
            rules: {
                file: {
                    required: true,
                    filesize: 2000000, 
                },
            },
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            },
            messages: {
                file:{
                    filesize: 'file anda terlalu besar',
                },
            }
        });
        if ($("#form-tugas").valid()) {
            $("#btn-submit").removeClass("d-none");
        }else{
            $("#btn-submit").removeClass("d-none").addClass("d-none");
        }
    });

});