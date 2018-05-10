<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File_Management</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/jquery-ui.min.css">
    <script src="/public/js/jquery-3.3.1.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/jquery-ui.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">웹 하드</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mr-auto">
              <?php if(isset($_SESSION['user']['idx'])){?>
                <a class="nav-item nav-link active" href="/view/temp/main">파일관리</a>
                <a class="nav-item nav-link" href="/view/user/inside">내부공유 목록</a>
                <a class="nav-item nav-link" href="/view/user/outside">외부공유 목록</a>
                <?php if($_SESSION['user']['userlevel'] == "관리자"){?>
                  <a class="nav-item nav-link" href="/view/admin/user_management">회원관리</a>
                <?php }?>
              <?php }?>
            </div>
            <div class="navbar-nav">
              <?php if(isset($_SESSION['user']['idx'])){?>
                <span class="nav-item nav-link text-danger">회원 로그인중</span>
                <a class="nav-item nav-link" href="/control/user/logout">로그아웃</a>
              <?php }else {?>
                <a class="nav-item nav-link" href="/view/user/login">로그인</a>
              <?php }?>
            </div>
        </div>
    </div>
</nav>
