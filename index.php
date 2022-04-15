<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <button id="test">test</button>
        <table class="table table-striped">
            <tr id="trrace">
            </tr>
            <tr id="trname">
            </tr>
            <tr id="trtime">
            </tr>
            <tr id="trdate">
            </tr>
        </table>
        <button id="person">person</button>
        <table class="table table-striped">
            <tr>
                <td>position</td>
                <td>firstname</td>
                <td>lastname</td>
                <td>points</td>
                <td>wins</td>
            </tr>    
            <tr>
                <td id="trPosition"></td>
                <td id="trFirstname"></td>
                <td id="trLastname"></td>
                <td id="trPoints"></td>
                <td id="trWins"></td>
            </tr>
        </table>
    </body>
    <script>
        $("#test").click(function() {
            $.get(
            "http://ergast.com/api/f1/current.json",
                function(races){
                    for(var i = races.MRData.RaceTable.Races.length -1;i >=0; i--){
                        //ophalen van data van de api af en er td om zetten
                        var Race = "<td>"+ races.MRData.RaceTable.Races[i].round +"</td>";
                        var Name = "<td>"+ races.MRData.RaceTable.Races[i].raceName +"</td>";
                        var Dateraw = races.MRData.RaceTable.Races[i].date;
                        var Timeraw = races.MRData.RaceTable.Races[i].time;
                        
                        Race +=$("#trrace").html();
                        $("#trrace").html(Race);

                        Name +=$("#trname").html();
                        $("#trname").html(Name);

                        //tijd naar europees zetten dus +6 uur
                        var Timeraw = String(Timeraw);
                        var timefront = Timeraw.substr(0, 2);
                        //eerste gedeelde van de tijd pakken
                        var timeback = Timeraw.substr(2, 3);

                        var timefront = parseInt(timefront);
                        var Timeplus = timefront + 6;
                        //eerste en laatste gedeelde van de tijd bij elkaar zetten
                        var Timeplus = "<td>"+ Timeplus +timeback +"</td>";

                        Timeplus +=$("#trtime").html();
                        $("#trtime").html(Timeplus);

                        var Dateraw = String(Dateraw);
                        console.log(Dateraw);
                        var datefront = Dateraw.substr(0, 4);
                        var datecenter = Dateraw.substr(4,4);
                        var dateback = Dateraw.substr(8,8);
                        console.log(datecenter);

                        var Date = "<td>"+dateback+datecenter+datefront+"</td>";
                        Date +=$("#trdate").html();
                        $("#trdate").html(Date);
                    };       
                }        
            )
        });
        $("#person").click(function() {
            $.get(
            "http://ergast.com/api/f1/current/driverStandings.json",
                function(stands){
                    for(var i = stands.MRData.StandingsTable.StandingsLists[0].DriverStandings.length -1;i >=0; i--){
                        //ophalen van data van de api af en er td om zetten
                        var Position = "<p>"+ stands.MRData.StandingsTable.StandingsLists[0].DriverStandings[i].position +"</p>";
                        var Firstname = "<p>"+ stands.MRData.StandingsTable.StandingsLists[0].DriverStandings[i].Driver.givenName +"</p>";
                        var Lastname = "<p>"+ stands.MRData.StandingsTable.StandingsLists[0].DriverStandings[i].Driver.familyName +"</p>";
                        var Points = "<p>"+ stands.MRData.StandingsTable.StandingsLists[0].DriverStandings[i].points +"</p>";
                        var Wins = "<p>"+ stands.MRData.StandingsTable.StandingsLists[0].DriverStandings[i].wins +"</p>";
                        var Url = "<p>"+ stands.MRData.StandingsTable.StandingsLists[0].DriverStandings[i].Driver.url +"</p>";

                        Position +=$("#trPosition").html();
                        $("#trPosition").html(Position);

                        Firstname +=$("#trFirstname").html();
                        $("#trFirstname").html(Firstname);

                        Lastname +=$("#trLastname").html();
                        $("#trLastname").html(Lastname);

                        Points +=$("#trPoints").html();
                        $("#trPoints").html(Points);

                        Wins +=$("#trWins").html();
                        $("#trWins").html(Wins);
                    };       
                }        
            )
        });
    </script>
</html>