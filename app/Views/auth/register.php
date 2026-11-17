 <?= $this->extend('layouts/default') ?>

    <?= $this->section('content') ?>
    <div class="container mt-4">

        <div class="card">
            <div class="card-header d-flex justify-content-center align-items-center">
                <h1>Register</h1>
            </div>
            <div class="card-body">
                <form action="<?= base_url('register') ?>" method="POST">

                <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label">Name: </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password: </label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Register</button>
                     <p>Already have an account? <a href="login">Register</a></p>
                </form>

                <?php if ($errors = session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php if (is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                                <li><?= esc($error) ?></li>
                        
                        <?php endforeach; ?>

                    </ul>
                <?php endif; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            

            <?php endif; ?>
            </div>
        </div>

        <?= $this->endSection() ?>