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

//user
let u=document.getElementsByClassName("userdrop")[0];
let u_cnt=0;
function uesr(){
  if(++u_cnt % 2 ==1){
    u.style.width="120px";
    u.style.paddingRight="40px";
    u.style.height="100px";
    u.style.visibility="visible";
  }
  else{
    u.style.visibility="hidden";
    u.style.width="0px";
    u.style.height="0px";
  }
}
