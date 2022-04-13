$( "#test" ).click(function() {
    $.ajax({
        type: "GET",
        url: "http://ergast.com/api/f1/2022/",
        dataType: "xml",
        success: Race
    });
    function Race(xml){
        var race = $.parseXML(xml);
        $eventItem = $(race).find("Race");  

        $eventItem.each(function(index, element) {   
            alert("ID: " + element.attributes["Racename"].value);  
            alert("Country: " + $(element).find('Date').text());   
        });
    }
});