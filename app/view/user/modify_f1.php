<div class="container pt-5">
    <h2>폴더 수정</h2>
    <hr>
    <div class="row">
        <form class="col-12" action="/control/user/f_modify" method="post">
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">폴더 명</label>
                <div class="col-10">
                    <input type="hidden" name="idx" value="<?=$_GET['idx']?>">
                    <input class="form-control" type="text" name="f-name" placeholder="폴더 명" required>
                </div>
            </div>
            <div>
                <button class="btn btn-primary float-right">수정</button>
            </div>
        </form>
    </div>
</div>
