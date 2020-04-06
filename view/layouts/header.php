<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->


    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/loader.css">

    <title>Hello, world!</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/fav.png" type="image/png">
</head>

<body>
    
    <div class="loader-back ">


        <div class="preloader-1">
            <div>Loading</div>
            <span class="line line-1"></span>
            <span class="line line-2"></span>
            <span class="line line-3"></span>
            <span class="line line-4"></span>
            <span class="line line-5"></span>
            <span class="line line-6"></span>
            <span class="line line-7"></span>
            <span class="line line-8"></span>
            <span class="line line-9"></span>
        </div>
    </div>  
    
    

    <div id="navigation">
        <div class="container">
       <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a class="navbar-brand wow bounce" data-wow-duration=".7s" data-wow-delay="1s" href="/" style="visibility: visible; animation-duration: 0.7s; animation-delay: 1s; animation-name: bounce;"><img src="../assets/img/logo.png"  alt="logo"></a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            		<img src="../assets/img/buttom.png"  alt="buttom">
            		</button>


                <div class="navbar-collapse collapse pb-4 pb-lg-0" id="navbarSupportedContent">
                   
                  
                    <ul class="navbar-nav  ml-auto">
                      
                       <?php
                            if($authUser){
                                ?>
                                    <li class="nav-item mr-lg-3 mt-4 mt-lg-0 mb-3 mb-lg-0">
                                        <a class="nav-link button" href="/?page=profile"><?=__('профиль')?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link button" href="?page=logout">
                                        <?=__('вийти')?>
                                        </a>
                                    </li>
                                <?php
                            }else{
                                ?>
                                    <li class="nav-item mr-lg-3 mt-4 mt-lg-0 mb-3 mb-lg-0">
                                        <a class="nav-link button" href="/?page=login">LOG IN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link button" href="?page=register">OPEN ACCOUNT</a>
                                    </li>
                                <?php
                            }
                        ?>
                        
         <li class="nav-item dropdown  mt-3 mt-lg-0 ">
            <a class="nav-link button" href="/?lang=ru" id="navbarDropdown"   >
             ru
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item button" href="/?lang=en">en</a>
            </div>
        </li>
                       
               </ul>         
<!--
                        <li class="nav-item">
                            <a href="/?lang=ru" class="nav-link ">ru</a>
                        </li>
                          <li class="nav-item">
                            <a href="/?lang=en" class="nav-link ">en</a>
                        </li>
-->
<!--
                    </ul>
                        <div class="swicher">
                           <div>
                            <a href="/?lang=ru">ru</a></div>
                            
                             <div>
                            <a href="/?lang=en">en</a></div>
                        </div>
                    
-->
              

                </div>
            </nav>
        </div>
    </div>