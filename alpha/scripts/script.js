let hamburger = document.getElementById('header-menu');
let mobileNav = document.getElementById('mobile-nav');
let x = document.getElementById('x');

hamburger.addEventListener("click", function(){
    if (mobileNav.style.display == 'none') {
        mobileNav.style.display = 'block';
        console.log('mobile navigation open');
    } else {
        mobileNav.style.display = 'none';
        console.log('mobile navigation closed');
    }
})

x.addEventListener("click", function(){
    if (mobileNav.style.display == 'none') {
        mobileNav.style.display = 'block';
        console.log('mobile navigation open');
    } else {
        mobileNav.style.display = 'none';
        console.log('mobile navigation closed');
    }
})