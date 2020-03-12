<nav class="navbar navbar-expand-lg navbar-dark  position-absolute" style="z-index: 9;
width: 100%">
    <div class="container">
        <a class="navbar-brand" style="color: #05a081" href="<?= URLROOT; ?>"><?= strtoupper(SITENAME); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" style="font-family: 'Quicksand', sans-serif" href="<?= URLROOT; ?>">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                        <a class="nav-link text-white"  style="font-family: 'Quicksand', sans-serif;" href="<?= URLROOT; ?>/pages/login">Login</a>
                    </li>
            </ul>
        </div>
    </div>
</nav>