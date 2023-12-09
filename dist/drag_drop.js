let draggedElement = null;

function allowDrop(event) {
    event.preventDefault();
}

function drag(event) {
    draggedElement = event.target;
    event.dataTransfer.setData("text/plain", event.target.innerText);
}

function drop(event) {
    event.preventDefault();

    if (draggedElement) {
        const data = event.dataTransfer.getData("text/plain");

        // Check if the event target is a direct child of the main element
        if (Array.from(document.getElementById('darg_parent').children).includes(event.target)) {
            const draggedIndex = Array.from(draggedElement.parentElement.children).indexOf(draggedElement);
            const dropIndex = Array.from(event.target.parentElement.children).indexOf(event.target);

            if (draggedElement.parentElement === event.target.parentElement) {
                // If the dragged element is from the same container, move it within the container
                event.target.parentElement.insertBefore(draggedElement, event.target.parentElement.children[dropIndex + (draggedIndex < dropIndex ? 1 : 0)]);
            } else {
                // If the dragged element is from another container, move it to the new container
                event.target.parentElement.insertBefore(draggedElement, event.target);
            }
        }

        draggedElement = null;
    }
}