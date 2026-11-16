<?= $this->extend('layouts/default') ?>

    <?= $this->section('content') ?>
    <div class="container mt-4">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>View Employee</h1>
                <a href="<?= base_url('employee') ?>" class="btn btn-danger float-end">Back</a>
            </div>
            <div class="card-body">
                <form >
                    <div class="mb-3">
                        <label class="form-label">Name: </label>
                        <input type="text" name="name" class="form-control" value="<?= $employee['name'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="email" name="email" class="form-control" value="<?= $employee['email'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone: </label>
                        <input type="text" name="phone" class="form-control" value="<?= $employee['phone'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Designation: </label>
                        <input type="text" name="designation" class="form-control" value="<?= $employee['designation'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Salary: </label>
                        <input type="text" name="salary" class="form-control" value="<?= $employee['salary'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Access Level: </label>
                        <select name="access_level" class="form-select" value="<?= $employee['access_level'] ?>" disabled>
                            <option value="employee">Employee</option>
                            <option value="admin">Admin</option>
                            <option value="hr">HR</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" value="<?= $employee['status'] ?>" disabled>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <!-- <button type="submit" class="btn btn-success">Add Employee</button> -->
                </form>
            </div>
        </div>

        <?= $this->endSection() ?>

