$(document).ready(function() {
    $("#titulo").on("input", function () {
        let input_cru = $(this).val();

        let input_formatado = input_cru.toLowerCase().replace(/(^|\s)(\S)/gu, function(letra) {
            return letra.toUpperCase();
        });

        $(this).val(input_formatado);
    })
})