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