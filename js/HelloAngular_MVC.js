// function HelloAngular($scope) {
// 	$scope.greeting = {
// 		text:'Hello'
// 	}
// }

var myModule = angular.module("HelloAngular", []);
// myModule.controller("HelloAngular", ["$scope", function HelloAngular($scope) {
// 	$scope.greeting = {
// 		text: "Hello"
// 	};
// }]);
myModule.directive("hello",  function () {
	return {
		restrict : "E",
		template : "<div>hi everyone</div>",
		relpace : true
	}
});