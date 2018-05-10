<div class="container pt-5">
    <h2>로그인</h2>
    <hr>
    <div class="row">
        <form class="col-12" action="/control/user/login_req" method="post">
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">아이디</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="userid" placeholder="아이디" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">비밀번호</label>
                <div class="col-10">
                    <input class="form-control" type="password" name="userpw" placeholder="비밀번호" required>
                </div>
            </div>
            <div>
                <button class="btn btn-primary float-right">Login</button>
            </div>
        </form>
    </div>
</div>
