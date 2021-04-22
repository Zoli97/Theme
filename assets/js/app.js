let mouseCursor = document.querySelector('.cursor');
let navLink = document.querySelectorAll('.nav-link li ');


//add eventlistener, so whenever the mouse move i can run a function (vertical horizontals)

window.addEventListener('mousemove', cursor);

function cursor(event){

    //console.log(event)

    //pagex pagey prop get the coordonate where the mouse position is
    mouseCursor.style.top = event.pageY + 'px';
    mouseCursor.style.left = event.pageX + 'px';
}


//loop over those navlink(every links and for each link i want to see when the mouse over it or when mouse leaves (and based on that remove and add class ))
navLink.forEach(link =>{

    //leave the links
    link.addEventListener('mouseleave', ()=>{

        mouseCursor.classList.remove('link-grow');
        mouseCursor.classList.remove('hoveredlinks');
        //console.log('leave it')
    })


    link.addEventListener('mouseover', ()=>{

        mouseCursor.classList.add('link-grow');
        mouseCursor.classList.add('hoveredlinks');
        //console.log('over it')
    })
})

//get the header element
let background = document.getElementById('header');
let count = 20;
for(let i = 0; i <= count; i++){

    //create the element and set a class and then append it to header.
    let glitchbox = document.createElement('div');
    glitchbox.className = 'box';
    background.appendChild(glitchbox);
}


//call a function to evaluate the glitch effect at specified interval.
setInterval(function(){
    let glitch = document.getElementsByClassName('box');
    for(let i = 0; i < glitch.length; i++){
    
        glitch[i].style.left = Math.floor(Math.random() * 100) + 'vw';
        glitch[i].style.top = Math.floor(Math.random() * 100) + 'vh';
        glitch[i].style.width = Math.floor(Math.random() * 400) + 'px';
        glitch[i].style.height = Math.floor(Math.random() * 100) + 'px';
        glitch[i].style.backgroundPosition = Math.floor(Math.random() * 50) + 'px';
    }

},200)





