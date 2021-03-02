let slides = document.querySelector('.slides'),
    slideContent = document.querySelector('.slide-content'),
    slideItem = document.querySelectorAll(".slide"),
    lastScrollLeft = $('.slides').scrollLeft(),
    slideWidth = slideContent.offsetWidth;

    function autoShow() {
        let newScrollLeft = $('.slides').scrollLeft();
        newScrollLeft = Math.round(newScrollLeft / slideWidth) * slideWidth;

        if (newScrollLeft < (slideItem.length-1) * slideWidth) {
            document.querySelector('.slides').scroll({
                left: lastScrollLeft + slideWidth,
                behavior: 'smooth'
            });
            lastScrollLeft = newScrollLeft;
        } else {
            document.querySelector('.slides').scroll({
                left: 0,
                behavior: 'smooth'
            });
            lastScrollLeft = 0
        }
    }
        
    let slideInterval = setInterval(autoShow,5000);   

    // Stop the current timer when mouseover
    slideContent.addEventListener("mouseover", function(){ clearInterval(slideInterval)});

    // Start a new timer when mouse out
    slideContent.addEventListener("mouseout", function(){ slideInterval = setInterval(autoShow, 5000);});
    // slider navigation btns left and right
    const leftBtn = document.querySelector('.leftBtn'),
          rightBtn = document.querySelector('.rightBtn');

    rightBtn.addEventListener('click', function() {
        let newScrollLeft = $('.slides').scrollLeft();
        newScrollLeft = Math.ceil(newScrollLeft / slideWidth) * slideWidth;

        if (newScrollLeft < (slideItem.length-1) * slideWidth) {
            document.querySelector('.slides').scroll({
                left: newScrollLeft + slideWidth,
                behavior: 'smooth'
            });
            lastScrollLeft = newScrollLeft;
        } else {
            document.querySelector('.slides').scroll({
                left: 0,
                behavior: 'smooth'
            });
            lastScrollLeft = 0
        }
    })
    
    leftBtn.addEventListener('click', function() {
        let newScrollLeft = $('.slides').scrollLeft();
        newScrollLeft = Math.floor(newScrollLeft / slideWidth) * slideWidth;

        if (newScrollLeft === 0) {
            document.querySelector('.slides').scroll({
                left: (slideItem.length - 1 ) * slideWidth,
                behavior: 'smooth'
            });
        } else {
            document.querySelector('.slides').scroll({
                left: newScrollLeft - slideWidth,
                behavior: 'smooth'
            });
        }
        lastScrollLeft = newScrollLeft;
    })