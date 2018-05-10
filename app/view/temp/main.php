<?php
  if(!isset($_SESSION['user'])){
    move("/view/user/login");
  }
  $path = isset($_GET['path']) ? $_GET['path'] : 0;
  $sql = "SELECT path FROM files WHERE idx='{$path}'";
  $up = $db->query($sql)->fetch()[0];
  if(isset($_GET['i'])){
    header("location: /control/user/down_req?i={$_GET['i']}");
  }
  if(isset($_GET['q'])){
    header("location: /control/user/down_req?q={$_GET['q']}");
  }
?>
<div class="container pt-5">
    <h2>파일관리</h2>
    <hr>
    <h5 class="mt-5">디렉토리
        <form class="form-inline float-right" action="/control/user/mk_dir" method="post">
            <div class="input-group input-group-sm ml-sm-2">
                <div class="input-group-prepend">
                    <a href="#" class="btn btn-outline-success btn-sm">현재 디렉토리</a>
                </div>
                <input type="text" class="form-control is-valid" value="/home" readonly>
                <input type="hidden" name="path" value="<?=$path?>">
                <input type="text" class="form-control is-valid" name="folder-name" pattern='^[^\\\/:\*\?<>|"]+$' title="\  *  : ? <> |로는 생성할 수 없습니다." required>
            </div>
            <button class="btn btn-outline-success btn-sm ml-sm-2">디렉토리 생성</button>
        </form>
    </h5>
    <table class="table table-hover table-bordered mt-3">
        <thead>
        <tr>
            <th>파일/디렉토리명</th>
            <th>크기</th>
            <th>종류</th>
            <th>생성일</th>
            <th>수정일</th>
            <th>기능(이름 변경, 삭제)</th>
        </tr>
        </thead>
        <tbody>
          <?php
            if($path != 0){
          ?>
          <tr>
              <td colspan="2"><a href="/?path=<?=$up?>">..</a></td>
              <td>디렉토리</td>
              <td>2018-03-19</td>
              <td>2018-03-20</td>
              <td>
                  <!-- <a href="#" class="btn btn-sm btn-primary">수정</a>
                  <a href="#" class="btn btn-sm btn-danger">삭제</a> -->
              </td>
          </tr>
        <?php }?>
        <?php
          $sql = "SELECT * FROM files WHERE path='{$path}' and u_idx='{$_SESSION['user']['idx']}' and folder=1";
          $re = $db->query($sql);
          foreach ($re as $data) {
        ?>
          <tr>
              <td><a href="/?path=<?=$data['idx']?>"><?=$data['f_name']?></a></td>
              <td><?php
                if($data['folder'] == 1){
                  print(mb(get_size($data['size'],$db)));
                }?>MB</td>
              <td>디렉토리</td>
              <td><?=$data['wdate']?></td>
              <td><?=$data['edate']?></td>
              <td>
                  <a href="/view/user/modify_f1?idx=<?=$data['idx']?>" class="btn btn-sm btn-primary">수정</a>
                  <a href="/control/user/all_del?idx=<?=$data['idx']?>&f_remove=<?="y"?>" class="btn btn-sm btn-danger">삭제</a>
              </td>
          </tr>
        <?php }?>
        </tbody>
    </table>
    <h5 class="mt-5">파일
        <form class="form-inline float-right" action="/control/user/upload_req" method="post" enctype="multipart/form-data">
            <div class="input-group input-group-sm ml-sm-2">
                <div class="input-group-prepend">
                    <a href="#" class="btn btn-outline-success btn-sm">현재 디렉토리</a>
                </div>
                <input type="text" class="form-control is-valid" value="/home" readonly>
                <input type="file" class="form-control is-valid" name="myfile" required>
                <input type="hidden" name="path" value="<?=$path?>">
            </div>
            <button class="btn btn-outline-success btn-sm ml-sm-2">파일 업로드</button>
        </form>
    </h5>
    <table class="table table-hover table-bordered mt-3">
        <thead>
        <tr>
            <th>파일/디렉토리명</th>
            <th>크기</th>
            <th>종류</th>
            <th>생성일</th>
            <th>수정일</th>
            <th>기능(내부공유, 외부공유, 이름 변경, 삭제)</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM files WHERE path='{$path}' and u_idx='{$_SESSION['user']['idx']}' and folder=0 ORDER BY folder desc ,f_name ASC";
            $rs = $db->query($sql);
            foreach ($rs as $data) {
          ?>
          <tr>
              <td><a href="/control/user/down_req?idx=<?=$data['idx']?>"><?=$data['f_name']?></a></td>
              <td><?=mb($data['size'])?>MB</td>
              <td>파일</td>
              <td><?=$data['wdate']?></td>
              <td><?=$data['edate']?></td>
              <td>
                <a href="/control/user/inside_req?idx=<?=$data['idx']?>" onclick="return confirm('내부 인원에게 공유하시겠습니까?')" class="btn btn-sm btn-secondary">내부공유</a>
                <a href="/control/user/outside_req?idx=<?=$data['idx']?>" class="btn btn-sm btn-secondary">외부공유</a>
                <a href="/view/user/modify_f1?idx=<?=$data['idx']?>" class="btn btn-sm btn-primary">수정</a>
                <a href="/control/user/all_del?idx=<?=$data['idx']?>&f_remove=<?="n"?>" class="btn btn-sm btn-danger">삭제</a>
              </td>
          </tr>
      <?php }?>
        </tbody>
    </table>

</div>
