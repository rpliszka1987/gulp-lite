var name = "value";
var my_object = {
	"we use arrays when we need" : "a variable name",
	"object Sytax" : "is wrapped in Curly Braces",
	"variables are" : "wraped in quotes and separated by a colon"
};
var my_array = [
	"wrapped in square braces",
	"are addressed using numeric elements",
	"begin with zero, not one"
];


function funcky (argument){
	console.log("dump",my_object);
	console.log("dump", my_array);
	return name + "that gets returned with "+ argument;
}


funcky('a function');
