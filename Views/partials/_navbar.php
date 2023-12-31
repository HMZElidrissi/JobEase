<nav class="navbar justify-content-space-between pe-4 ps-2">
    <button class="btn open">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar  gap-4">
        <div class="">
            <input type="search" class="search " placeholder="Search">
            <img class="search_icon" src="assets/dashboard/img/search.svg" alt="iconicon">
        </div>
        <!-- <img src="img/search.svg" alt="icon"> -->
        <img class="notification" src="assets/dashboard/img/new.svg" alt="icon">
        <div class="card new w-auto">
            <div class="list-group list-group-light">
                <div class="list-group-item px-3 d-flex justify-content-between align-items-center ">
                    <p class="mt-auto">Notification</p><a href="#"><img src="assets/dashboard/img/settingsno.svg" alt="icon"></a>
                </div>
                <div class="list-group-item px-3 d-flex"><img src="assets/dashboard/img/notif.svg" alt="iconimage">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text mb-3">Some quick example text to build on the card title and make up
                            the bulk of the card's content.</p>
                        <small class="card-text">1  day ago</small>
                    </div>
                </div>
                <div class="list-group-item px-3 d-flex"><img src="assets/dashboard/img/notif.svg" alt="iconimage">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text mb-3">Some quick example text to build on the card title and make up
                            the bulk of the card's content.</p>
                        <small class="card-text">1  day ago</small>
                    </div>
                </div>
                <div class="list-group-item px-3 text-center"><a href="#">View all notifications</a></div>
            </div>
        </div>
        <div class="inline"></div>
        <div class="name">Admin</div>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                    <img src="assets/dashboard/img/photo_admin.svg" alt="icon">
                </a>
                <div class="dropdown-menu dropdown-menu-end position-absolute">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Account Setting</a>
                    <form action="/logout" method="post">
                        <input type="hidden" name="logout">
                        <button name="logout" type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>