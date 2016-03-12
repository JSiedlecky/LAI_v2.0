var lai = angular.module('lai', ['ngRoute']);

lai.config(function($routeProvider, $locationProvider){
    $routeProvider
        .when('/', { templateUrl:'partials/akademia.html' })
        .when('/akademia', { templateUrl:'partials/akademia.html'})
        .when('/cisco', { templateUrl:'partials/cisco.html'})
        .when('/aplikacje', { templateUrl:'partials/aplikacje.html'})
        .when('/zgloszenie', { templateUrl:'partials/zgloszenie.php'})
        .when('/aktualnosci', { templateUrl:'partials/aktualnosci.html'})
        .otherwise({ redirectTo:'/' });
});

lai.controller('mainCtrl', function ($scope) {
    $scope.onSub = function (valid) {
        if(valid){
            console.log("Hey i'm submitted!");
            console.log($scope.formModel);
        } else {
            console.log("InvalidForm!");
        }
    };
});
