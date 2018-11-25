$(document).ready(function () {


    //intervatal variable
    var myint

    //It stops the loop/simulaton
    $("#stop-simulation").click(function () {
        clearInterval(myint);
    });

    //It starts the loop/simulation
    $("#start-simulation").click(function () {

        myint = setInterval(function () {

            var boxTemp = $("#temp");
            var actualTemp = parseFloat(boxTemp.html());
            var vTemp = $('#v-temp');

            $.ajax({
                url: "heatController.php",
                type: "get", //typ połączeniSW
                dataType: 'json', //typ danych jakich oczekujemy w odpowiedzi
                data: { //dane do wysyłki
                    actTemp: actualTemp
                }
            })
                //when done
                .done(function (response) {

                    console.log(response);

                    //writing data to html element in index.html
                    boxTemp.html(response.tempAfterHeating);
                    vTemp.html(response.sharpenHeatingValue);

                    //preparing html to write in right panel in index.html
                    var html = "<div>" +
                        "<div class='t-wew'>Temp. wewnętrzna: <b>" + response.tempAfterHeating + "</b></div>" +
                        "<div class='t-wew'>Temp. ww: <b>" + response.sharpenHeatingValue + "</b></div>" +
                        "</div>";
                    $('#box-right-content').append(html);
                })

                //when fail
                .fail(function () {
                    console.warn("Wystąpił błąd");
                })

                //always
                .always(function () {

                })
        }, 500);
    });


});