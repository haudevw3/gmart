<div class="container-fluid d-flex">
    <div class="col-6 bg-image" style="height: 700px"></div>
    <div class="col-6 center-items">
        <div class="col-6 form-register">
            <div class="text-title-one mb-3">Đăng ký</div>
            <form method="post" action="<?php echo route('register-info') ?>">
                <div class="form-group mb-3">
                    <i class="style-icon-one fa-regular fa-user"></i>
                    <input type="text" class="form-control style-input-one <?php echo error('fullname') ? 'is-invalid' : 'is-valid'?>" name="fullname" placeholder="Họ và tên" value="<?php echo old('fullname') ?? old('fullname') ?>" required>
                    <div class="<?php echo error('fullname') ? 'invalid-feedback' : 'valid-feedback'?>"><?php echo error('fullname') ?? error('fullname') ?></div>
                </div>
                <div class="form-group mb-3">
                    <i class="style-icon-one fa-regular fa-user"></i>
                    <input type="text" class="form-control style-input-one <?php echo error('username') ? 'is-invalid' : 'is-valid'?>" name="username" placeholder="Tên đăng nhập" value="<?php echo old('username') ?? old('username') ?>" required>
                    <div class="<?php echo error('username') ? 'invalid-feedback' : 'valid-feedback'?>"><?php echo error('username') ?? error('username') ?></div>
                </div>
                <div class="form-group mb-3">
                    <i class="style-icon-one fa-regular fa-phone"></i>
                    <input type="text" class="form-control style-input-one <?php echo error('phone') ? 'is-invalid' : 'is-valid'?>" name="phone" placeholder="Số điện thoại" value="<?php echo old('phone') ?? old('phone') ?>" required>
                    <div class="<?php echo error('phone') ? 'invalid-feedback' : 'valid-feedback'?>"><?php echo error('phone') ?? error('phone') ?></div>
                </div>
                <div class="form-group mb-3">
                    <i class="style-icon-one fa-regular fa-envelope"></i>
                    <input type="email" class="form-control style-input-one <?php echo error('email') ? 'is-invalid' : 'is-valid'?>" name="email" placeholder="Email" value="<?php echo old('email') ?? old('email') ?>" required>
                    <div class="<?php echo error('email') ? 'invalid-feedback' : 'valid-feedback'?>"><?php echo error('email') ?? error('email') ?></div>
                </div>
                <div class="form-group mb-3">
                    <i class="style-icon-one fa-regular fa-lock"></i>
                    <input type="password" class="form-control style-input-one <?php echo error('password') ? 'is-invalid' : 'is-valid'?>" name="password" placeholder="Mật khẩu" value="<?php echo old('password') ?? old('password') ?>" required>
                    <div class="<?php echo error('password') ? 'invalid-feedback' : 'valid-feedback'?>"><?php echo error('password') ?? error('password') ?></div>
                </div>
                <div class="col-12 mb-3">
                    <button type="submit" class="col-12 btn style-btn-one bg-color-blue-one">Đăng ký</button>
                </div>
                <div class="col-12 text-center">
                    <span class="text-color-gray-one">Đã có tài khoản?</span>
                    <a class="text-link-one" href="<?php echo route('login-page') ?>">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
</div>