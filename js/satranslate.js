'use strict';
var apps = angular.module('app', ['pascalprecht.translate']);
apps.config(function($translateProvider){
$translateProvider.fallbackLanguage('en');
$translateProvider.registerAvailableLanguageKeys(['en','es'],{
'en_*':'en',
'es_*':'es'
})
$translateProvider.translations('en',{
QUESTION:"What is your native language?",
BUTTON_LANG_EN:"english",
BUTTON_LANG_ES:"spanish"
});
$translateProvider.translations('es',{
QUESTION:"¿Cuál es tu idioma nativo?",
BUTTON_LANG_EN:"ingl"&#233;"s",
BUTTON_LANG_ES:"español"
});
$translateProvider.useSanitizeValueStrategy('escape');
$translateProvider.preferredLanguage('en');
});

apps.controller('Ctrl',['$scope','$translate',function($scope, $translate){
	$scope.changeLanguage = function(key){
		$translate.use(key);
	};
}]);