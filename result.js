var Hobby=["일기/다이어리꾸미기","여행/투어/탐방","게임","요리","수집",
"식물/정원","독서(소설, 자기계발서, 판타지 등)","영화/드라마","음악/콘서트","뮤지컬/공연",
"박물관/미술관","걷기/달리기","등산","자전거","스포츠",
"요가/필라테스","공예/만들기","그림","노래/작사/작곡","악기",
"사진","패션"];

//페이지 시작 시 자동실행되는 함수
window.onload=function(){
    const urlParams = new URL(location.href).searchParams;
    
    const result_h = urlParams.get('op');
    
    document.getElementById("result_hobby").innerHTML = Hobby[result_h];
  }