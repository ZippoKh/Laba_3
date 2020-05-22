function getMessages(){
    $.ajax({
        type: "GET",
        url: "client.php",
        data: {client: $('[name="client"]').val()},
        datatype: 'json',
        success: function(result){

            var output = "";
            for (var i = 0; i < result.messages.length; i++) {
                output += "<li>" +
                result.messages[i] +
                "</li>";
            }
            $('#result1').html(output);


            // Local Storage Data
            localStorage.setItem('form1Result', JSON.stringify(result));
            localStorage.setItem('form1Data', $('#Form1').serialize());
        }
    });
}



function getTraffic(){
    $.ajax({
        type: "GET",
        url: "static.php",
        datatype: 'json',
        success: function(result){
            $('#result2 tbody').html('<tr><td>'+result.traffic_in+'</td><td>'+result.traffic_out+'</td></tr>');

            // Local Storage Data
            localStorage.setItem('form2Result', JSON.stringify(result));
            localStorage.setItem('form2Data', $('#result2 tbody').serialize());
        }
    });
}




function getBal(){
    $.ajax({
        type: "GET",
        url: "balance.php",
        datatype: 'json',
        success: function(result){
            var output = "";
            for (var i = 0; i < result.length; i++) {
                output += '<tr>'+
                    '<td>' + result[i].surname + '</td>' +
                    '<td>' + result[i].password + '</td>' +
                    '<td>' + result[i].ip + '</td>' +
                    '<td>' + result[i].balance + '</td>' +
                '</tr>';
            }
            $('#result3 tbody').html(output);

            // Local Storage Data
            localStorage.setItem('form3Result', JSON.stringify(result));
            localStorage.setItem('form3Data', $('#result3 tbody').serialize());
        }
    });
}




// GET LOCAL STORAGE



function getLocal1(e) {
    $('#result1').html('');
    var currentForm = $(e).parents('form');
    var result = JSON.parse(localStorage.getItem('form1Result'));
    var data = localStorage.getItem('form1Data');
    if (currentForm.serialize() === data) {
          var output = "";
            for (var i = 0; i < result.messages.length; i++) {
                output += "<li>" +
                result.messages[i] +
                "</li>";
            }
            $('#result1').html(output);
    } else {
        alert("Данные с такими параметрами отсутствуют!");
    }
}

function getLocal2(e) {
    $('#result2 tbody').html('');
    var currentForm = $(e).parents('form');
    var result = JSON.parse(localStorage.getItem('form2Result'));
    var data = localStorage.getItem('form2Data');
    if (currentForm.serialize() === data) {
          $('#result2 tbody').html('<tr><td>'+result.traffic_in+'</td><td>'+result.traffic_out+'</td></tr>');
    } else {
        alert("Данные с такими параметрами отсутствуют!");
    }
}

function getLocal3(e) {
    $('#result3 tbody').html('');
    var currentForm = $(e).parents('form');
    var result = JSON.parse(localStorage.getItem('form3Result'));
    var data = localStorage.getItem('form3Data');
    if (currentForm.serialize() === data) {
          var output = "";
            for (var i = 0; i < result.length; i++) {
                output += '<tr>'+
                    '<td>' + result[i].surname + '</td>' +
                    '<td>' + result[i].password + '</td>' +
                    '<td>' + result[i].ip + '</td>' +
                    '<td>' + result[i].balance + '</td>' +
                '</tr>';
            }
            $('#result3 tbody').html(output);
    } else {
        alert("Данные с такими параметрами отсутствуют!");
    }
}