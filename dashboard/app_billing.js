var app_billing = angular.module('app_billing', []);

//o de forma más simple
var anyo = new Date().getFullYear();

app_billing.controller('myCtrls', function ($scope, $http) {

    //this fetches the data for our table
    $scope.fetchsales = function(){
        $http.get('fetchsales.php').success(function(data){

            var ctx = document.getElementById("dvbCanvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: 'Total shipping Container',
                            backgroundColor: '#f62d51',
                            borderColor: '#f62d51',
                            data: data.prevpending,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label:  'Total delivery sales delivered',
                            backgroundColor: '#7460ee',
                            borderColor: '#7460ee',
                            data: data.yeardelivered,
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