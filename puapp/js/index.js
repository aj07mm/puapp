
$(function () {

            $.ajax({
                type:'GET',
                url:'http://localhost/puapp/puapp/index.php?r=history/all',
                success:function(data){
                    teste(data);
                }
            });


        function teste(data){
            console.log(data)

            novin = {
                    name: 'novin',
                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                }

            //for(var i=0;i<=)
            arrDays = [1,2,3,4,5,6,7,8,9,10]   

            $('#container').highcharts({
                title: {
                    text: 'Monthly Average Temperature',
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
    

