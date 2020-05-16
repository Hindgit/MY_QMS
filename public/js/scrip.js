function dragOver(e){
		e.preventDefault();
}
	
function drop(e){
	e.preventDefault();
	var data = e.dataTransfer.getData("data");
	
	switch(data){
		case "input1":
			e.target.innerHTML = "<input type='text' placeholder='Texbox'>";
			break;
		case "input2":
			e.target.innerHTML = "<p><input type='date'>Date</p>";
			break;	
		case "input3":
			e.target.innerHTML = "<p><input type='number'>Nombre</p>";
			break;
		case "input4":
			e.target.innerHTML = "<select><option>Select an option</option><option>Examle 1</option><option>Example 2</option></select>";
			break;
	}
}

function drag(e){
	e.dataTransfer.setData("data", e.target.id);
}