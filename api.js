$("#test").click(function() {
    $.get(
    "http://ergast.com/api/f1/current.json",
        function(races){
            for(var i = races.MRData.RaceTable.Races.length -1;i >=0; i--){
                //ophalen van data van de api af en er td om zetten
                var Race = "<td>"+ races.MRData.RaceTable.Races[i].round +"</td>";
                var Name = "<td>"+ races.MRData.RaceTable.Races[i].raceName +"</td>";
                var Date = "<td>"+ races.MRData.RaceTable.Races[i].date +"</td>";
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
                var datefront = Dateraw.substr(0, 3);
                var datecenter = Dateraw.substr(5,6);
                var dateback = Dateraw.substr(8,9);

                var Date = "<td>"+dateback+'&minus'+datecenter+'&minus'+datefront+"</td>";
                Date +=$("#trdate").html();
                $("#trdate").html(Date);
            };       
        }        
    )
});

