$(function(){
    // LOADS THE INFORMATION WHICH WILL POPULATE THE TOP 4 DIVS WITH THE STATS WHICH DISPLAY THE TOTAL VISITS, VISITING COUNTRIES, TODOS AND EMPLOYEE MESSAGES SENT
    $.getJSON("json/service-totals.php",  function(){
        console.log("success");
    })
    .done(loadStats)
    .fail(function(){
        alert("Something has gone wrong.\n Please refresh or contact the administrator.")
    });
    
    // LOADS THE TOP 4 DIVS WITH THE STATS WHICH DISPLAY THE TOTAL VISITS, VISITING COUNTRIES, TODOS AND EMPLOYEE MESSAGES SENT
    function loadStats(jsonData){
        document.getElementById("toDo").innerHTML = "<span class = count mdl-color-text--grey-50>" + jsonData['toDo'] + "</span>";    
        document.getElementById("mssgs").innerHTML = "<span class = count mdl-color-text--grey-50>" + jsonData['mssgs'] + "</span>";
        document.getElementById("uniqueCountries").innerHTML = "<span class = count mdl-color-text--grey-50>" + jsonData['visits'][1] + "</span>";
        document.getElementById("totalVisits").innerHTML = "<span class = count mdl-color-text--grey-50>" + jsonData['visits'][0] + "</span>";
        
        // COUNTER FOR THE FOUR TOP DIVS
        $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 1500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    }
    
    // LOADS THE TABLE WITH ALL THE BOOKS, AND THE RELEVANT INFORMATION
    $.getJSON("json/service-topAdoptedBooks.php", function(){
        console.log("success");
    })
    .done(loadAdoptedBooks)
    .fail(function(){
        alert("Something has gone wrong.\n Please refresh or contact the administrator.")
    });
    
    function loadAdoptedBooks(jsonData){
        // console.log(jsonData);
        var myTable ="";
        for(i=0; i<10;i++){
            myTable += ('<tr style="min-height:100px">');
            myTable +=('<td class="mdl-data-table__cell--center analytics-table-background">')
            myTable +=('<img src="book-images/thumb/' + jsonData[i]['ISBN10'] + '.jpg"/></td>');
            myTable +=('<td class="mdl-data-table__cell--non-numeric">');
            myTable +=('<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="./single-book.php?i10=' + jsonData[i]['ISBN10'] + '">');
            myTable +=(jsonData[i]["Title"] + '</a></td>');
            myTable +=('<td class="mdl-data-table__cell--numeric" style="color:black">' + jsonData[i]['adopted'] + '</td></tr>');
        }
        document.getElementById("adoptedTable").innerHTML = (myTable);
    
    }
    
    // LOADS THE VISITORS PER MONTH AREA CHART
    $.getJSON("json/service-countryVisits.php", function(){
        console.log("success");
    })
    .done(loadVisits)
    .fail(function(){
        alert("Something has gone wrong.\n Please refresh or contact the administrator.")
    });
    
    function loadVisits(jsonData){
                var visitsArray = [];
                visitsArray.push(['Day','Visitors']);
                for(var i=0;i<jsonData.length ;i++ ){
                    visitsArray.push([ i+1, parseInt(jsonData[i]['Total Visits'])]);
                }
                // console.log(visitsArray);
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
    
                function drawChart() {
                    var data = google.visualization.arrayToDataTable(visitsArray);
                
                    var options = {
                          title: 'Visitors per day of month',
                      hAxis: {title: 'Day of month',  titleTextStyle: {color: '#333'}},
                      vAxis: {minValue: 0,title:"Visitors",minValue:0, maxValue:31 },
                      legend: {position: 'top', maxLines: 3},
                      animation:{
                        "startup": true,
                        duration: 1000,
                        easing: 'out'
                    },
                };
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        }
    }
    
    
    // LOADS THE COUNTRY VISITS AND LOADS THE ARRAY WHICH DISPLAYS THE TOP 15 COUNTRIES 
    $.getJSON("json/service-topCountries.php", function(){
        console.log("success");
    })
    .done(loadCountries)
    .fail(function(){
        alert("Something has gone wrong.\n Please refresh or contact the administrator.")
    });
    
    function loadCountries(jsonData){
                var countryArray = [];
                countryArray.push(['Country','Visitors']);
                for(var i=0;i<jsonData.length ;i++ ){
                    countryArray.push([jsonData[i]['CountryName'], parseInt(jsonData[i]['adopted'])]);
                }
                // console.log(countryArray);
                  google.charts.load('current', {
                'packages':['geochart'],
                // Note: you will need to get a mapsApiKey for your project.
                // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
                'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
              });
              google.charts.setOnLoadCallback(drawRegionsMap);
        
              function drawRegionsMap() {
                var data = google.visualization.arrayToDataTable(countryArray);
        
                var options = {};
        
                var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
        
                chart.draw(data, options);
              }
              loadTopList(jsonData);
    }
    
    function loadTopList(countryArray){
        var countryArray2 = [];
        for(var i=0;i<countryArray.length;i++){
            var node = document.createElement("li");
            node.setAttribute("class", "mdl-menu__item")
            var textnode = document.createTextNode(countryArray[i]['CountryName']);
            node.appendChild(textnode);
            document.getElementById("sample3").appendChild(node);
            //document.getElementById("sample3").addEventListener("click", displayVisitors);
        }
    }
    document.getElementById("sample3").addEventListener("click", function(e){
        var node = document.createElement("p");
        var textnode = document.createTextNode(e.currentTarget.textContent);
        node.appendChild(textnode);
        document.getElementById("outputStats").appendChild(node);
    });
});

