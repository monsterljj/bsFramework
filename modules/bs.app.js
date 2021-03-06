var appName = 'bsFramework';
var appModule = angular.module(appName,[
    "ngResource",
    "ngRoute",
    "bs.main",
    "bs.feedback"
]);

appModule.config(["$locationProvider", function ($locationProvider)
{
    $locationProvider.hashPrefix('!');
}]);

angular.element(document).ready(function()
{
    angular.bootstrap(document,[appName]);
});
