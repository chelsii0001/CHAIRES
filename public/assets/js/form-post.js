$(document).ready(function(){
    $('#form-submit-mensual').on('submit', function(event){
        event.preventDefault();
        $('#loading').show();
        $('#success').hide();
        $('#loading').text('CARGANDO....');
        $('#error').hide();
        $("#BtnSubmit-mensual").prop("disabled", true);
        let mensajes = [];
        var url = $('#form-submit-mensual').attr('data-action');
        $.ajax({
            url: url,
            data: new FormData(this),
            type: "POST",
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            success: function(data) {
                $('#success').text('ACCIÓN REALIZADA CORRECTAMENTE');
                $('#success').show();
                $("#form-submit-mensual").trigger("reset");
                $("#BtnSubmit-mensual").prop("disabled", false);
                $('#error').hide();
                $('#loading').hide();
                $(".print-error-msg").css('display', 'none');
                setTimeout(function(){
                    location.reload()
                }, 3000);


            },
            error: function(errors) {
                $('#success').hide();
                $("#BtnSubmit-mensual").prop("disabled", false);
                if (errors.status == 401 || errors.status == 419) {
                    window.location.href = '/';
                }
                if (errors.status == 422) {
                    mensajes = errors.responseJSON.errors;
                    printErrorMsg(mensajes);
                }
                $('#error').text('OCURRIO UN ERROR');
                $('#error').show();
                $('#loading').hide();
            }

        });
    })

    $('#form-submit-reporte').on('submit', function(event){
        event.preventDefault();
        $('#loading').show();
        $('#success').hide();
        $('#loading').text('CARGANDO....');
        $('#error').hide();
        $("#BtnSubmit").prop("disabled", true);
        let mensajes = [];
        var url = $('#form-submit-reporte').attr('data-action');
        $.ajax({
            url: url,
            data: new FormData(this),
            type: "POST",
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            success: function(data) {
                $('#success').text('ACCIÓN REALIZADA CORRECTAMENTE');
                $('#success').show();
                $("#form-submit-reporte").trigger("reset");
                $("#BtnSubmit").prop("disabled", false);
                $('#error').hide();
                $('#loading').hide();
                $(".print-error-msg").css('display', 'none');
                setTimeout(function(){
                    location.reload()
                }, 3000);


            },
            error: function(errors) {
                $('#success').hide();
                $("#BtnSubmit").prop("disabled", false);
                if (errors.status == 401 || errors.status == 419) {
                    window.location.href = '/';
                }
                if (errors.status == 422) {
                    mensajes = errors.responseJSON.errors;
                    printErrorMsg(mensajes);
                }
                $('#error').text('OCURRIO UN ERROR');
                $('#error').show();
                $('#loading').hide();
            }

        });
    })

    $('#form-submit').on('submit', function(event){
    event.preventDefault();
    $('#loading').show();
    $('#success').hide();
    $('#loading').text('CARGANDO....');
    $('#error').hide();
    $("#BtnSubmit").prop("disabled", true);
    let mensajes = [];
    var url = $('#form-submit').attr('data-action');
    $.ajax({
        url: url,
        data: new FormData(this),
        type: "POST",
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data) {
            $('#success').text('ACCIÓN REALIZADA CORRECTAMENTE');
            $('#success').show();
            $("#form-submit").trigger("reset");
            $("#BtnSubmit").prop("disabled", false);
            $('#error').hide();
            $('#loading').hide();
            $(".print-error-msg").css('display', 'none');
            setTimeout(function(){
                $('#success').hide();
            }, 3000);


        },
        error: function(errors) {
            $('#success').hide();
            $("#BtnSubmit").prop("disabled", false);
            if (errors.status == 401 || errors.status == 419) {
                window.location.href = '/';
            }
            if (errors.status == 422) {
                mensajes = errors.responseJSON.errors;
                printErrorMsg(mensajes);
            }
            $('#error').text('OCURRIO UN ERROR');
            $('#error').show();
            $('#loading').hide();
        }

    });
});

function printErrorMsg(msg) {

    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $.each(msg, function(key, value) {
        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
    });

}
});
