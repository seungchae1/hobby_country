//로그인 박스
let d=document.getElementsByClassName("dialog")[0];
function dia(){
    d.style.width="500px"
    d.style.height="300px";
    d.style.visibility="visible";
}
function close_d(){
    d.style.visibility="hidden";
    d.style.width="0px"
    d.style.height="0px";
}
(function () { 
    const txt = document.querySelector('.windowW');
    const getWidth = function(){
      let width = window.innerWidth;
      return width;
    }
    const txtWidth = function(){
      txt.innerHTML = getWidth()+"px";
    }
    
    txtWidth();
    window.addEventListener('resize', txtWidth);
  })()
