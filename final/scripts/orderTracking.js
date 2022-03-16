// Changing Background Image
setTimeout(function(){
    let trackingImg = document.getElementById("tracking-image").src="../media/images/Tracking-Egg-2.svg";
    let trackingSun2 = document.getElementById("tracking-sun-2").src="../media/images/tracking-sun.svg";
    let orderStep2 = document.getElementById("order-step-2").style.display="block";
    let orderTime2 = document.getElementById("order-time-2").style.display="block";
    setTimeout(function(){
        let trackingImg = document.getElementById("tracking-image").src="../media/images/Tracking-Egg-3.svg";
        let trackingSun3 = document.getElementById("tracking-sun-3").src="../media/images/tracking-sun.svg";
        let orderStep3 = document.getElementById("order-step-3").style.display="block";
        let orderTime3 = document.getElementById("order-time-3").style.display="block";
        setTimeout(function(){
            let styleElem = document.head.appendChild(document.createElement("style"));
            styleElem.innerHTML = "#tracking-page:before {display: block;} #order-ready {display: flex;}";
        }, 2000)
    }, 5000)
}, 5000)