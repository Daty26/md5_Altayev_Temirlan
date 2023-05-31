var quill = new Quill("#text-editor", {
    modules: {
        syntax: true, 
        toolbar: {
            container: [
                [{ 'font': [] }, { 'size': [] }],
                ["bold", "italic", "underline"],
                [{ 'color': [] }, { 'background': [] }],
                ["link", "blockquote", "code-block"],
                [{ list:  "ordered" }, { list:  "bullet" }, { 'list': 'check' }],
                [{ 'align': [] }],
                [ 'link', 'image', 'video', 'formula' ],

            ],
        },
    },
    placeholder: 'Введите текст...',
    theme: 'snow',
}); 
var inputColor = document.getElementById('inputColor');
var colorHidden = document.getElementById('color-hidden');
var inputTitle = $("#inputTitle")[0];
var inputContent = $("#inputContent")[0];
var divTitle = $("#divTitle")[0];
var divContent = document.getElementById("text-editor").firstChild;
var saveBtn = document.getElementsByClassName("save-btn")[0];
var count = document.getElementById("count");
var symbolCount = document.getElementById("symbolCount");
var wordCount = document.getElementById("wordCount");

inputColor.value = colorHidden.innerText;

if(colorHidden.innerText != '#E4F691'){
    count.style.color = colorHidden.innerText;
    saveBtn.style.backgroundColor = colorHidden.innerText;
}else{
    count.style.color = "#C0C775";
    saveBtn.style.backgroundColor = "#DBE385";
}

divTitle.addEventListener('input', function() {
    inputTitle.value = divTitle.innerHTML;
});
quill.on('text-change', function() {
    var html = quill.root.innerHTML;
    inputContent.value = html;
    if(quill.root.innerText.length){
        $("#count").fadeIn();
        symbolCount.innerText = quill.root.innerText.length;
    }
    if(countWords(quill.root.innerText)){
        $("#count").fadeIn();
        wordCount.innerText = countWords(quill.root.innerText);
    }
    if (quill.root.innerHTML.length > 60000) {
        alert('Вы превысили максимального количества символов');
        saveBtn.disabled = true;
      } else {
        saveBtn.disabled = false;
      }
});



$(".back").on("click", function(){
    location.href = "../main.php";
})
