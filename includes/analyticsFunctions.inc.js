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
$.getJSON("json/service-countryVisits.php", loadVisits);

function loadVisits(jsonData){
            var visitsArray = [];
            visitsArray.push(['Day','Visitors']);
            for(var i=0;i<jsonData.length ;i++ ){
                visitsArray.push([ i+1, parseInt(jsonData[i]['Total Visits'])]);
            }

            console.log(visitsArray);
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

$.getJSON("json/service-topCountries.php", loadCountries);

function loadCountries(jsonData){
            var countryArray = [];
            countryArray.push(['Country','Visitors']);
            for(var i=0;i<jsonData.length ;i++ ){
                countryArray.push([jsonData[i]['CountryName'], parseInt(jsonData[i]['adopted'])]);
            }

            console.log(countryArray);
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
}