$(document).ready(function() {
    $("#nome").on("input", function() {
        let input_cru = $(this).val();

        let input_formatado = input_cru.toLowerCase().replace(/\b\w/g, function(letra) {
            return letra.toUpperCase();
        });

        $(this).val(input_formatado);
    });
});