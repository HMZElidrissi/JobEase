<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobEase</title>
    <link rel="stylesheet" href="assets/dashboard/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <style>
        button {
            padding: 0;
            border: none;
            background-color: transparent;
            font-weight: inherit;
        }
    </style>
<body>
    <div class="wrapper">
        <?php include("partials/_sidebar.php"); ?>
        <div class="main">
            <?php include("partials/_navbar.php"); ?>
            <section class="Agents px-4">
                <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addModal">+ Add Job</button>
                <table class="agent table align-middle bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($jobs as $job): ?>
                        <tr class="freelancer">
                            <td>
                                <?php
                                if ($job->image) {
                                    $imageSrc = 'data:image/jpeg;base64,' . base64_encode($job->image);
                                } else {
                                    $imageSrc = 'https://mdbootstrap.com/img/new/avatars/8.jpg';
                                }
                                ?>
                                <img src="<?= $imageSrc ?>" alt="Job Image" style="width: 45px; height: 45px" class="rounded-circle" />
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?= $job->title ?></p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?= $job->description ?></p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?= $job->location ?></p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?= $job->company ?></p>
                            </td>
                            <td class="f_position">
                                <?= $job->is_active ? 'Active' : 'Inactive' ?>
                            </td>
                            <td>
                                <form method="post" action="/jobs/delete">
                                    <input type="hidden" name="jobId" value="<?= $job->id ?>">
                                    <button type="submit" name="delete">
                                        <img src="assets/dashboard/img/user-x.svg" alt="DELETE">
                                    </button>
                                </form>
                                <img class="ms-2 edit" src="assets/dashboard/img/edit.svg" alt="EDIT" data-bs-toggle="modal" data-bs-target="#modal<?= $job->id ?>">
                                <div class="modal" id="modal<?= $job->id ?>">
                                    <div class="modal-content" >
                                        <form id="editForm" method="POST" action="/jobs/update" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $job->id ?>">
                                            <div class="mb-4">
                                                <label class="form-label">Image</label>
                                                <input name="image" type="file" class="form-control image">
                                                <?php
                                                if ($job->image) {
                                                    $imageSrc = 'data:image/jpeg;base64,' . base64_encode($job->image);
                                                } else {
                                                    $imageSrc = 'https://mdbootstrap.com/img/new/avatars/8.jpg';
                                                }
                                                ?>
                                                <img src="<?= $imageSrc ?>" alt="Job Image" style="width: 100px; height: 100px"/>
                                            </div>
                                            <!-- Text input -->
                                            <input type="hidden" class="id" value="<?= $job->id ?>">
                                            <div class="mb-4">
                                                <label class="form-label">Title</label>
                                                <input name="title" type="text" class="form-control title_user" value="<?= $job->title ?>">
                                            </div>
                                            <!-- Message input -->
                                            <div class=" mb-4">
                                                <label class="form-label">Description</label>
                                                <textarea name="description" class="form-control position"  rows="3" ><?= $job->description ?></textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Location</label>
                                                <input name="location" type="text" class="form-control location" value="<?= $job->location ?>">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Company</label>
                                                <input name="company" type="text" class="form-control company" value="<?= $job->company ?>">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Status</label>
                                                <select name="is_active" class="form-select status" aria-label="Default select example">
                                                    <option value="1" <?= $job->is_active ? 'selected' : '' ?>>Active</option>
                                                    <option value="0" <?= !$job->is_active ? 'selected' : '' ?>>Inactive</option>
                                                </select>
                                            </div>

                                            <!-- Submit button -->
                                            <div class="d-flex w-100 justify-content-center">
                                                <p class="error text-danger"></p>
                                                <button name="update" type="submit" class="btn btn-success btn-block mb-4 me-4 save">Save Edit</button>
                                                <a href="/jobs" class="btn btn-danger btn-block mb-4 annuler">Annuler</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal" id="addModal">
                                    <div class="modal-content" >
                                        <form id="addForm" method="POST" enctype="multipart/form-data" action="/jobs/add">
                                            <div class="mb-4">
                                                <label class="form-label">Image</label>
                                                <input name="image" type="file" class="form-control image">
                                            </div>
                                            <!-- Text input -->
                                            <div class="mb-4">
                                                <label class="form-label">Title</label>
                                                <input name="title" type="text" class="form-control title_user"">
                                            </div>
                                            <!-- Message input -->
                                            <div class=" mb-4">
                                                <label class="form-label">Description</label>
                                                <textarea name="description" class="form-control position"  rows="3" ></textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Location</label>
                                                <input name="location" type="text" class="form-control location"">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Company</label>
                                                <input name="company" type="text" class="form-control company"">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Status</label>
                                                <select name="is_active" class="form-select status" aria-label="Default select example">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>

                                            <!-- Submit button -->
                                            <div class="d-flex w-100 justify-content-center">
                                                <p class="error text-danger"></p>
                                                <button name="add" type="submit" class="btn btn-success btn-block mb-4 me-4 save">Save</button>
                                                <a href="/jobs" class="btn btn-danger btn-block mb-4 annuler">Annuler</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
            <!-- edit modal -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <script src="assets/dashboard/dashboard.js"></script>
        <script src="assets/dashboard/agents.js"></script>
</body>

</html>