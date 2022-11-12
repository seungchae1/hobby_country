let d=document.getElementsByClassName("dialog")[0];
function delete_join(){
    d.style.width="500px"
    d.style.height="300px";
    d.style.visibility="visible";
}
function close_d(){
    d.style.visibility="hidden";
    d.style.width="0px"
    d.style.height="0px";
}