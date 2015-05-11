define(['CaloretController'], function(Controller){ 

var CarsController = function(){

}

CarsController.prototype.searchBmw = function(){
	Controller.getAndParse("CarsController", "bmwSearchAction");
}


return CarsController;

});