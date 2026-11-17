<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<main class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Employee Management Portal</h1>
            <a href="<?= base_url('employees/add') ?>" class="btn btn-primary">Add Employee</a>
        </div>

        <div class="card-body">
            <?php if (session()->getFlashdata('status')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= esc(session()->getFlashdata('status')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            

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



            <div class="table-responsive">
                <table class="table table-striped text-center align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Designation</th>
                            <th>Salary</th>
                            <th>Access Level</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($employee)): ?>
                            <?php foreach ($employee as $row): ?>
                                <tr>
                                    <td><?= esc($row['id']) ?></td>
                                    <td><?= esc($row['name']) ?></td>
                                    <td><?= esc($row['email']) ?></td>
                                    <td><?= esc($row['phone']) ?></td>
                                    <td><?= esc($row['designation']) ?></td>
                                    <td><?= esc($row['salary']) ?></td>
                                    <td><?= esc($row['access_level']) ?></td>
                                    <td><?= esc($row['status']) ?></td>
                                    <td>
                                        <a href="<?= base_url('employees/view-user/' . $row['id']) ?>" class="btn btn-sm btn-primary">View</a>
                                        <a href="<?= base_url('employees/edit/' . $row['id']) ?>" class="btn btn-sm btn-success">Edit</a>
                                        <a href="<?= base_url('employees/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" class="text-muted">No employees found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
    </table>
            </div>
        </div>
</div>
</main>
<?= $this->endSection() ?>
