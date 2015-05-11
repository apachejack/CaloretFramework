define(['CaloretController'], function(Controller){ 

var HelloController = function(){

}

HelloController.prototype.getMsg = function(){
	Controller.getAndParse("HelloController", "helloWorld");
}

return HelloController;
});