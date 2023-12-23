<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        JobEase
    </title>

    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="https://kit.fontawesome.com/a2f2595567.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#">
                <i class="fas fa-code"></i>
                <h1>JobEase &nbsp &nbsp</h1>
            </a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><?php echo $lang['home']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo $lang['features']; ?></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?lang=fr">FR</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?lang=en">EN</a>
                    </li>

                    <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php /*echo $lang['language']; */?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?lang=fr">FR</a>
                            <a class="dropdown-item" href="?lang=en">EN</a>
                        </div>
                    </li>-->

                    <li class="nav-item">
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <form action="/logout" method="post">
                                <input type="hidden" name="logout">
                                <button name="logout" type="submit" class="btn btn-primary"><?php echo $lang['logout']; ?></button>
                            </form>
                        <?php else : ?>
                            <a class="nav-link" href="/login"><?php echo $lang['login'] ?></a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section class="search" >
    <h2><?php echo $lang['find_your_dream_job'] ?></h2>
    <form  action="/jobs/search" method="get" class="form-inline">
        <div class="form-group mb-2">
            <input type="text" id="keywords" placeholder="<?= $lang['keywords'] ?>">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" id="location" placeholder="<?= $lang['location'] ?>">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" id="company" placeholder="<?= $lang['company'] ?>">
        </div>
        <button type="button" id="searchBtn" class="btn btn-primary mb-2"><?= $lang['search'] ?></button>
    </form>
</section>

<section class="light">
    <h2 class="text-center py-3"><?php echo $lang['latest_job_listings']; ?></h2>
    <div class="container py-2" id="results">
        <?php foreach ($jobs as $job): ?>
            <article class="postcard light green">
                <a class="postcard__img_link" href="#">
                    <?php
                    if ($job->image) {
                        $imageSrc = 'data:image/jpeg;base64,' . base64_encode($job->image);
                    } else {
                        $imageSrc = 'https://picsum.photos/300/300';
                    }
                    ?>
                    <img class="postcard__img" src="<?= $imageSrc ?>" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h3 class="postcard__title green"><a href="#"><?= $job->title ?></a></h3>
                    <div class="postcard__subtitle">
                        <ul class="postcard__tagbox" style="list-style: none;">
                            <li class="tag__item play">
                                <a href="#"><?= $job->created_at ?></a>
                            </li>
                            <li class="tag__item play">
                                <a href="#"><?= $job->company ?></a>
                            </li>
                            <li class="tag__item play">
                                <a href="#"><?= $job->location ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="postcard__preview-txt">
                        <?= $job->description ?>
                        <form action="/applications/apply" method="post">
                            <input type="hidden" name="job_id" value="<?= $job->id ?>">
                            <button type="submit" name="apply" class="btn btn-primary mt-2">
                                <?php echo ($applicationController->isApplied($job->id)) ? $lang['applied'] : $lang['apply_now']; ?>
                            </button>
                        </form>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<footer>
    <p><?php echo $lang['footer']; ?></p>
</footer>
<script src="assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>
