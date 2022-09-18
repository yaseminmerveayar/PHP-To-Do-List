// get current task
function getCurrentTaskId(event) {
    document.getElementById("EditFloatingInput").value = event.parentNode.parentNode.parentNode.children[1].innerText;
    document.getElementById("taskId").value = event.parentNode.parentNode.parentNode.children[0].innerText;
}
