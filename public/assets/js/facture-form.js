// --------------------    Ref input start --------------------
//let i_reference = Number(document.getElementById("iteration").value);
let i_ref = 0;
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
const quantArr = []
let i_quantite = 1;
$("#rowAdder_quantite").click(function () {
    newRowAdd =
        '<div id="row"> <div class="input-group mb-2 mt-2">' +
        '<input id="quant_' +
        i_quantite +
        '"placeholder="Quantite ' +
        (i_quantite + 1) +
        '"name="quantite[]" type="number" class="form-control m-input" required>' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-danger" id="DeleteRow_quantite" type="button" style="border-radius: 0px 5px 5px 0;">' +
        '<i class="bi bi-trash"></i></button> </div>' +
        "</div> </div>";

    $("#newinput_quantite").append(newRowAdd);
    let val = document.getElementById(`quant_${i_quantite - 1}`).value;
    if (val !== ''){
        quantArr.push(val);
        console.log(quantArr);
    }else{
        console.log('Error');
    }

    i_quantite++;
});

$("body").on("click", "#DeleteRow_quantite", function () {
    $(this).parents("#row").remove();
    quantArr.pop();
    console.log(quantArr);
    i_quantite--;
});
// --------------------    Designation input End --------------------
const p_uniArr = []
let i_puni = 1;
$("#rowAdder_p-uni").click(function () {
    newRowAdd =
        '<div id="row"> <div class="input-group mb-2 mt-2">' +
        '<input id="p-uni_' +
        i_puni +
        '"placeholder="Prix Unitaire ' +
        (i_puni + 1) +
        '" name="p_unitaire[]" type="number" class="form-control m-input" required>' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-danger" id="DeleteRow_p-uni" type="button" style="border-radius: 0px 5px 5px 0;">' +
        '<i class="bi bi-trash"></i></button> </div>' +
        "</div> </div>";

    $("#newinput_p-uni").append(newRowAdd);
    console.log(`"p-uni_${i_puni - 1}"`);
    
    let val = document.getElementById(`p-uni_${i_puni - 1}`).value;
    if (val !== ''){
        p_uniArr.push(val);
        console.log(p_uniArr);
    }else{
        console.log('Error');
    }
    i_puni++;
});

$("body").on("click", "#DeleteRow_p-uni", function () {
    $(this).parents("#row").remove();
    p_uniArr.pop();
    console.log(p_uniArr);
    i_puni--;
});
// --------------------    Designation input End --------------------


// --------------------    montant input End ------------------------
let i_montant = 1;
$("#rowAdder_montant").click(function () {
    newRowAdd =
        '<div id="row"> <div class="input-group mb-2 mt-2">' +
        '<input id="mont_' +
        i_montant +
        '"placeholder="montant ' +
        (i_montant + 2) +
        '" name="montant[]" type="number" class="form-control m-input" required>' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-danger" id="DeleteRow_montant" type="button" style="border-radius: 0px 5px 5px 0;">' +
        '<i class="bi bi-trash"></i></button> </div>' +
        "</div> </div>";

    $("#newinput_montant").append(newRowAdd);
    i_montant++;
    const montantArr =[];
if(quantArr.length == p_uniArr.length){
    quantArr.forEach(function( calc1, index){
        const calc2 = p_uniArr[index];
        montantArr.push(calc1 * calc2);
        
    })
}
    document.getElementById(`mont_${i_montant - 2}`).value = montantArr[i_montant - 2]; 
    console.log(montantArr);
});

$("body").on("click", "#DeleteRow_montant", function () {
    $(this).parents("#row").remove();
    i_montant--;
});
// --------------------    montant input End --------------------

// ------------------- sum of tow values ----------------



