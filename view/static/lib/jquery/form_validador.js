$(document).ready(function() {
    $("#form").submit(function(e) {

        let valido = true;
    
        $(this).find(":input[required]").each(function() {
            if ($(this).val().trim() === "") {
                valido = false;
                $(this).css("border", "1px solid red");
    
            } else {
                $(this).css("border", "");
            }
        });
    
        if (!valido) {
            alert("Por favor, preencha todos os campos obrigatórios.");
            e.preventDefault();
        }
    });
})