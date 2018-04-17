// String Variable
var name = "value";
 
// Object variable
var my_object = {
	vacation_1 : "Dominican Republic",
	vacation_2 : "Bermuda",
	vacation_3 : "Jamaica"
};

// Array variable
var my_array = [
	"Play Basketball",
	"Go on vacations",
	"Take a nap"
];

function loop_object(obj){
	for(var i in obj){
		console.log(i, obj[i]);
	}

}

loop_object(my_object);

function loop_arrays(arr) {
	for (var i = 0; i < arr.length; i++){
		console.log(i, arr[i]);
		document.getElementById('ok').innerHTML += arr[i];
	}
}

loop_arrays(my_array);


function funcky (arg1, arg2){
	console.log("dump",my_object);
	console.log("dump", my_array);
	return name + "that gets returned with "+ arg1 + " and " + arg2;
}


funcky('a function', 'javascriptsnpm');


