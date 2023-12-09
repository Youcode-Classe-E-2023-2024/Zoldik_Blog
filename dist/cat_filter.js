const CARD = document.querySelectorAll('.CARD');
const CTGS = document.querySelectorAll('.CTGS');

function containsHidden() {

}
for (const category of CTGS) {
    category.addEventListener('click', function() {
        for (let i = 0; i < CARD.length; i++) {
            if (CARD[i].classList.contains('HIDDEN')) {
                CARD[i].classList.remove('HIDDEN');
            }
        }
        for (let i = 0; i < CARD.length; i++) {
            if (CARD[i].getAttribute('category_id') != category.getAttribute('key')) {
                CARD[i].classList.add('HIDDEN');
            }
        }
    });
}

// 
const el = document.querySelector('.el'); 
el.classList.toggle('HIDDEN');