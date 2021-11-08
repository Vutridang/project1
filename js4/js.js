var button = document.getElementById("button");
button.onclick = function(){
	var input = document.getElementById("input").value;
	var createli = document.createElement("li");
	var list = document.getElementById("list");
	createli.innerHTML = "<input type = 'checkbox'>" + " " + input;
	createli.style.borderBottom = "solid";
	createli.style.borderBottomWidth = "1px";
	createli.style.width = "250px";
	createli.style.fontSize = "18px"
	createli.style.listStyle = "none";
	list.appendChild(createli);
}
var listCheck = document.getElementById("list");
listCheck.addEventListener("click", function(check){
	if(check.target.checked){
		check.target.parentNode.style.color = "red";
		check.target.parentNode.style.textDecoration = "line-through";
		console.log(check.target.parentNode);
		
	}

	else{
		check.target.parentNode.style.color = "blue";
		check.target.parentNode.style.textDecoration = "none";
		console.log(check.target.parentNode);
		
	}

});
