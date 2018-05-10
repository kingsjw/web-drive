<?php
  if(!isset($_SESSION['user']) || $_SESSION['user']['userlevel'] != "관리자"){
    alert('관리자만 접근할 수 있습니다.');
    back();
  }
?>
<div class="container pt-5">
    <h2>회원관리
    </h2>
    <hr>

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">순번</th>
            <th scope="col">아이디</th>
            <th scope="col">이름</th>
            <th scope="col">회원구분</th>
            <th scope="col">암호</th>
            <th scope="col">기능</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM member";
            $rs = $db->query($sql);
           ?>
           <?php
            $i=1;
            foreach ($rs as $data) {
           ?>
        <tr>
            <th scope="row"><?=$i?></th>
            <td><?=$data['userid']?></td>
            <td><?=$data['username']?></td>
            <td><?=$data['userlevel']?></td>
            <td><?=$data['userpw']?></td>
            <td>
                <a href="/view/admin/user_management?modify_idx=<?=$data['idx']?>" class="btn btn-sm btn-success">수정</a>
                <a href="/control/admin/user_remove?idx=<?=$data['idx']?>" onclick="return confirm('회원을 삭제 하시겠습니까?')" class="btn btn-sm btn-danger">삭제</a>
            </td>
        </tr>
      <?php
      $i++;
      }?>
        </tbody>
    </table>
    <?php
      $action = "/control/admin/member";
      $userid = "";
      $username = "";
      $userlevel = "";
      if(isset($_GET['modify_idx'])){
        $action = "/control/admin/user_management?idx={$_GET['modify_idx']}";
        $sql = "SELECT * FROM member WHERE idx='{$_GET['modify_idx']}'";
        $u = $db->query($sql)->fetch();
        $userid = $u['userid'];
        $username = $u['username'];
        $userlevel = $u['userlevel'];
      }
    ?>
    <h2 class="mt-5">회원 추가/수정</h2>
    <hr>
    <form class="mb-5" action="<?=$action?>" method="post">
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="">아이디</label>
                <input type="text" class="form-control" placeholder="gondr" name="userid" value="<?=$userid?>" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="">이름</label>
                <input type="text" class="form-control" placeholder="최선한" value="<?=$username?>" name="username" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="">회원구분</label>
                <select class="form-control" name="userlevel">
                  <option>관리자</option>
                  <option>사용자</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="">비밀번호</label>
                <input type="text" class="form-control" placeholder="1234" name="userpw" required>
            </div>
        </div>

        <?php if(isset($_GET['modify_idx'])){?>
          <a href='/view/admin/user_management' class="btn btn-success float-right mr-2">수정 취소</a>
          <button class="btn btn-success float-right mr-2">수정</button>
        <?php }else{?>
          <button class="btn btn-primary float-right">추가</button>
        <?php }?>
    </form>
</div>
