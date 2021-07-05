<?php
session_start();// 새로운 섹션을 시작하겠다는 생성문구
if(!isset($_SESSION['login']))//변수login이라는 섹션이 만약 존재 하지 않을 경우
{
    header('Location:./만들기.html');

}//세션 변수값이 없다면 로그인상태로 다시 복구

    echo "홈(로그인성공)";

    echo "<a herf=logout.php>로그아웃</a>"
    ?>
<!-- //세션변수값이 있을경우 로그인과, 로그아웃 링크생성 -->
