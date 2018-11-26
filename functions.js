$(document).ready(function () {

    /**
     * AJAX
     * */

    //array for diagram
    var arrDiagram = [];

    //intervatal variable
    var myint

    //It stops the loop/simulaton
    $("#stop-simulation").click(function () {
        clearInterval(myint);
    });

    //It starts the loop/simulation
    $("#start-simulation").click(function () {

        myint = setInterval(function () {

            //temperature
            var boxTemp = $("#temp");
            var actualTemp = parseFloat(boxTemp.html());
            var vTemp = $('#v-temp');

            //desired tempreature
            var boxTempDesired = $("#but-temp-desired");
            var desTemp = parseFloat(boxTempDesired.val());

            //drop temperature
            var butTempDrop = $("#but-temp-drop");
            var dropTemp = parseFloat(butTempDrop.val());

            $.ajax({
                url: "heatController.php",
                type: "post", //typ połączeniSW
                dataType: 'json', //typ danych jakich oczekujemy w odpowiedzi
                data: { //dane do wysyłki
                    actTemp: actualTemp,
                    desTemp: desTemp,
                    dropTemp: dropTemp
                }
            })
            //when done
                .done(function (response) {

                    //console.log(response);

                    //writing data to html element in index.html
                    boxTemp.html(response.tempAfterHeating);
                    vTemp.html(response.sharpenHeatingValue);

                    //preparing html to write in right panel in index.html
                    /*var html = "<div>" +
                        "<div class='t-wew'>Temp. inside: <b>" + response.tempAfterHeating + "</b></div>" +
                        "<div class='t-wew'>Temp. sharpen value: <b>" + response.sharpenHeatingValue + "</b></div>" +
                        "</div>";
                    $('#box-right-content').append(html);*/

                    //functuons for diagram
                    if (arrDiagram.length < 20) {
                        arrDiagram.push([response.tempAfterHeating, response.sharpenHeatingValue]);
                    } else {
                        arrDiagram.shift();
                        arrDiagram.push([response.tempAfterHeating, response.sharpenHeatingValue]);
                    }

                    upgradeDiagram();

                    //console.log(arrDiagram);
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

    function upgradeDiagram()
    {
       for (var i=0; i<arrDiagram.length; i++) {
           $('.row' + i).css({'height' : arrDiagram[i][0]*4 + 'px'});
           $('.val' + i).html(arrDiagram[i][0]);
       }
    }

    /**
     * OTHER
     */

    //INITIAL DATA


    //TEMP DESIRED
    var boxTempDesired = $("#temp-desired");
    var butTempDesired = $("#but-temp-desired");
    var desiredTemp = parseFloat(butTempDesired.val());
    boxTempDesired.html("temp. desired: <b>" + desiredTemp + "</b>");
    $("#temp-desired-line").css({'bottom' : desiredTemp*4 + 'px'});

    //TEMP INSIDE
    var boxTemp = $("#temp");
    var butTemp = $("#but-temp-inside");
    var actualTemp = parseFloat(butTemp.val());
    boxTemp.html(actualTemp);

    checkDifferance();

    //It changes value when clicked or key up number field '#but-temp-inside'
    $('#but-temp-inside').bind('click keyup', function () {
        actualTemp = parseFloat(butTemp.val());
        boxTemp.html(actualTemp);
        checkDifferance();
    });

    //It changes value when clicked or key up number field '#but-temp-desired'
    $('#but-temp-desired').bind('click keyup', function () {
        desiredTemp = parseFloat(butTempDesired.val());
        boxTempDesired.html("temp. desired: <b>" + desiredTemp + "</b>");
        checkDifferance();

        $("#temp-desired-line").css({'bottom' : desiredTemp*4 + 'px'});
    });

    function checkDifferance() {
        actualTemp = parseFloat(butTemp.val());
        desiredTemp = parseFloat(butTempDesired.val());
        if ((actualTemp - desiredTemp) > 40 || (actualTemp - desiredTemp) < -40) {
            $("#start-simulation").hide(300);
            $("#com-info ").show(300);
            //clearInterval(myint);
        } else {
            $("#com-info ").hide(300);
            $("#start-simulation").show(300);
            //myint = setInterval(myint,5000);

        }
    }

});