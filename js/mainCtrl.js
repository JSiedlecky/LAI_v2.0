var lai = angular.module('lai', [
    'ngRoute',
    'ngAnimate',
    'jcs-autoValidate',
    'ui.bootstrap'
]);

lai.service('User', function(){
    return {};
});

//custom errrors for form
lai.run(function (defaultErrorMessageResolver){
    defaultErrorMessageResolver.setCulture('pl-PL');
    defaultErrorMessageResolver.getErrorMessages().then(function (errorMessages){
        errorMessages.badName = 'Imie składa się tylko z liter.';
        errorMessages.badSurname = 'Nazwisko może składać się wyłącznie z liter i myślnika.';
        errorMessages.badPhone = 'Szablon numeru telefonu +48 123 456 789.';
        errorMessages.badMail = '';
    });
});

//routing
lai.config(function($routeProvider, $locationProvider){
    $routeProvider
        .when('/', { templateUrl:'partials/aktualnosci.php' })
        .when('/akademia', { templateUrl:'partials/akademia.php'})
        .when('/cisco', { templateUrl:'partials/cisco.php'})
        .when('/aplikacje', { templateUrl:'partials/aplikacje.php'})
        .when('/zgloszenie', { templateUrl:'partials/zgloszenie.php'})
        .when('/aktualnosci', { templateUrl:'partials/aktualnosci.php'})
        .when('/partials', {redirectTo: '/'})
        .when('../', {redirectTo: '/'})
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
            $scope.user.module = "Aplikacje";
        } else $scope.user.module = "Cisco";

        var result = "";

        $http.post(url, $scope.user)
        .success(function(response){
            console.log(response.trim());
            response = response.trim();
            if(response == "SUPER"){
                $uibModal.open({
                    templateUrl: 'partials/modals/success.html',
                    controller: 'modalsCtrl'
                });
            }else if(response == "ERROR"){
                $uibModal.open({
                    templateUrl: 'partials/modals/failure.html',
                    controller: 'modalsCtrl'
                });
            }
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

lai.controller('newsletterCtrl', function ($scope, $http) {
    $scope.newsletterAdd = function(){
        var url = "partials/newsletter.php";
        console.log("donbe");

        var data = {

            "mail":$scope.newsletterEmail
        };

        if($scope.newsletterEmail === undefined || $scope.newsletterEmail === "") console.log("puste Pole!");
        else{
            $http.post(url, data)
            .success(function(response){
               console.log(response);
            })
            .error(function(err){
               console.error(err);
            });
        }

        $scope.newsletterEmail = "";
    };
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
