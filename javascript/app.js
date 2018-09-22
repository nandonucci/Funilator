var app = angular.module('app', []);

app.controller('MainController', ['$scope', '$http',function($scope,$http) {
    $scope.funilator = {};
    $scope.sendFunilator = function(){
        console.log($scope.funilator);
        $http.post('endpoint.com.br/api.', $scope.funilator).success(function(response){
                console.log("foi")
            }).error(function(error){
                console.log(error);
            })
        }
}]);
app.controller('SignInController', ['$scope', '$http',function($scope,$http) {
    $scope.novoUsuario = {};
    $scope.cadastro = function(){
        console.log($scope.novoUsuario)
    }
}]);

app.controller('LoginController', ['$scope', '$http',function($scope,$http) {
    $scope.login = {};
    $scope.sendLogin = function(){
        console.log($scope.novoUsuario)
}


}]);
