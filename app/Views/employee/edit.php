<?= $this->extend('layouts/default') ?>

    <?= $this->section('content') ?>
    <div class="container mt-4">

        <div class="card">
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
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Edit Employee</h1>
                <a href="<?= base_url('employees') ?>" class="btn btn-danger float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="<?= base_url('employees/update/'. esc($employee['id'])) ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label">Name: </label>
                        <input type="text" name="name" class="form-control" value="<?= esc($employee['name']) ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="email" name="email" class="form-control" value="<?= esc($employee['email']) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone: </label>
                        <input type="text" name="phone" class="form-control" value="<?= esc($employee['phone']) ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Designation: </label>
                        <input type="text" name="designation" class="form-control" value="<?= esc($employee['designation']) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Salary: </label>
                        <input type="text" name="salary" class="form-control" value="<?= esc($employee['salary']) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Access Level: </label>
                        <select name="access_level" class="form-select" value="<?= esc($employee['access_level']) ?>">
                            <option value="employee">Employee</option>
                            <option value="admin">Admin</option>
                            <option value="hr">HR</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" value="<?= esc($employee['status']) ?>">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update Employee</button>
                </form>
            </div>
        </div>

        <?= $this->endSection() ?>

