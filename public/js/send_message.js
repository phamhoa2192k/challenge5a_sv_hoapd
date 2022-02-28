function sendMessage(){
	var form = new FormData();
	var mess = document.getElementById("message").value;
	var recipient = document.getElementById("recipient").value;
	form.append("message", mess);
	form.append("recipient", recipient);
	fetch("/util/message.php", {
		method: "POST",
		body: form
	})
	.then(data => data.json())
	.then(data => {
		console.log(data);
		if(data.success == true){
			if(n = document.getElementById("tb"))
				n.remove();
			var conversation = document.getElementById("conversation");
			var node = document.createElement("span");
			node.innerHTML = `<strong>${data.sender}: </strong>${mess}<br>`;
			conversation.appendChild(node);
		}
	})
}