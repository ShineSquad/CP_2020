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
		get = "uid=" + id;

	window.location.href = base + get;
}

function change_select() {
	var view = document.getElementById("view"),
		change = view.getAttribute("value");
	if (change == 0) {
		view.style.height = "30px";
		view.setAttribute("value", 1);
	} else {
		view.style.height = "0px";
		view.setAttribute("value", 0);
	}
}

function open_reglament() {
	var main = document.getElementById('main-content'),
		generalities = document.getElementById('generalities');
	main.style.display = "none";
	generalities.style.display = "block";
}

function back() {
	var main = document.getElementById('main-content'),
		generalities = document.getElementById('generalities'),
		tasks = document.getElementById('tasks'),
		responsibilities = document.getElementById('responsibilities'),
		documents = document.getElementById('documents'),
		instituteStructure = document.getElementById('institute-structure');
	main.style.display = "block";
	generalities.style.display = "none";
	tasks.style.display = "none";
	responsibilities.style.display = "none";
	documents.style.display = "none";
	instituteStructure.style.display = "none";
}

function open_task() {
	var main = document.getElementById('main-content'),
		tasks = document.getElementById('tasks');
	main.style.display = "none";
	tasks.style.display = "block";
}

function open_responsibilities() {
	var main = document.getElementById('main-content'),
		responsibilities = document.getElementById('responsibilities');
	main.style.display = "none";
	responsibilities.style.display = "block";
}

function open_documents() {
	var main = document.getElementById('main-content'),
		documents = document.getElementById('documents');
	main.style.display = "none";
	documents.style.display = "block";
}

function open_institute() {
	var main = document.getElementById('main-content'),
		instituteStructure = document.getElementById('institute-structure');
	main.style.display = "none";
	instituteStructure.style.display = "block";
}