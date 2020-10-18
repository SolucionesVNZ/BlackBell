// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())


function onDepartament(){
    var departamentoId = $('select[name="departament"]').val();
    if(departamentoId) {
        $.ajax({
            url: '/provincias/'+departamentoId,
            type:"GET",
            dataType:"json",
            beforeSend: function(){
                $('#loader').css("visibility", "visible");
            },

            success:function(data) {
                $('select[name="province"]').empty();
                $('select[name="province"]').append('<option>Seleccione...</option>');
                $.each(data, function(key, value){
                    $('select[name="province"]').append('<option value="'+ key +'">' + value + '</option>');
                });
            },
            complete: function(){
                $('#loader').css("visibility", "hidden");
            }
        });
    } else {
        $('select[name="province"]').empty();
    }
};

$(document).ready(function() {
    $('select[name="province"]').on('change', function(){
        var provinciaId = $(this).val();
        if(provinciaId) {
            $.ajax({
                url: '/distritos/'+provinciaId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },
                success:function(data) {
                    $('select[name="distrite"]').empty();
                    $('select[name="distrite"]').append('<option>Seleccione...</option>');
                    $.each(data, function(key, value){
                        $('select[name="distrite"]').append('<option value="'+ key +'">' + value + '</option>');
                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="distrite"]').empty();
        }
    });
});

$(document).ready(function() {
    $('.pago').click(function(evento){
        var metodoId = $(this).val();
        if(metodoId == 1) {
            $(".bancos").css("display", "block");
            $(".info").css("display", "none");
            $(".method-disponible").removeClass('disabled');
        }else{
            $(".bancos").css("display", "none");
            $(".info").css("display", "block");
            $(".method-disponible").addClass('disabled');
            $(".method-disponible").attr('type', 'button');
        }
    });
});
