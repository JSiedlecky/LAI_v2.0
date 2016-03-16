var lai = angular.module('lai', [
    'ngRoute',
    'jcs-autoValidate',
    'ui.bootstrap'
]);

lai.service('User', function(){
    return {};
});
lai.service('Form', function(){
    return {};
});

lai.run(function (defaultErrorMessageResolver){
    defaultErrorMessageResolver.setCulture('pl-PL');
    defaultErrorMessageResolver.getErrorMessages().then(function (errorMessages){
        errorMessages.badName = 'Imie składa się tylko z liter.';
        errorMessages.badSurname = 'Nazwisko może składać się wyłącznie z liter i myślnika.';
        errorMessages.badPhone = 'Szablon numeru telefonu +48 123 456 789.';
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

lai.controller('zgloszenieCtrl', function ($scope, $uibModal, $http, User) {
    $scope.user = User;
    $scope.user.addInfo = "";


    var url = "partials/formAdd.php";

    $scope.onSub = function(){
        if($scope.user.addInfo === "") $scope.user.addInfo = "Brak dodatkowych informacji";
        if($scope.user.module != "cisco") {
            $scope.user.years = " - ";
            $scope.user.days = " - ";
        }

        var result = "";

        $http.post(url, $scope.user)
        .success(function(response){
            console.dir(response);
            if(response === "SUPER"){
                $uibModal.open({
                    templateUrl: 'partials/modals/success.html',
                    controller: 'modalsCtrl'
                });
            }else if(response === "ERROR"){
                $uibModal.open({
                    templateUrl: 'partials/modals/failure.html',
                    controller: 'modalsCtrl'
                });
            }
            console.dir($scope);
        })
        .error(function(err){
            console.dir(err);
        });

        if($scope.user.module === "aplikacje"){
            $scope.user.years = "";
            $scope.user.days = "";
        }
    };
    user = $scope.user;
});

lai.controller('modalsCtrl', function($scope, $uibModalInstance, User){
    $scope.user = User;
    $scope.closeModal = function() {
        $scope.user.name = "";
        $scope.user.surname = "";
        $scope.user.mail = "";
        $scope.user.phone = "";
        $scope.user.module = "";
        $scope.user.years = "";
        $scope.user.days = "";
        $scope.user.addInfo = "";
        $uibModalInstance.close('cancel');
    };

    $scope.clearFormCloseModal = function() {
        $scope.user.name = "";
        $scope.user.surname = "";
        $scope.user.mail = "";
        $scope.user.phone = "";
        $scope.user.module = "";
        $scope.user.years = "";
        $scope.user.days = "";
        $scope.user.addInfo = "";

        $uibModalInstance.close('cancel');
    };
});
