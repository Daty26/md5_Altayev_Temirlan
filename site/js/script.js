var noteContainer = document.getElementsByClassName("note-container")[0];
const remakeNoteBtns = document.querySelectorAll('.remake-note');
const contentContainer = document.getElementById('content-container');

var remakeNote = document.querySelectorAll('.remake-note');
const fnTitle = document.querySelector('.fn-title textarea');
const notesTitle = document.querySelector('.notes-title');
var searchButt = document.getElementById("searchButt");


function fadeIn(el, timeout){
    el.style.opacity = 0;
    el.style.display = 'block';
    el.style.transition = `opacity ${timeout}ms`;
    setTimeout(() => {
        el.style.opacity = 1;
    }, 150);
};
function date(){
    var date = new Date();
    var year = date.getFullYear();
    var month = date.toLocaleString('en-US', { month: 'long' });
    var day = date.getDate();
    // var fulldate = [month, day, year].join(' ');
    var fulldate = month+ " " + day + ", " + year;
    return fulldate;
}
function countWords(str) {
    const arr = str.split(' ');
    return arr.filter((word) => word !== '').length;
}
function addNote(el){
    let note = document.createElement("div");
    note.className = "notes";
    note.style.backgroundColor = el.style.backgroundColor;
    var encodedColor = encodeURIComponent(el.getAttribute("data-hidden-info"));
    note.innerHTML = `
        <div class='notes-txt'>
            <p>Новая заметка</p>
        </div>
        <div class="add-info-cont">
            <div class='note-date'>
                `+date()+`
            </div>
            <a href="php/text-editor.php?color=`+encodedColor+`">
                <div class='remake-note'>
                    <i class='bx bxs-pencil'></i>
                </div>
            </a>
        </div>
    `;
    noteContainer.insertBefore(note, noteContainer.firstChild);
    fadeIn(note, 250);
}
// Forms
function showForm(elemId){
    var elem = document.getElementById(elemId);
    if(elem.style.display === "none"){
        elem.style.display = "flex";
    }else{
        elem.style.display = "none";
    }
}
function showNote(elemId){
    var elem = document.querySelector(elemId);
    if(elem.style.display === "none"){
        elem.style.display = "flex";
    }else{
        elem.style.display = "none";
    }
}
function updateInputValue(div, input){
    var divCont = div;
    var inputField = document.getElementById(input);
    inputField.value = divCont.innerHTML;
    console.log(inputField.value);
}
// Jquery
$(document).ready(function () {
    //Add-notes
     $("#add-note").click( function() {
        $(this).show( "slow", function() {
            $(this).toggleClass('flip');
        });
    });
    $(".bx-arrow-back").click(function(){
        $("#add-note").css("display", "flex");
    })

    //List-notes
    $("#list-notes").hide();
    $('#plus-icon').click(function (event) {
        $("#list-notes").slideToggle(800);
    });
});
