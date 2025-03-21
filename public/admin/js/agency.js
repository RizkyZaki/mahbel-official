$(document).ready(function () {
    $("#show-modal").on("show.bs.modal", function (event) {
        let button = $(event.relatedTarget);

        let title = button.data("title");
        let name = button.data("name");
        let url = button.data("url");
        let method = button.data("method");

        $(".modal-title").text(title);
        if (method == 'put') {
            $("#name").val(name)
        }
        $("#form").attr('action', url);
        $("#form-method").val(method);
    });

    $('#show-modal').on('hidden.bs.modal', function () {
        $("#name").val('');
    });
});
