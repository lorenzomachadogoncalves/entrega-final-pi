$(document).ready(function() {
    $("#descricao").on("input", function () {
        let desc = $(this).val().toLowerCase();

        if (desc.length > 0) {
            desc = desc.charAt(0).toUpperCase() + desc.slice(1);
        }

        $(this).val(desc);
    });
});