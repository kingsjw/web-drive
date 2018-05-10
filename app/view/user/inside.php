<?php
  $sql = "SELECT * FROM inside";
  $rs = $db->query($sql);

  $sql = "SELECT * FROM inside WHERE u_idx='{$_SESSION['user']['idx']}'";
  $row = $db->query($sql);
?>
<form class="container pt-5" action="/control/user/inside_remove" method="post">
    <h2>내부공유 목록</h2>
    <hr>
    <h5 class="mt-5">
        <button class="btn btn-outline-danger btn-sm">공유삭제</button>
        <div class="form-inline float-right">
            <div class="input-group input-group-sm ml-sm-2">
                <div class="input-group-prepend">
                    <a href="#" class="btn btn-outline-success btn-sm">전체 개수</a>
                </div>
                <input type="text" class="form-control is-valid text-center" style="width: 40px;" value="<?=$rs->rowCount()?>" readonly>
            </div>
            <div class="input-group input-group-sm ml-sm-2">
                <div class="input-group-prepend">
                    <a href="#" class="btn btn-outline-success btn-sm">내가 공유한 개수</a>
                </div>
                <input type="text" class="form-control is-valid text-center" style="width: 40px;" value="<?=$row->rowCount()?>" readonly>
            </div>
        </div>
    </h5>
    <table class="table table-hover table-bordered mt-3">
        <thead>
        <tr>
            <th><input type="checkbox" id="check" name="ch[]"></th>
            <th>파일명</th>
            <th>파일용량</th>
            <th>공유자(이름, 아이디)</th>
            <th>공유일</th>
            <th>다운로드 횟수</th>
            <th>다운로드 주소</th>
        </tr>
        </thead>
        <tbody>
        <?php
          foreach ($rs as $data) {
            $sql = "SELECT * FROM files WHERE idx='{$data['f_idx']}'";
            $f = $db->query($sql)->fetch();
        ?>
          <tr>
              <td>
                <?php
                  if($_SESSION['user']['idx'] == $data['u_idx'] || $_SESSION['user']['userlevel'] == "관리자"){
                ?>
                  <input type="checkbox" name="ch[]" value="<?=$data['idx']?>">
                <?php }?>
              </td>
              <td><?=$f['f_name']?></td>
              <td><?=mb($f['size'])?>MB</td>
              <?php
                $sql = "SELECT * FROM member WHERE idx='{$data['u_idx']}'";
                $mm = $db->query($sql)->fetch();
              ?>
              <td><?=$mm['username']?>, <?=$mm['userid']?></td>
              <td><?=$data['wdate']?></td>
              <td><?=$data['down_cnt']?></td>

              <td><a href="/?i=<?=$data['idx']?>">http://localhost?i=<?=$data['idx']?></a></td>
          </tr>
        <?php }?>
        </tbody>
    </table>
</form>
<script>
  $("#check").on("click",function(){
    if($("#check").prop("checked")){
      $("input[type=checkbox]").prop("checked",true);
    }else {
      $("input[type=checkbox]").prop("checked",false);
    }
  });
</script>
