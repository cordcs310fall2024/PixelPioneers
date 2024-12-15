const sortableList = document.getElementById("sortable");
let draggedItem = null;

// Drag-and-drop handlers
sortableList.addEventListener("dragstart", (e) => {
    draggedItem = e.target;
    e.target.classList.add("dragging");
    setTimeout(() => {
        e.target.style.display = "none";
    }, 0);
});

sortableList.addEventListener("dragend", (e) => {
    e.target.classList.remove("dragging");
    setTimeout(() => {
        e.target.style.display = "";
        draggedItem = null;
    }, 0);
});

sortableList.addEventListener("dragover", (e) => {
    e.preventDefault();
    const afterElement = getDragAfterElement(sortableList, e.clientY);
    if (afterElement == null) {
        sortableList.appendChild(draggedItem);
    } else {
        sortableList.insertBefore(draggedItem, afterElement);
    }
});

// Helper function to determine the correct position
const getDragAfterElement = (container, y) => {
    const draggableElements = [
        ...container.querySelectorAll("li:not(.dragging)")
    ];

    return draggableElements.reduce(
        (closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child };
            } else {
                return closest;
            }
        },
        { offset: Number.NEGATIVE_INFINITY }
    ).element;
};function saveOrder() {
    const items = Array.from(document.querySelectorAll("#sortable li"));
    const order = items.map((item, index) => ({
        member_id: item.getAttribute("data-id"),
        display_order: index + 1 // 1-based index for display order
    }));

    fetch("saveOrder.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(order)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Order updated successfully!");
            location.reload(); // Refresh to reflect changes
        } else {
            alert("Failed to update order: " + data.message);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred while saving the order.");
    });
}
