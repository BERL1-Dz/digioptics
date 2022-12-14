// --------------------    Ref input start --------------------
let i_reference = Number(document.getElementById("iteration").value);
let i_ref = 1;
$("#rowAdder_ref").click(function () {
    newRowAdd =
        '<div id="row"> <div class="input-group mb-2 mt-2">' +
        '<input id="ref_' +
        i_ref +
        '" placeholder="Ref.' +
        (i_ref + 2) +
        '" name="ref[]" type="text" class="form-control m-input" required>' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-danger" id="DeleteRow_ref" type="button" style="border-radius: 0px 5px 5px 0;">' +
        '<i class="bi bi-trash"></i></button> </div>' +
        "</div> </div>";

    $("#newinput_ref").append(newRowAdd);
    i_ref++;
});

$("body").on("click", "#DeleteRow_ref", function () { 
    $(this).parents("#row").remove();
    i_ref--;
});
// --------------------    Ref input End --------------------

// --------------------    Designatioin input start --------------------
let i_des = 0;
$("#rowAdder_des").click(function () {
    newRowAdd =
        '<div id="row"> <div class="input-group mb-2 mt-2">' +
        '<input id="des_' +
        i_des +
        '" placeholder="Designation ' +
        (i_des + 2) +
        '" name="designation[]" type="text" class="form-control m-input" required>' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-danger" id="DeleteRow_des" type="button" style="border-radius: 0px 5px 5px 0;">' +
        '<i class="bi bi-trash"></i></button> </div>' +
        "</div> </div>";

    $("#newinput_des").append(newRowAdd);
    i_des++;
});

$("body").on("click", "#DeleteRow_des", function () {
    $(this).parents("#row").remove();
    i_des--;
});
// --------------------    Designation input End --------------------

// --------------------    Designatioin input start --------------------
let i_quantite = 0;
$("#rowAdder_quantite").click(function () {
    newRowAdd =
        '<div id="row"> <div class="input-group mb-2 mt-2">' +
        '<input id="des_' +
        i_quantite +
        '"placeholder="Quantite ' +
        (i_quantite + 2) +
        '"name="quantite[]" type="number" class="form-control m-input" required>' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-danger" id="DeleteRow_quantite" type="button" style="border-radius: 0px 5px 5px 0;">' +
        '<i class="bi bi-trash"></i></button> </div>' +
        "</div> </div>";

    $("#newinput_quantite").append(newRowAdd);
    i_quantite++;
});

$("body").on("click", "#DeleteRow_quantite", function () {
    $(this).parents("#row").remove();
    i_quantite--;
});
// --------------------    Designation input End --------------------

let i_puni = 0;
$("#rowAdder_p-uni").click(function () {
    newRowAdd =
        '<div id="row"> <div class="input-group mb-2 mt-2">' +
        '<input id="des_' +
        i_puni +
        '"placeholder="Prix Unitaire ' +
        (i_puni + 2) +
        '" name="p_unitaire[]" type="number" class="form-control m-input" required>' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-danger" id="DeleteRow_p-uni" type="button" style="border-radius: 0px 5px 5px 0;">' +
        '<i class="bi bi-trash"></i></button> </div>' +
        "</div> </div>";

    $("#newinput_p-uni").append(newRowAdd);
    i_puni++;
});

$("body").on("click", "#DeleteRow_p-uni", function () {
    $(this).parents("#row").remove();
    i_puni--;
});
// --------------------    Designation input End --------------------
