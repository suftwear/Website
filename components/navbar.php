<?php require_once("include.php"); ?>
<!-- Navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">
                <img src="img/logo_green.png" alt="Vlakbijles" class="navbar-logo">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right">

                <?php if ($logged_in) { ?>

                <li><a href="profile.html">Mijn profiel</a></li>
                <li><a href="logout.php">Uitloggen</a></li>

                <?php } else { ?>

                <li><a href="#" data-toggle="modal" data-target="#registermodal">Registreren</a></li>
                <li><a href="#" data-toggle="modal" data-target="#loginmodal">Inloggen</a></li>

                <?php } ?>

            </ul>
        </div>
    </div>
</nav>
