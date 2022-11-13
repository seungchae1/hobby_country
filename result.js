var Hobby=["일기/다이어리꾸미기","여행/투어/탐방","게임","요리","수집",
"식물/정원","독서(소설, 자기계발서, 판타지 등)","영화/드라마","음악/콘서트","뮤지컬/공연",
"박물관/미술관","걷기/달리기","등산","자전거","스포츠",
"요가/필라테스","공예/만들기","그림","노래/작사/작곡","악기",
"사진","패션"];

var Hb_img=["./img/img1.png","./img/img2.png","./img/img3.png","./img/img4.png","./img/img5.png",
"./img/img6.png/","./img/img7.png","./img/img8.png","./img/img9.png","./img/img10.png",
"./img/img11.png","./img/img12.png","./img/img13.png","./img/img14.png","./img/img15.png",
"./img/img16.png","./img/img17.png","./img/img18.png","./img/img19.png",
"./img/img20.png","./img/img21.png","./img/img22.png"];

let d = document.getElementsByClassName("text_box")[0];
let text = document.createElement('div');

//페이지 시작 시 자동실행되는 함수
window.onload=function(){
    const urlParams = new URL(location.href).searchParams;
    
    const result_h = urlParams.get('op');
    
    document.getElementById("result_hobby").innerHTML = Hobby[result_h];
    document.getElementById("hb_img").src=Hb_img[result_h];


    //설명
    text.setAttribute('class','hobby_text');
    text.innerHTML="설명";
    d.appendChild(text);
  }

//로그인 박스
let di=document.getElementsByClassName("dialog")[0];
function dia(){
    di.style.width="500px"
    di.style.height="300px";
    di.style.visibility="visible";
}
function close_d(){
    di.style.visibility="hidden";
    di.style.width="0px"
    di.style.height="0px";
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