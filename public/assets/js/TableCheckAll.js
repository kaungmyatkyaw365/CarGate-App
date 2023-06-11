$(document).ready(function () {
    $("#posts-table").TableCheckAll();

    $("#multi-delete").on("click", function () {
        var button = $(this);
        var selected = [];
        $("#posts-table .check:checked").each(function () {
            selected.push($(this).val());
        });
        $.ajax({
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: button.data("route"),
            data: {
                selected: selected,
            },
        });
    });
});
$(document).ready(function () {
    $("#posts-table").TableCheckAll();
});
