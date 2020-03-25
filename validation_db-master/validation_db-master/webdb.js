// JQuery source code

$(document).ready(function () {

    $('.less').on("click", ev=> {

        ev.preventDefault();
        console.log("a fonctionne");
        var a = $(event.target).attr("name");
        console.log(a);
        b = "#quantity_" + a;
        console.log(b);

        val_q = parseInt($(b).val());
        console.log(val_q);

        if (val_q >= 1){
            $(b).val(val_q - 1);
            console.log("b");
            console.log(val_q);

            }    

    });

    $('.more').on("click", ev =>{
       
        ev.preventDefault();
        console.log("a2 fonctionne");
        var a = $(event.target).attr("name");
        console.log(a);
        b = "#quantity_" + a;
        console.log(b);

        val_q = parseInt($(b).val());
        console.log(val_q);

        if (val_q <= 99){
            $(b).val(val_q + 1);
            console.log("b");
            console.log(val_q);

            }    

    });

});
