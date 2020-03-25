// JavaScript source code

$(document).ready(function () {
    var quantity_1 = 0;


    a = document.addEventListener();
    console.log(a.id)

    $('.less').click( e => {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        // alert("Test -");
        
        val_q1 = parseInt($('#quantity_1').val());

        // If is not undefined
        if (val_q1 >= 1){
        $('#quantity_1').val(val_q1 - 1);
        console.log("quantity_1");
        console.log(val_q1);
        console.log(e);
        }

        // Increment

    });

    $('.more').click(e =>{
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity_1').val());

        val_q1 = parseInt($('#quantity_1').val());

        // If is not undefined
        if (val_q1 <= 99){
        $('#quantity_1').val(val_q1 + 1);
        console.log("quantity_1");
        console.log(val_q1);
        }
    });


});
