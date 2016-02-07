var lai = angular.module('lai', ['ngRoute']);

lai.config(function($routeProvider, $locationProvider){
    $routeProvider
        .when('/', { templateUrl:'partials/akademia.html' })
        .when('/akademia', { templateUrl:'partials/akademia.html'})
        .when('/cisco', { templateUrl:'partials/cisco.html'})
        .when('/aplikacje', { templateUrl:'partials/aplikacje.html'})
        .when('/zgloszenie', { templateUrl:'partials/zgloszenie.html'})
        .when('/aktualnosci', { templateUrl:'partials/aktualnosci.html'})
        .otherwise({ redirectTo:'/' });
});
