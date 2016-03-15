var lai = angular.module('lai', [
    'ngRoute',
    'jcs-autoValidate'
]);

lai.run(function (defaultErrorMessageResolver){
    defaultErrorMessageResolver.setCulture('pl-PL');
    defaultErrorMessageResolver.getErrorMessages().then(function (errorMessages){
        errorMessages.badName = 'Imie składa się tylko z liter.';
        errorMessages.badSurname = 'Nazwisko może składać się wyłącznie z liter i myślnika.';
        errorMessages.badPhone = 'Szablon numeru telefonu +48 123-456-789.';
    });
});

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

lai.controller('mainCtrl', function ($scope, $http) {
    $scope.user = {
        'addInfo': ""
    };

    var method = "POST";
    var url = "partials/formAdd.php";

    $scope.onSub = function(){
        if($scope.user.addInfo === "") $scope.user.addInfo = "Brak dodatkowych informacji";
        if($scope.user.module != "cisco") {
            $scope.user.years = " - ";
            $scope.user.days = " - ";
        }

        $http.post(url, $scope.user)
        .success(function(response){
            console.dir(response);
        })
        .error(function(err){
            console.dir(err);
        });

        if($scope.user.module === "aplikacje"){
            $scope.user.years = "";
            $scope.user.days = "";
        }
    };

});
