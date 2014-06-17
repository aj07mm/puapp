
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

            arrData = [];
            arrDataObj = [];

            for(var v in data){                
                for(var n in data[v]){
                    arrDataObj.push(parseInt(data[v][n]));
                }
                console.log(arrDataObj)
                arrData.push({
                    name: v,
                    data: arrDataObj
                });

                arrDataObj = [];
            }

            arrData.shift();
            arrDays = [];


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
                    valueSuffix: ''
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: arrData
            });
        }

    });
    

