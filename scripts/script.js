function apply_task(event) {
	var task = document.getElementsByName("task"),
		docs = document.getElementsByName("document"),
		intern = document.getElementsByName("intern"),
		req = ["super="+uid];
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

	var link = "php/apply_task.php?" + req.join("&");

	console.log(link);
	request(link, (resp) => {window.location.reload()});
}

function change_docs(id) {
	var link = "php/get_docs.php?intern_id=" + id;

	request(link, place_docs);

	function place_docs(resp) {
		let data = JSON.parse(resp),
			parent = document.getElementsByClassName("document-list")[0];
		
		while (parent.children[0]) {
			parent.removeChild(parent.children[0]);
		}

		for (doc of data) {
			let label = document.createElement("label"),
				input = document.createElement("input"),
				p = document.createElement("p"),
				id = "documentID_" + doc["doc_id"];

			label.setAttribute("for", id);
			label.className = "document-item";

			input.id = id;
			input.type = "checkbox";
			input.name = "document";
			input.value = doc["doc_id"];

			p.innerText = doc["doc_name"];

			label.appendChild(input);
			label.append(" ");
			label.appendChild(p);

			parent.appendChild(label);
		}
	}
}

function change_user(id) {
	var base = (user_type == 2) ? "supervisor.php?" : "intern.php?",
		get = "uid=" + id;

	window.location.href = base + get;
}

function task_info(id) {
	var link = "php/get_task.php?id=" + id;
	
	request(link, show_task_info);

	function show_task_info(resp) {
		let data = JSON.parse(resp),
			parent = document.getElementById("task_info");
		console.log(data);
		while (parent.children[0]) {
			parent.removeChild(parent.children[0]);
		}

		let a_item = document.createElement("div"),
			item_t = document.createElement("div"),
			item_d = document.createElement("div"),
			i_docs = document.createElement("div");

		a_item.className = "active-item";
		item_t.className = "item-title";
		item_d.className = "item-description";
		i_docs.className = "item-documents";

		item_t.innerText = data["title"];
		item_d.innerText = data["description"];

		for (doc of data["documents"]) {
			let a = document.createElement("a");

			a.href = doc["link"];
			a.innerText = doc["name"];

			i_docs.appendChild(a);
		}

		a_item.appendChild(item_t);
		a_item.appendChild(item_d);
		a_item.appendChild(i_docs);

		parent.appendChild(a_item);
	}
}

function change_select() {
	var view = document.getElementById("view"),
		change = view.getAttribute("value");
	if (change == 0) {
		view.style.height = "60px";
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

// XML HTTP

function request(link, callback) {
	var xhr = new XMLHttpRequest();

	xhr.open('GET', link, true);
	xhr.send();

	xhr.onreadystatechange = function() { // (3)
		if (xhr.readyState != 4) return;

		if (xhr.status == 200) {
			callback(xhr.responseText);
		}
	}
}