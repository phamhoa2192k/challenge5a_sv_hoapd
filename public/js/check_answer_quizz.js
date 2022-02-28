function check_answer_quizz(){
	var answer = document.getElementById("answer").value;
	var id = document.getElementById("id").value;
	var form = new FormData();
	form.append("answer", answer);
	form.append("id", id);
	fetch("/util/check_answer_quizz.php", {
		method: "POST",
		body : form
	})
	.then(data => data.json())
	.then(data => {
		console.log(data);
		var node;
		if(data["correct"] == true){
			node = document.createElement("a");
			node.innerHTML = "Chính xác, File đáp án nè";
			node.setAttribute('href',  data["filepath"]);
			document.getElementById("answer").remove();
			document.getElementById("check").remove();
			if(n = document.getElementById("incorrect"))
				n.remove();
		}
		else {
			node = document.createElement("h5");
			node.setAttribute("id", "incorrect");
			node.innerText = "Đáp án của bạn không chính xác rồi!";
		}
		document.getElementById("file_answer").appendChild(node);
	});
}