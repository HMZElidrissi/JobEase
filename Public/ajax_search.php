<?php
// ajax_search.php

require '../config.php';
require __DIR__ . '/../vendor/autoload.php';

use Http\Controllers\JobController;

$controller = new JobController();
$jobs = $controller->search($_GET);

foreach ($jobs as $job) {
    echo '<article class="postcard light green">';
    echo '<a class="postcard__img_link" href="#">';

    if ($job->image) {
        $imageSrc = 'data:image/jpeg;base64,' . base64_encode($job->image);
    } else {
        $imageSrc = 'https://picsum.photos/300/300';
    }

    echo '<img class="postcard__img" src="' . $imageSrc . '" alt="Image Title" />';
    echo '</a>';
    echo '<div class="postcard__text t-dark">';
    echo '<h3 class="postcard__title green"><a href="#">' . $job->title . '</a></h3>';
    echo '<div class="postcard__subtitle">';
    echo '<p>' . $job->created_at . '</p>';
    echo '</div>';
    echo '<div class="postcard__preview-txt">';
    echo $job->description;
    echo '<br>';
    echo '<a href="#"><i class="fas fa-play mr-2"></i>APPLY NOW</a>';
    echo '</div>';
    echo '</div>';
    echo '</article>';
}
