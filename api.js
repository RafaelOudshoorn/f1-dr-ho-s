$( "#test" ).click(function() {
    $.get(
    "http://ergast.com/api/f1/2022.json",
        function(data){
            var race = data.MRData.RaceTable.Races;
            for(let i = 0; i < data.MRData.RaceTable.Races.length; i++){
                var race = data.MRData.RaceTable.Races[i];
                var Race = "<td>"+ data.MRData.RaceTable.Races[i].round +"</td>";
                var Name = "<td>"+ data.MRData.RaceTable.Races[i].raceName +"</td>";
                var Date = "<td>"+ data.MRData.RaceTable.Races[i].date +"</td>";
                var Time = "<td>"+ data.MRData.RaceTable.Races[i].time +"</td>";
                
                Race +=$("#trrace").html();
                $("#trrace").html(Race);

                Name +=$("#trname").html();
                $("#trname").html(Name);

                Date +=$("#trdate").html();
                $("#trdate").html(Date);

                Time +=$("#trtime").html();
                $("#trtime").html(Time);
            };
                
        }
        
    )
});

