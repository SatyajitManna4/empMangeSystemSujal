<?= $this->extend('layouts/default') ?>

    <?= $this->section('content') ?>
    <div class="container mt-4">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Edit Employee</h1>
                <a href="<?= base_url('employee') ?>" class="btn btn-danger float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="<?= base_url('employee/update/'. $employee['id']) ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name: </label>
                        <input type="text" name="name" class="form-control" value="<?= $employee['name'] ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="email" name="email" class="form-control" value="<?= $employee['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone: </label>
                        <input type="text" name="phone" class="form-control" value="<?= $employee['phone'] ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Designation: </label>
                        <input type="text" name="designation" class="form-control" value="<?= $employee['designation'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Salary: </label>
                        <input type="text" name="salary" class="form-control" value="<?= $employee['salary'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Access Level: </label>
                        <select name="access_level" class="form-select" value="<?= $employee['access_level'] ?>">
                            <option value="employee">Employee</option>
                            <option value="admin">Admin</option>
                            <option value="hr">HR</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" value="<?= $employee['status'] ?>">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update Employee</button>
                </form>
            </div>
        </div>

        <?= $this->endSection() ?>

