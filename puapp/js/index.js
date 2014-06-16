
$(function () {

            $.ajax({
                type:'GET',
                url:'http://localhost/puapp/puapp/index.php?r=history/all',
                data: {
                    'days_from_now': 7
                },
                success:function(data){
                    teste(data);
                }
            });


        function teste(data){
            data = JSON.parse(data);

            var result = data.map(function (x) { 
                return parseInt(x, 10); 
            });

            novin = {
                    name: 'novin',
                    data: result
                }

            //for(var i=0;i<=)
            arrDays = [1,2,3,4,5,6,7,8,9,10]   

            $('#container').highcharts({
                title: {
                    text: 'Monthly Average of Sets',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: arrDays
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: '°C'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [novin]
            });
        }

    });
    

