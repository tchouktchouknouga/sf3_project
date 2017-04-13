<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll" href="/?page=index"><img src="/img/logo.png" alt="logo de Caradvisor"></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
            <li class="hidden">
                <a class="page-scroll" href="#page-top"></a>
            </li>
            <!-- If in index, use the scroll, if not use the link -->
            <?php if($_GET['page'] == "index"): ?>
            <li>
                <a class="page-scroll js-scrollTo" href="#review">Déposer un avis</a>
            </li>
            <?php endif; ?>
            <?php if($_GET['page'] != "index"): ?>
                <li>
                    <a class="page-scroll js-scrollTo" href="/?page=index#review">Déposer un avis</a>
                </li>
            <?php endif; ?>
            <!-- Show inscription btn when on index, or empty url -->
            <?php if($_GET['page'] == "index" || $_GET['page'] == ""): ?>
            <li>
                <a class="page-scroll " href="/?page=inscription">Inscription</a>
            </li>
            <?php endif; ?>
            <?php if($_GET['page'] == "index" || $_GET['page'] == "inscription"): ?>
            <li>
                <a href="#"  data-toggle="modal" data-target="#login-modal">Connexion</a>
            </li>
            <?php endif; ?>
            <li>
                <a class="page-scroll" href="#">Professionnels</a>
            </li>
        </ul>

    </div>
</nav>
<?php include "modalConnection.php"?>
