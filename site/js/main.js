var searchButt = document.getElementById("searchButt");
$("#list-notes").hide();

searchButt.addEventListener('keyup', (e) => {
    const searchString = e.target.value.toLowerCase();
    const notes = document.getElementsByClassName('notes');

    Array.from(notes).forEach((note) => {
        const title = note.querySelector('.notes-txt p').textContent.toLowerCase();
        
        if (title.includes(searchString)) {
            note.style.display = "block";
        } else {
            note.style.display = "none";
        }
    });
});
