// wow animation
new WOW().init();

let ourGallery = document.querySelectorAll('.gallery img');

ourGallery.forEach(img => {

    img.addEventListener('click', (e) => {
        let overlay = document.createElement('div');

        overlay.className = 'popup-overlay';

        document.body.appendChild(overlay);

        let popupBox = document.createElement('div');

        popupBox.className = 'popup-box';

        let popupImg = document.createElement('img');
        popupImg.src = img.src;

        popupBox.appendChild(popupImg);

        document.body.appendChild(popupBox);

        let closeButton = document.createElement('span');

        let closeButtonText = document.createTextNode('X');

        closeButton.appendChild(closeButtonText);

        closeButton.className ="close-button";
        
        popupBox.appendChild(closeButton);
    });
});
document.addEventListener('click' , function (e){

    if (e.target.className == 'close-button'){
        e.target.parentElement.remove()

        document.querySelector('.popup-overlay').remove()
    }
})
let box_filter = document.querySelector('.box_filter');

function searchs(){
    box_filter.classList.toggle('show');
}

// click show input password


let pas = document.getElementById('inputPassword');
let show = document.getElementById('showPassword');
function showpas(){
        if(pas.type == 'password'){
    
            pas.setAttribute('type','text');
            show.classList.toggle('fa-eye');
            show.classList.toggle('fa-eye-slash');
        }else{
            pas.setAttribute('type','password');
            show.classList.toggle('fa-eye');
            show.classList.toggle('fa-eye-slash');
            
        }
    }


