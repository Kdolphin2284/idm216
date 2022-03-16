let hamburger = document.getElementById('header-menu');
let mobileNav = document.getElementById('mobile-nav');
let x = document.getElementById('x');

var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
  if (keys[e.keyCode]) {
    preventDefault(e);
    return false;
  }
}

// modern Chrome requires { passive: false } when adding event
var supportsPassive = false;
try {
  window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
    get: function () { supportsPassive = true; } 
  }));
} catch(e) {}

var wheelOpt = supportsPassive ? { passive: false } : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// call this to Disable
function disableScroll() {
  window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
  window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
  window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
  window.addEventListener('keydown', preventDefaultForScrollKeys, false);
}

// call this to Enable
function enableScroll() {
  window.removeEventListener('DOMMouseScroll', preventDefault, false);
  window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
  window.removeEventListener('touchmove', preventDefault, wheelOpt);
  window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
}

hamburger.addEventListener("click", function(){
    if (!mobileNav.classList.contains('onScreen')) {
        mobileNav.classList.add('onScreen');
        console.log('Mobile navigation showing');
        disableScroll();
    }
})

x.addEventListener("click", function(){
    if (mobileNav.classList.contains('onScreen')) {
        mobileNav.classList.remove('onScreen');
        console.log('Mobile navigation not showing');
        enableScroll();
    }
})

// Single Button Select - Base

function btnToggle(evt) {

  select = document.getElementsByClassName("base");
  for (i = 0; i < select.length; i++) {
    select[i].className = select[i].className.replace(" active", "");
  }

  evt.currentTarget.className += " active";
} 

// Single Button Select - Protein

function btnToggle2(evt) {

  select2 = document.getElementsByClassName("protein");
  for (i = 0; i < select2.length; i++) {
    select2[i].className = select2[i].className.replace(" active", "");
  }

  evt.currentTarget.className += " active";
} 

// Multi Mutton Select - Toppings

function btnMulti(evt) {
  evt.currentTarget.classList.toggle('check-btn');
  if(!evt.currentTarget.classList.contains('check-btn')) {
    evt.currentTarget.getElementsByTagName("img")[0].style.display = "none";
    evt.currentTarget.classList.add('font-18');
    evt.currentTarget.classList.add('desktop-toppings');
  } else {
    evt.currentTarget.getElementsByTagName("img")[0].style.display = "block";
    evt.currentTarget.classList.remove('font-18');
    evt.currentTarget.classList.remove('desktop-toppings');
  }
}

// Multi Mutton Select - More

function btnMulti2(evt) {
  if(!evt.currentTarget.classList.contains('active')) {
    evt.currentTarget.classList.add('active');
  } else {
    evt.currentTarget.classList.remove('active');
  }
}

// Multi Mutton Select - Sides

function btnMulti3(evt) {
  if(!evt.currentTarget.classList.contains('active')) {
    evt.currentTarget.classList.add('active');
  } else {
    evt.currentTarget.classList.remove('active');
  }
}

// Multi Mutton Select - Drinks

function btnMulti4(evt) {
  if(!evt.currentTarget.classList.contains('active')) {
    evt.currentTarget.classList.add('active');
  } else {
    evt.currentTarget.classList.remove('active');
  }
}

