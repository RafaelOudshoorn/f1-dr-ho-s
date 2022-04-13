$( "#test" ).click(function() {
    var race = {
        "url": "http://ergast.com/api/f1/2022.json",
        "method": "GET",
        "timeout": 0,
    };
      
    $.ajax(race).done(function (response) {
        var html = "<h1>" + MRData.Racetable.Race + "</h1>";
        html += $('race').html();
        html += $("#race").html(html);
        console.log(response);
    });
});