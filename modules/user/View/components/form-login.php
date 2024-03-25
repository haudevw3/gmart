<div class="container-fluid d-flex">
    <div class="col-6 bg-image" style="height:700px"></div>
    <div class="col-6 center-items">
        <div class="col-6 form-login">
            <div class="text-title-one mb-3">Đăng nhập</div>
            <div class="<?php echo error('message') ? 'p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3 mb-3' : '' ?>">
                <?php echo error('message') ?? error('message') ?>
            </div>
            <form method="post" action="<?php echo route('login-info') ?>">
                <div class="form-group mb-3">
                    <i class="style-icon-one fa-regular fa-user"></i>
                    <input type="text" class="form-control style-input-one" name="username" value="<?php echo old('username') ?? old('username') ?>" placeholder="Tên đăng nhập hoặc email" required>
                </div>
                <div class="form-group mb-3">
                    <i class="style-icon-one fa-regular fa-lock"></i>
                    <input type="password" class="form-control style-input-one" name="password" value="<?php echo old('password') ?? old('password') ?>" placeholder="Mật khẩu" required>
                </div>
                <div class="mb-3 form-check d-flex justify-content-between">
                    <div>
                        <input type="checkbox" class="form-check-input" id="exampleCheck">
                        <label class="form-check-label text-color-gray-one" for="exampleCheck">Ghi nhớ đăng nhập</label>
                    </div>
                    <a class="text-link-one" href="">Quên mật khẩu</a>
                    </div>
                <div class="col-12 mb-3">
                    <button type="submit" class="col-12 btn style-btn-one bg-color-blue-one">Đăng nhập</button>
                </div>
                <div class="col-12 text-center mb-3">
                    <span class="text-color-gray-one">Chưa có tài khoản?</span>
                    <a class="text-link-one" href="<?php echo route('register-page') ?>">Đăng ký</a>
                </div>
                <div class="col-12 text-center mb-3">
                    <span class="text-color-gray-one">Hoặc</span>
                </div>
                <div class="col-12 mb-3">
                    <button type="submit" class="col-12 btn style-btn-one bg-color-red-one">Đăng nhập bằng Google</button>
                </div>
            </form>
        </div>
    </div>
</div>