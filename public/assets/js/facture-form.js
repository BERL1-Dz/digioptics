// --------------------    Ref input start --------------------

// document.getElementById("ref_input").addEventListener("input", function () {
//     const conc = [...document.querySelectorAll("#ref_input [id^=ref_]")] // id starts with text
//         .filter((fld) => fld.value.trim() !== "")
//         .map((fld) => fld.value);
//     console.log(conc[1]);

//     $("#result_ref").val(JSON.stringify(conc));
// });

let i_ref = 0;
$("#rowAdder").click(function () {
    newRowAdd =
        '<div id="row"> <div class="input-group mb-2 mt-2">' +
        '<input id="ref_' +
        i_ref +
        '" name="ref[]" type="text" class="form-control m-input" required>' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-danger" id="DeleteRow" type="button" style="border-radius: 0px 5px 5px 0;">' +
        '<i class="bi bi-trash"></i></button> </div>' +
        "</div> </div>";

    $("#newinput").append(newRowAdd);
    i_ref++;
});

$("body").on("click", "#DeleteRow", function () {
    $(this).parents("#row").remove();
    i_ref--;
});
// --------------------    Ref input End --------------------
