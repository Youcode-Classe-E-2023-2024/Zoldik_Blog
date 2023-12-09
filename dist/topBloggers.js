// TOP BLOGGERS LOGIC 
const top_bloggers_btn = document.getElementById('top_bloggers_btn'); 
const top_bloggers_sct = document.getElementById('top_bloggers_sct'); 
const top_bloggers_close = document.getElementById('top_bloggers_close');

function sContent() {
    top_bloggers_btn.classList.toggle('HIDDEN');
    top_bloggers_sct.classList.toggle('HIDDEN');
}

top_bloggers_btn.addEventListener('click', function() {
    sContent();
})
top_bloggers_close.addEventListener('click', function() {
    sContent();
})

