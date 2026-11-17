 <?= $this->extend('layouts/default') ?>

    <?= $this->section('content') ?>
    <div class="container mt-4">

        <div class="card">
            <div class="card-header d-flex justify-content-center align-items-center">
                <h1>Login</h1>
            </div>
            <div class="card-body">
                <form action="<?= base_url('auth/dologin') ?>" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password: </label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Login</button>
                    <p>Don't have an account? <a href="register">Register</a></p>
                </form>

                <?php if ($errors = session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php if (is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                                <li><?= esc($error) ?></li>
                        
                        <?php endforeach; ?>

                    </ul>
                <?php else:?>
                    <?= esc($errors)?>
                <?php endif; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            

            <?php endif; ?>
            </div>
        </div>

        <?= $this->endSection() ?>