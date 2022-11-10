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
