var app = angular.module('app', []);
app.controller('memberdata', function($scope, $http){
	$scope.success = false;
    $scope.error = false;
	
	$scope.userid = true;
  
    $scope.fetch = function(){
    	$http.get("assets/add_package/fetch.php").success(function(data){ 
	        $scope.members = data; 
	    });
    }
	
	//Delete User
	$scope.deleteUser = function(user) {

    //$http DELETE function
    $http({

      method: 'DELETE',
      url: 'assets/add_package/delete.php/'

    })
	
	.success(function(user){
            if(user.error){
                $scope.error = true;
                $scope.success = false;
                $scope.errorMessage = user.messages;
            }
            else{
                $scope.error = false;
                $scope.success = true;
                $scope.successMessage = user.messages;
            }
        });



  };

    $scope.memberfields = [{id: 'field1'}];

    $scope.newfield = function(){
        var newItem = $scope.memberfields.length+1;
        $scope.memberfields.push({'id':'field'+newItem});
    }

    $scope.submitForm = function(){
        $http.post('assets/add_package/add.php', $scope.memberfields)
        .success(function(data){
            if(data.error){
                $scope.error = true;
                $scope.success = false;
                $scope.errorMessage = data.message;
            }
            else{
                $scope.error = false;
                $scope.success = true;
                $scope.successMessage = data.message;
                $scope.fetch();
                $scope.memberfields = [{id: 'field1'}];
            }
        });
    }

    $scope.removeField = function() {
        var lastItem = $scope.memberfields.length-1;
        $scope.memberfields.splice(lastItem);
    };

    $scope.clearMessage = function(){
    	$scope.success = false;
    	$scope.error = false;
    }

});

!function ($) {

  $(function(){

    var $window = $(window)

    $('.button-loading')
      .click(function () {
        var btn = $(this)
        btn.button('loading')
        setTimeout(function () {
          btn.button('reset')
        }, 3000)
      })
  })


}(window.jQuery)