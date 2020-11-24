var app = angular.module('app', []);

//o de forma más simple
var anyo = new Date().getFullYear();

app.controller('myCtrl', function ($scope, $http) {

    //this fetches the data for our table
    $scope.fetchsales = function(){
        $http.get('fetchsales.php').success(function(data){

            var ctx = document.getElementById("dvCanvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: 'Total Shipping',
                            backgroundColor: '#4fc3f7',
                            borderColor: '#4fc3f7',
                            data: data.prev,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label:  'Total Sales Shipping',
                            backgroundColor: '#7460ee',
                            borderColor: '#7460ee',
                            data: data.year,
                            borderWidth: 2,
                            fill: false
                        },
						{
                            label:  'Total Consolidated',
                            backgroundColor: '#20c997',
                            borderColor: '#20c997',
                            data: data.pre,
                            borderWidth: 2,
                            fill: false
                        }

                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });
    }

    $scope.clear = function(){
        $scope.error = false;
        $scope.success = false;
    }

});