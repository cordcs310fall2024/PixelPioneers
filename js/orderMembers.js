const draggables = document.querySelectorAll('.draggable-item');
let dragSrcEl = null;

draggables.forEach(draggable => {
    draggable.addEventListener('dragstart', handleDragStart);
    draggable.addEventListener('dragover', handleDragOver);
    draggable.addEventListener('dragenter', handleDragEnter);
    draggable.addEventListener('dragleave', handleDragLeave);
    draggable.addEventListener('drop', handleDrop);
    draggable.addEventListener('dragend', handleDragEnd);
});

function handleDragStart(e) {
    dragSrcEl = this;
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
}

function handleDragOver(e) {
    if (e.preventDefault) {
        e.preventDefault(); // Necessary to allow dropping
    }
    e.dataTransfer.dropEffect = 'move';
    return false;
}

function handleDragEnter() {
    this.classList.add('over');
}

function handleDragLeave() {
    this.classList.remove('over');
}

function handleDrop(e) {
    if (e.stopPropagation) {
        e.stopPropagation(); // Stops browser from redirecting.
    }

    // Swap the contents if the dropped element isn't the same as the dragged one
    if (dragSrcEl !== this) {
        dragSrcEl.innerHTML = this.innerHTML;
        this.innerHTML = e.dataTransfer.getData('text/html');
    }

    return false;
}

function handleDragEnd() {
    draggables.forEach(draggable => {
        draggable.classList.remove('over');
    });
}