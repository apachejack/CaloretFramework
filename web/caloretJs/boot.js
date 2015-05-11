require.config({
 	baseUrl: "caloretJs", 
    paths: {
        "jquery": "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min", 
        "jquery_modal": "../assets/js/jquery.modal", 
        "underscore": "../assets/js/underscore"
    }, 
	shim: {
		"jquery_modal": {
			deps: [ "jquery" ], 
			exports: "$"
		}
	}
});

requirejs(["caloret"]);