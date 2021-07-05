<?php
session_start();
$login=$_POST['login'];
$password=$_POST['password'];
$passwordre=$_POST['passwordre'];
$name=$_POST['name'];
$email=$_POST['email'];
//아이디와 패스워드 가려진상태로 가져옴
//$ 변수에 문자열이 들어간 값 

if($login==NULL||$name==NULL||$email==NULL||$password==NULL){//로그인값이 빈칸일 경우
    echo "<script>alert('빈 칸을 모두 입력하세요.') </script>";
    echo "빈 칸을 모두 채워주세요";//출력될 문자열 echo :문자열
    echo"<a href = 회원가입.html>back page</a>";//회원가입창으로 이동 a로 링크삽입
    
    exit();//종료값
}
if($password!=$passwordre){
     echo "<script>alert('비밀번호와 비밀번호의 확인이 다릅니다.') </script>";
    // //스트립트경고창으로 나타낼 문자열
    echo "비밀번호와 비밀번호 확인이 다릅니다.";
    //화면에 보여질 출력될 문자열
    echo "<a href = 회원가입.html>back page</a>";
    exit();
}
$mysqli=mysqli_connect("localhost","root","111111","test2");
//mysql 데이터 베이스 상에서 mysqli사용하는방법
//mysqli_connect의 함수인자 로  
//localhost: DB서버의 IP,아이디,비번,사용할 DB명

$check="SELECT *from user_info WHERE userid ='$login'";
//데이터를 조회하는 명령문, 
//#*기호는 모든내용출력, 특정부분만원하면, #;로작성
//where은 원하는 행만 추출가능 
//select 칼럼이름 from 테이블명 where 조건;
//혹은 select 칼럼이름 from 테이블명 where 칼럼이름='검색할조건';

$result=$mysqli->qurey($check);
//미디어쿼리 결과값을 작성 result에 결과가 들어감
// select에서 쿼리를 실행후 결과값 뽑아내는방법
if($result->num_rows==1)//결과값과 num행이 1개라도 동일하다면
{
    echo "<script>alert('중복된 id입니다.') </script>";
    echo"중복된 id 입니다.";
    // echo "<scrip>alert('중복된 값입니다.')</script>";
    echo"<a href = 회원가입.html>";
    exit();
}
$signup=mysqli_query($mysqli,"INSERT INTO user_info userid, userpw, name, email)
VALUES ('$login',$password,'$name','$email')");
// insert into문은 데이타 베이스테이블에 새로운 레코드를 입력하는 문이다
//qurey문의 경우 쿼리나 명령을 전송할 때 사용되는 문법이다
if($signup){
    echo "<script>alert('로그인이 성공되었습니다.') </script>";
    echo "로그인이 성공되었습니다. ";
}
?>