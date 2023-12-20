<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <table class="agent table align-middle bg-white">
                <thead class="bg-light">
                <tr>
                    <th>Job</th>
                    <th>Candidate</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($applications as $application): ?>
                    <tr class="freelancer">
                        <td>
                            <span class="f_status"><?= $jobController->getJobTitleById($application->job_id) ?></span>
                        </td>
                        <td>
                            <span class="f_status"><?= $userController->getUsernameById($application->user_id) ?></span>
                        </td>
                        <td class="f_position">
                            <?= $application->status ?>
                        </td>
                        <td>
                            <form method="post" action="?route=approve">
                                <input type="hidden" name="jobId" value="<?= $application->id ?>">
                                <button type="submit" name="approve">
                                    Approve
                                </button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="?route=reject">
                                <input type="hidden" name="jobId" value="<?= $application->id ?>">
                                <button type="submit" name="reject">
                                    Reject
                                </button>
                            </form>
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