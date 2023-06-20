    let Q_count=1;
    let Max_qc = 12;

    var hobby_cnt ={
    "일기/다이어리꾸미기":0, "여행/투어/탐방":0, "게임":0,"요리":0,"수집":0,"식물/정원":0,"독서(소설, 자기계발서, 판타지 등)":0,"영화/드라마":0,"음악/콘서트":0,
    "뮤지컬/공연":0, "박물관/미술관":0, "걷기/달리기":0,"등산":0,"자전거":0,"스포츠":0,"요가/필라테스":0,"공예/만들기":0,"그림":0,"노래/작사/작곡":0,"악기":0,
    "사진":0,"패션":0,};

    let q_num = document.getElementsByClassName("question")[0];
    let question = document.getElementsByClassName("question2")[0];
    let ops=document.getElementsByClassName("options")[0];
    let op1=document.getElementsByClassName("option")[0];
    let op2=document.getElementsByClassName("option")[1];
    let img = document.getElementsByClassName("test_img")[0];
    let pro = document.getElementById("pro");
    let pro_num = document.getElementsByClassName("p_num")[0];
    let ops2 = document.getElementsByClassName("options")[1];
    let op3 = document.createElement('div');
    let op4 = document.createElement('div');

    function Select_op(op)
    {
        switch(Q_count){
            case 1 : 
                question.innerHTML="당신의 나이는?(선택지4)";
                op3.setAttribute('class','option');
                op3.setAttribute('onclick','Select_op(3)');
                ops2.appendChild(op3);
                
                op4.setAttribute('class','option');
                op4.setAttribute('onclick','Select_op(4)');
                ops2.appendChild(op4);

                op1.innerHTML="10대";
                op2.innerHTML="20대";
                op3.innerHTML="30대";
                op4.innerHTML="40대 이상";
                    if(op==1){
                        hobby_cnt["일기/일기/다이어리꾸미기"]++; hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++; hobby_cnt["음악/콘서트"]++; 
                        hobby_cnt["요가/필라테스"]++; hobby_cnt["공예/만들기"]++; hobby_cnt["그림"]++; hobby_cnt["패션"]++; hobby_cnt["식물/정원"]++;
                        hobby_cnt["여행/투어/탐방"]++; hobby_cnt["뮤지컬/공연"]++; hobby_cnt["박물관/미술관"]++; hobby_cnt["영화/드라마"]++;
                        hobby_cnt["걷기/달리기"]++; hobby_cnt["자전거"]++; 
                    }
                    else{ 
                        hobby_cnt["게임"]++; hobby_cnt["수집"]++; hobby_cnt["스포츠"]++; hobby_cnt["등산"]++; hobby_cnt["요리"]++;
                        hobby_cnt["사진"]++; hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++;
                    }
                break;
            case 2 : 
                ops2.removeChild(op3);
                ops2.removeChild(op4);
                question.innerHTML="당신이 취미 생활을 할 때 선호하는 장소는?(밖 or 집)";
                op1.innerHTML="밖";
                op2.innerHTML="집";
                    if(op==1){
                        hobby_cnt["일기/일기/다이어리꾸미기"]++;  hobby_cnt["악기"]++; hobby_cnt["그림"]++;
                        hobby_cnt["게임"]++; hobby_cnt["영화/드라마"]++; hobby_cnt["걷기/달리기"]++;
                    }
                    else if(op==2){
                        hobby_cnt["요가/필라테스"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["여행/투어/탐방"]++; hobby_cnt["수집"]++; hobby_cnt["노래/작사/작곡"]++;
                    }
                    else if(op==3){
                        hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++; hobby_cnt["공예/만들기"]++; hobby_cnt["뮤지컬/공연"]++; hobby_cnt["요리"]++;
                    }
                    else{hobby_cnt["스포츠"]++; hobby_cnt["등산"]++; hobby_cnt["사진"]++; hobby_cnt["박물관/미술관"]++; hobby_cnt["자전거"]++; 
                        hobby_cnt["패션"]++; hobby_cnt["식물/정원"]++;
                    }
                break;
            case 3 : 
                question.innerHTML="평소 당신의 여유시간은 어느정도 인가요?";
                op1.innerHTML="넉넉하다";
                op2.innerHTML="적다";
                if(op==1){
                    hobby_cnt["사진"]++; hobby_cnt["스포츠"]++; hobby_cnt["등산"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["식물/정원"]++;
                    hobby_cnt["여행/투어/탐방"]++; hobby_cnt["뮤지컬/공연"]++; hobby_cnt["박물관/미술관"]++; hobby_cnt["걷기/달리기"]++; hobby_cnt["자전거"]++; 
                }
                else{ 
                    hobby_cnt["게임"]++; hobby_cnt["수집"]++; hobby_cnt["요리"]++; hobby_cnt["일기/일기/다이어리꾸미기"]++; 
                    hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++; hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++; hobby_cnt["공예/만들기"]++; 
                    hobby_cnt["그림"]++; hobby_cnt["패션"]++; hobby_cnt["영화/드라마"]++; hobby_cnt["요가/필라테스"]++; 
                }
                break;
            case 4 : 
                question.innerHTML="당신의 지갑 사정은?";
                op1.innerHTML="부유하다";
                op2.innerHTML="가난하다";
                if(op==1){
                    hobby_cnt["요리"]++; hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++; hobby_cnt["공예/만들기"]++; 
                    hobby_cnt["그림"]++; hobby_cnt["패션"]++; hobby_cnt["영화/드라마"]++; hobby_cnt["요가/필라테스"]++; 
                    hobby_cnt["스포츠"]++; hobby_cnt["등산"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["식물/정원"]++;
                    hobby_cnt["여행/투어/탐방"]++; hobby_cnt["뮤지컬/공연"]++; hobby_cnt["박물관/미술관"]++; hobby_cnt["자전거"]++; 
                }
                else{ 
                    hobby_cnt["사진"]++; hobby_cnt["걷기/달리기"]++; hobby_cnt["일기/일기/다이어리꾸미기"]++; hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++; 
                    hobby_cnt["게임"]++;  hobby_cnt["수집"]++; 
                }
                break;
            case 5 : 
                question.innerHTML="당신이 좋아하는 분위기는?";
                op1.innerHTML="잔잔한";
                op2.innerHTML="신나는";
                if(op==1){
                    hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++; hobby_cnt["공예/만들기"]++; 
                    hobby_cnt["그림"]++; hobby_cnt["패션"]++; hobby_cnt["영화/드라마"]++; hobby_cnt["요가/필라테스"]++; 
                    hobby_cnt["스포츠"]++; hobby_cnt["등산"]++; hobby_cnt["음악/콘서트"]++;
                    hobby_cnt["여행/투어/탐방"]++; hobby_cnt["뮤지컬/공연"]++; hobby_cnt["박물관/미술관"]++; hobby_cnt["자전거"]++; 
                    hobby_cnt["사진"]++; hobby_cnt["수집"]++; 
                }
                else{ 
                    hobby_cnt["걷기/달리기"]++; hobby_cnt["일기/일기/다이어리꾸미기"]++; hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++; 
                    hobby_cnt["게임"]++;  hobby_cnt["식물/정원"]++; hobby_cnt["요리"]++; 
                }
                break;
            case 6 : 
                question.innerHTML="취미 생활을 할 때 원하는 인원수는 어떻게 되나요?";
                op1.innerHTML="혼자";
                op2.innerHTML="다수";
                if(op==1){
                    hobby_cnt["공예/만들기"]++; hobby_cnt["그림"]++; hobby_cnt["패션"]++; hobby_cnt["영화/드라마"]++; hobby_cnt["요가/필라테스"]++; 
                    hobby_cnt["등산"]++; hobby_cnt["박물관/미술관"]++; hobby_cnt["자전거"]++; hobby_cnt["사진"]++; hobby_cnt["수집"]++; 
                    hobby_cnt["걷기/달리기"]++; hobby_cnt["일기/일기/다이어리꾸미기"]++; hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++; hobby_cnt["식물/정원"]++; hobby_cnt["요리"]++; 
                }
                else{ 
                    hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++; hobby_cnt["스포츠"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["뮤지컬/공연"]++; 
                    hobby_cnt["여행/투어/탐방"]++; hobby_cnt["게임"]++; 
                }
                break;
            case 7 : 
                question.innerHTML="혹시 평소 성격이 조금 게으른 편인가요?";
                op1.innerHTML="yes";
                op2.innerHTML="no";
                if(op==1){
                    hobby_cnt["공예/만들기"]++; hobby_cnt["그림"]++; hobby_cnt["패션"]++; hobby_cnt["영화/드라마"]++; hobby_cnt["요가/필라테스"]++; 
                    hobby_cnt["박물관/미술관"]++; hobby_cnt["사진"]++; hobby_cnt["수집"]++; 
                    hobby_cnt["걷기/달리기"]++; hobby_cnt["일기/일기/다이어리꾸미기"]++; hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++; hobby_cnt["식물/정원"]++; hobby_cnt["요리"]++; 
                    hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++;
                }
                else{ 
                    hobby_cnt["등산"]++; hobby_cnt["자전거"]++; hobby_cnt["스포츠"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["뮤지컬/공연"]++; 
                    hobby_cnt["여행/투어/탐방"]++; hobby_cnt["게임"]++; 
                }
                break;
            case 8 : 
                question.innerHTML="취미 생활을 위한 여유공간이 있나요?";
                op1.innerHTML="있다";
                op2.innerHTML="없다";
                if(op==1){
                    hobby_cnt["사진"]++; hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++; hobby_cnt["영화/드라마"]++; hobby_cnt["게임"]++; 
                }
                else{ 
                    hobby_cnt["등산"]++; hobby_cnt["자전거"]++; hobby_cnt["스포츠"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["뮤지컬/공연"]++; hobby_cnt["여행/투어/탐방"]++;
                    hobby_cnt["공예/만들기"]++; hobby_cnt["그림"]++; hobby_cnt["패션"]++; hobby_cnt["요가/필라테스"]++; hobby_cnt["박물관/미술관"]++; hobby_cnt["수집"]++; 
                    hobby_cnt["걷기/달리기"]++; hobby_cnt["일기/일기/다이어리꾸미기"]++; hobby_cnt["식물/정원"]++; hobby_cnt["요리"]++; hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++;
                }
                break;
            case 9 : 
                question.innerHTML="자기 관리의 목적으로 취미를 얻고 싶으신가요?";
                op1.innerHTML="yes";
                op2.innerHTML="no";
                if(op==1){
                    hobby_cnt["공예/만들기"]++; hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++; hobby_cnt["패션"]++; hobby_cnt["요가/필라테스"]++; 
                    hobby_cnt["식물/정원"]++; hobby_cnt["요리"]++; hobby_cnt["수집"]++; 
                }
                else{ 
                    hobby_cnt["등산"]++; hobby_cnt["자전거"]++; hobby_cnt["스포츠"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["뮤지컬/공연"]++; hobby_cnt["여행/투어/탐방"]++;
                    hobby_cnt["그림"]++;hobby_cnt["박물관/미술관"]++; hobby_cnt["걷기/달리기"]++; hobby_cnt["일기/일기/다이어리꾸미기"]++;
                    hobby_cnt["사진"]++; hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++; hobby_cnt["영화/드라마"]++; hobby_cnt["게임"]++; 
                }
                break;
            case 10 : 
                question.innerHTML="학원, 강의 등 전문적으로 배우고 싶나요?";
                op1.innerHTML="yes";
                op2.innerHTML="no";
                if(op==1){
                    hobby_cnt["걷기/달리기"]++; hobby_cnt["일기/일기/다이어리꾸미기"]++; hobby_cnt["등산"]++; hobby_cnt["자전거"]++; hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++;
                    hobby_cnt["요리"]++; 
                }
                else{ 
                    hobby_cnt["공예/만들기"]++; hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++; hobby_cnt["패션"]++; hobby_cnt["요가/필라테스"]++; 
                    hobby_cnt["식물/정원"]++; hobby_cnt["수집"]++;  hobby_cnt["스포츠"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["뮤지컬/공연"]++; hobby_cnt["여행/투어/탐방"]++;
                    hobby_cnt["그림"]++;hobby_cnt["박물관/미술관"]++; hobby_cnt["사진"]++; hobby_cnt["영화/드라마"]++; hobby_cnt["게임"]++;
                }
                break;
            case 11 : 
                question.innerHTML="손재주가 좋다는 말을 자주 듣거나 그렇게 생각하나요?";
                op1.innerHTML="yes";
                op2.innerHTML="no";
                if(op==1){
                    hobby_cnt["요리"]++; hobby_cnt["스포츠"]++; hobby_cnt["그림"]++;
                    hobby_cnt["공예/만들기"]++; hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++; hobby_cnt["패션"]++; hobby_cnt["요가/필라테스"]++;
                }
                else{ 
                    hobby_cnt["식물/정원"]++; hobby_cnt["수집"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["뮤지컬/공연"]++; hobby_cnt["여행/투어/탐방"]++;
                    hobby_cnt["박물관/미술관"]++; hobby_cnt["사진"]++; hobby_cnt["영화/드라마"]++; hobby_cnt["게임"]++;
                    hobby_cnt["걷기/달리기"]++; hobby_cnt["일기/일기/다이어리꾸미기"]++; hobby_cnt["등산"]++; hobby_cnt["자전거"]++; 
                    hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++;
                }
                break;
            default : 
                if(op==1){
                    hobby_cnt["공예/만들기"]++; hobby_cnt["그림"]++; hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++; hobby_cnt["패션"]++; 
                    hobby_cnt["일기/일기/다이어리꾸미기"]++; hobby_cnt["요리"]++; hobby_cnt["식물/정원"]++; hobby_cnt["사진"]++; 
                }
                else{ 
                    hobby_cnt["수집"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["뮤지컬/공연"]++; hobby_cnt["여행/투어/탐방"]++; hobby_cnt["박물관/미술관"]++; 
                    hobby_cnt["영화/드라마"]++; hobby_cnt["게임"]++; hobby_cnt["걷기/달리기"]++; hobby_cnt["등산"]++; hobby_cnt["자전거"]++; 
                    hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++; hobby_cnt["스포츠"]++; hobby_cnt["요가/필라테스"]++;
                }
                let max=0;
                let cnt=0;
                let result=0;
                for (var key in hobby_cnt) {
                    if(hobby_cnt[key]>max){ max=hobby_cnt[key]; result=cnt;}
                    cnt++;
                }
                location.href=`./result.php?op=${result}`;
                break;
        }
        if(Q_count!=Max_qc){
            Q_count++;
            q_num.innerHTML="Q"+Q_count.toString();
            pro.value = Q_count*10;
            pro_num.innerHTML=Q_count.toString() + "/" + Max_qc.toString();
        }
    }