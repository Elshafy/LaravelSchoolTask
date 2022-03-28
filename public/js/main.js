/*global $*/
// Display FullYear in copyright footer

document.getElementById("getFullYear").innerHTML = new Date().getFullYear();

function add(e) {
    let first = document.getElementById("first" + e).value;
    let second = document.getElementById("second" + e).value;
    document.getElementById("result" + e).innerText =
        parseInt(first) + parseInt(second);
}
$(function () {
    // sum of  num of BRANChes
    $('#calculation').on("change", "#item", function () {

        let sum = 0;

        $(this).parents('#calculation').children('#pare').each(function (e, el) {
            let x;
            x = $(el).find('#item').val();
            sum += parseInt(x);
        });
        console.log(sum);

        $(this).parents('#calculation').find('#total').val(sum);

    });
    //! dskfs




    $('#calc').on("change", ":input", function () {
        let id = '#' + $(this).attr('id');
        let data = '#' + $(this).data('sub');
        let pare = $(this).parents('#super-pare');
        $(this).parents('tr').find(data).val(
            $(this).parents('tr').find('#num').val() - $(this).val()
        );
        let x, y;
        x = parseInt($(pare).find('#sum').text());
        y = parseInt($(pare).find(id + '-sum').text());
        let sum = x - y;

        $(pare).find(data + '-sum').text(sum)

        if (id == '#success') {
            let r = ($(this).val() * 100) /
                parseInt($(this).parents('tr').find('#num').val());

            $(this).parents('tr').find('#ratio').val(Math.floor(r) + '%');
            sratio = Math.floor((y * 100) / x);

            $(pare).find('#ratio-sum').text(sratio + '%')

        }

    });


    $('#calc').on("change", ":input", function () {
        let id = '#' + $(this).attr('id');
        sum(id);



    });



    function sum(e) {
        let sum = 0.00;
        let avg = 0.00;

        $(e).parents('#calc').children('tr').each(function (i, el) {

            let x;

            x = $(el).find(e).val();
            sum += parseInt(x);
        });

        avg = sum / parseFloat($(e).parents('#super-pare').find('#avg').data('count'));
        sum = sum.toString();
        avg = avg.toString();

        $(e).parents('#super-pare').find(e + '-sum').text(sum);
        $(e).parents('#super-pare').find(e + '-avg').text(avg);

    }






});

