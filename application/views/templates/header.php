<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= base_url()?>/assets/css/index.css">


    <title><?= $judul?></title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap');

    * {
        font-family: 'Outfit';
    }

    html,
    body {
        background: #FFFFFF;
    }

    .sidebar-item {
        border-radius: 12px;
        padding-left: 16px;
    }

    .sidebar-item.active {
        background-color: rgba(98, 113, 235, .1) !important;
        color: #6271EB;
    }

    .sidebar-item.active span {
        color: #6271EB;
        font-weight: bold;
    }

    .sidebar-item span {
        color: #93989A;
    }

    .sidebar-item.active span {
        color: #6271EB;
        font-weight: bold;
    }

    li.list-group-item {
        border-right: none;
        border-left: none;
        border-color: #EBE9E9;
    }

    .placeholder {
        border-radius: 40px;
    }

    .modal-add .modal-content {
        border-radius: 24px;
        padding: 20px 14px;
    }

    .modal-edit .modal-content {
        border-radius: 24px;
        padding: 14px;
    }
    </style>
</head>

<body>

    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">

            <aside class="sidebar" style="width: 320px;background-color: #F7F9FA;">
                <a href="#" class="sidebar-logo mb-5 justify-content-start">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="<?= base_url()?>/assets/img/global/logo.svg" alt="">
                        <span style="color: #6271EB">Go Plan</span>
                    </div>

                    <button id="toggle-navbar" onclick="toggleNavbar()">
                        <img src="<?= base_url()?>/assets/img/global/navbar-times.svg" alt="">
                    </button>
                </a>

                <!-- <h5 class="sidebar-title">Daily Use</h5> -->

                <a href="<?= base_url()?>" class="sidebar-item <?= ($active == "home") ? "active" : " "?>"
                    onclick=" toggleActive(this)">

                    <img src="<?= base_url()?>/assets/img/global/ic_today.svg" alt="" class="me-2">

                    <span>My Day</span>
                </a>

                <h5 class="sidebar-title" style="color: #010101;">Status</h5>

                <a href="<?= base_url()?>task/completed"
                    class="sidebar-item <?= ($active == "completed") ? "active" : " "?>" onclick="toggleActive(this)">

                    <img src="<?= base_url()?>/assets/img/global/ic_completed.svg" alt="" class="me-3">

                    <span>Completed</span>
                </a>

                <a href="<?= base_url()?>task/inProgress"
                    class="sidebar-item <?= ($active == "inProgress") ? "active" : " "?>" onclick=" toggleActive(this)">

                    <img src="<?= base_url()?>/assets/img/global/ic_inprogress.svg" alt="" class="me-3">

                    <span>In Progress</span>
                </a>

                <a href="<?= base_url()?>task/notStarted"
                    class="sidebar-item <?= ($active == "notStarted") ? "active" : " "?>" onclick="toggleActive(this)">

                    <img src="<?= base_url()?>/assets/img/global/ic_notstarted.svg" alt="" class="me-3">

                    <span>Not Started</span>
                </a>

                <a href="<?= base_url()?>task/pending"
                    class="sidebar-item <?= ($active == "pending") ? "active" : " "?>" onclick="toggleActive(this)">

                    <img src="<?= base_url()?>/assets/img/global/ic_pending.svg" alt="" class="me-3">

                    <span>Pending</span>
                </a>

                <!-- <a href="#" class="sidebar-item mt-auto" onclick="toggleActive(this)">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 17L21 12L16 7" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M21 12H9" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M9 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H9"
                            stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span>Logout</span>
                </a> -->

            </aside>

        </div>