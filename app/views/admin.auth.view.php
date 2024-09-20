<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- include head meta-data -->
        <?php $this->view('includes/head', $data) ?>
    </head>
    <body>

    <div class="login-container">
        <div class="login-box">
        <!-- Company Logo -->
        <div class="text-center logo">
            <img src="<?=ROOT?>/assets/media/icons/logo.png" alt="Yunivolt Logo">
        </div>
        <!-- Company Name -->
        <div class="company-name">Yunivolt Academy</div>
        <?php if(message()):?> 
            <div class="alert alert-danger" role="alert"><?=message('',true)?></div>
        <?php endif;?>
            
        <!-- Admin Login Form -->
        <form class="mt-4" action="<?=ROOT?>/?url=admin/auth" method="POST">
            <div class="mb-3">
            <label for="admin-key" class="form-label">Admin Key</label>
            <input type="text" class="form-control" id="admin-key" name="admin-key" placeholder="Enter your admin key" required>
            </div>

            <div class="mb-3">
            <label for="admin-password" class="form-label">Password</label>
            <input type="password" class="form-control" id="admin-password" name="admin-password" placeholder="Enter your password" required>
            </div>

            <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        </div>
    </div>

    </body>
</html>
