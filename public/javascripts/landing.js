// Get the login button element


// Check if the element was found
var loginButton = document.getElementById('loginButton');

// Add a click event listener to the login button
loginButton.addEventListener('click', function() {
    // Redirect the user to the /login route
    window.location.href = '/signup';
});


var crsr = document.querySelector("#cursor");
document.addEventListener("mousemove",(dets)=>{
     crsr.style.left = dets.x +"px"
     crsr.style.top = dets.y+"px"

})
var crsrblur = document.querySelector("#cursorblur");
document.addEventListener("mousemove",(dets)=>{
     crsrblur.style.left = dets.x-250 +"px"
     crsrblur.style.top = dets.y-250+"px"

})




gsap.to("#nav",{
     backgroundColor:"#000",
     height:"100px",
     duration:0.5,
     scrollTrigger:{
          trigger:"#nav",
          scroller:"body",
          markers:true,
          start:"top -10%",
          end:"top -12%",
          scrub:1,
     }
})
gsap.to("#main",{
     backgroundColor:"black",
     scrollTrigger:{
          trigger:"#main",
          scroller:"body",
          markers:true,
          start:"top -25%",
          end:"top -70%",
          scrub:2,
          
     }
})

var video = document.getElementById("myVideo");
     video.playbackRate = 2;

     