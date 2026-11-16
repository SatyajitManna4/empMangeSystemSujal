<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>


<main class="container mt-4">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Employee Management Portal</h1>
            <a href="<?= base_url('employee-add') ?>" class="btn btn-primary ">Add Employee</a>
        </div>

        <div class="card-body">

            <?php
            if (session()->getFlashdata('status')) {
                echo "<h4>" . session()->getFlashdata('status') . "</h4>";
            }
            ?>
            <table class="table table-striped container text-center">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Designation</th>
                        <th>Salary</th>
                        <th>Access Level</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach (($employee ?? []) as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['designation'] ?></td>
                            <td><?= $row['salary'] ?></td>
                            <td><?= $row['access_level'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td>
                                <a href="<?= base_url('employee/edit/' . $row['id']) ?>" class="btn btn-success">Edit</a>
                                <a href="<?= base_url('employee/delete/' . $row['id']) ?>" class="btn btn-danger">Delete</a>
                                <a href="<?= base_url('employee/view-user/'.$row['id']) ?>" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?= $this->endSection() ?>