function apply_task(event) {
	var task = document.getElementsByName("task"),
		docs = document.getElementsByName("document"),
		intern = document.getElementsByName("intern"),
		req = [];
	for (t of task) {
		if (t.checked) {
			req.push("task=" + t.value);
		}
	}
	for (d of docs) {
		if (d.checked) {
			req.push("d_"+d.value+"=" + d.value);
		}
	}
	for (i of intern) {
		if (i.checked) {
			req.push("intern=" + i.value);
		}
	}

	var base = "supervisor.php?",
		get = "apply_task=1&" + req.join("&");

	window.location.href = base + get;
} 

function change_docs(id) {
	var base = "supervisor.php?",
		get  = "change_docs=1&intern_id=" + id;

	window.location.href = base + get;
}

function change_user(id) {
	var base = (user_type == 2) ? "supervisor.php?" : "intern.php?",
		get = "change_user=1&users=" + id;

	window.location.href = base + get;
}