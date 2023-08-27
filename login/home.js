let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header-2');
menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');

});
window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    if (window.scrollY > 150) {
        hearder.classList.add('active');
    }else{
        hearder.classList.remove('active');
    }
}



let countDate = new Date('september 30, 2023 00:00:00').getTime();
 function CountDown(){
    let now = new Date().getTime();
    gap = countDate - now;

    let seconds = 1000;
    let minute = seconds * 60;
    let hour = minute * 60;
    let day = hour * 24;

     let d = Math.floor(gap /(day));
     let h = Math.floor((gap % (day))/(hour));
     let m = Math.floor((gap % (hour))/(minute));
     let s = Math.floor((gap % (minute))/(seconds));


     document.getElementById('day').innerText= d;
     document.getElementById('hour').innerText= h;
     document.getElementById('minute').innerText= m;
     document.getElementById('seconds').innerText= s;
 }


setInterval(function(){
    CountDown();
},1000)

let searchBox = () =>{
 var searchValue = document.getElementById("search-box");
 var items = document.getElementsByClassName("product-name");

 for(var i = 0;i < items.length; i++) {
    items[i].parentNode.parentNode.style.display = "grid";
     if (!(items[i].innerHTML.toLowerCase().includes(searchValue.value.toLowerCase() ))){
    items[i].parentNode.parentNode.style.display = "none";
    }
 }
}






















