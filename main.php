
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Home</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="assets/images/ricardo.jpg" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Codinglab</span>
                    <span class="profession">Web developer</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="main.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="import.php">
                            <i class='bx bx-import icon' ></i>
                            <span class="text nav-text">Importar</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="export.php">
                            <i class='bx bx-export icon' ></i>
                            <span class="text nav-text">Exportar</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="import_praia.php">
                            <i class='bx bx-water icon'></i>
                            <span class="text nav-text">Inserir praia</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="historico.php">
                            <i class='bx bx-history icon' ></i>
                            <span class="text nav-text">Histórico</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="nadadores.php">
                            <i class='bx bxs-bookmark-star icon'></i>
                            <span class="text nav-text">Preferências</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="gestao_utilizadores.php">
                            <i class='bx bxs-user-detail icon'></i>
                            <span class="text nav-text">Utilizadores</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>
    
    


</html>