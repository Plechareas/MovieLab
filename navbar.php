<?php
require_once("lazy_session_start.php");
lazy_session_start();
    if(!isset($_SESSION['id'])){ ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="movies.php">MOVIES</a>
            </li>
        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"><img src="logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a href="form.php"><button type="button" class="btn" style="background-color: #75384D; color:white">ACCOUNT</button></a> &nbsp;
            </li>
        </ul>
    </div>
</nav>
<?php
}
?>


<?php
    if(isset($_SESSION['id']) && $_SESSION['accounttype'] == 0){ ?>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="movies.php">MOVIES</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="#"><img src="logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" style="padding-right: 30px; font-size: 19px;"><?php echo $_SESSION['username'] ?></a>
                </li>
                <li class="nav-item">
                <a href="logout.php"><button type="button" class="btn" style="background-color: #75384D; color:white">LOGOUT</button></a> &nbsp;
                </li>
            </ul>
        </div>
    </nav>
    <?php
    }
    ?>

<?php
    if(isset($_SESSION['id']) && $_SESSION['accounttype'] == 1){ ?>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="movies.php">MOVIES</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="#"><img src="logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" style="padding-right: 30px; font-size: 19px;">Admin: <?php echo $_SESSION['username'] ?></a>
                </li>
                <li class="nav-item">
                <a href="editmovies.php"><button type="button" class="btn" style="background-color: #75384D; color:white; font-size: 13px;">EDIT MOVIES</button></a> &nbsp;
                </li>
                <li class="nav-item">
                <a href="adminbooked.php"><button type="button" class="btn" style="background-color: #75384D; color:white; font-size: 13px;">BOOKED</button></a> &nbsp;
                </li>
                <li class="nav-item">
                <a href="stats.php"><button type="button" class="btn" style="background-color: #75384D; color:white; font-size: 13px;">STATS</button></a> &nbsp;
                </li>
                <li class="nav-item">
                <a href="logout.php"><button type="button" class="btn" style="background-color: #75384D; color:white; font-size: 13px;">LOGOUT</button></a> &nbsp;
                </li>
            </ul>
        </div>
    </nav>
    <?php
    }
    ?>
