    let Q_count=1;
    let Max_qc = 10;

    var hobby_cnt ={
    "일기/다이어리꾸미기":0, "여행/투어/탐방":0, "게임":0,"요리":0,"수집":0,"식물/정원":0,"독서(소설, 자기계발서, 판타지 등)":0,"영화/드라마":0,"음악/콘서트":0,
    "뮤지컬/공연":0, "박물관/미술관":0, "걷기/달리기":0,"등산":0,"자전거":0,"스포츠":0,"요가/필라테스":0,"공예/만들기":0,"그림":0,"노래/작사/작곡":0,"악기":0,
    "사진":0,"패션":0,};

    let q_num = document.getElementsByClassName("question")[0];
    let question = document.getElementsByClassName("question2")[0];
    let op1=document.getElementsByClassName("option")[0];
    let op2=document.getElementsByClassName("option")[1];
    let img = document.getElementsByClassName("test_img")[0];
    let pro = document.getElementById("pro");
    let pro_num = document.getElementsByClassName("p_num")[0];

    function Select_op(op)
    {
        switch(Q_count){
            case 1 : 
                question.innerHTML="여유시간어느정도?";
                op1.innerHTML="장기간 ";
                op2.innerHTML="단기간";
                    if(op==1){
                        hobby_cnt["일기/일기/다이어리꾸미기"]++; hobby_cnt["게임"]++; hobby_cnt["요리"]+=2; hobby_cnt["수집"]+=3; 
                        hobby_cnt["독서(소설, 자기계발서, 판타지 등)"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["스포츠"]++; hobby_cnt["요가/필라테스"]++; 
                        hobby_cnt["공예/만들기"]++; hobby_cnt["그림"]++; hobby_cnt["노래/작사/작곡"]+=5; hobby_cnt["악기"]++; hobby_cnt["패션"]++; 
                    }
                    else{ 
                        hobby_cnt["여행/투어/탐방"]++; hobby_cnt["식물/정원"]++; hobby_cnt["음악/콘서트"]++; hobby_cnt["뮤지컬/공연"]+=3; 
                        hobby_cnt["박물관/미술관"]++; hobby_cnt["자전거"]++; hobby_cnt["스포츠"]++; hobby_cnt["요가/필라테스"]++; 
                        hobby_cnt["공예/만들기"]++; hobby_cnt["사진"]++; hobby_cnt["노래/작사/작곡"]++; hobby_cnt["악기"]++; hobby_cnt["패션"]++; 
                    }
                break;
            case 2 : 
                question.innerHTML="어느정도 기간 선호?";
                op1.innerHTML="넉넉함";
                op2.innerHTML="적음";
                break;
            case 3 : 
                question.innerHTML="지갑사정?";
                op1.innerHTML="부유하다 ";
                op2.innerHTML="가난하다";
                break;
            case 4 : 
                question.innerHTML="분위기?";
                op1.innerHTML="잔잔 ";
                op2.innerHTML="소란";
                break;
            case 5 : 
                question.innerHTML="인원수?";
                op1.innerHTML="혼자 ";
                op2.innerHTML="다수";
                break;
            case 6 : 
                question.innerHTML="혹시.. 좀.. 귀찮은..편.?";
                op1.innerHTML="응";
                op2.innerHTML="별로";
                break;
            case 7 : 
                question.innerHTML="여유공간?";
                op1.innerHTML="있음";
                op2.innerHTML="없음";
                break;
            case 8 : 
                question.innerHTML="여유시간어느정도?";
                op1.innerHTML="넉넉함";
                op2.innerHTML="적음";
                break;
            case 9 : 
                question.innerHTML="여유시간어느정도?";
                op1.innerHTML="넉넉함";
                op2.innerHTML="적음";
                break;
            default : 
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