$(document).ready(function () {
var myint

    $("#stop-simulation").click(function () {
        clearInterval(myint);
    });

    $("#start-simulation").click(function () {

        myint = setInterval(function () {
            //pozycja zczytywanych danych w pliku txt


            var boxTemp = $("#temp");
            var actualTemp = parseFloat(boxTemp.html());


            $.ajax({
                url: "heatController.php",
                type: "get", //typ połączeniSW
                dataType: 'json', //typ danych jakich oczekujemy w odpowiedzi
                data: { //dane do wysyłki
                    actTemp: actualTemp
                }
            })
                .done(function (response) {
                    console.log(response);

                    //wpisz dane odebrane do pol
                    boxTemp.html(response.tempAfterHeating);

                    var html = "<div>" +
                        "<div class='t-wew'>Temp. wewnętrzna: <b>" + response.tempAfterHeating + "</b></div>" +
                        "</div>";
                    $('#box-right-content').append(html);
                })


                .fail(function () {
                    console.warn("Wystąpił błąd");
                })

                .always(function () {

                })
        }, 500);
    });


});