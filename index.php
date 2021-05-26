<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Björn's Fakestore Creator!</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="public/css/styles.css" rel="stylesheet" />
        <link href="public/css/styles2.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Masthead-->
        <main  class="masthead2 bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <div class="col-lg-4 col-6 pt-5 d-flex align-items-center flex-column">
                    <img class="masthead-avatar mb-3" src="public/img/avataaars.svg" alt="" />
                </div>
                <!-- Masthead Avatar Image-->
                
                <!-- Masthead Heading-->
                <p class="masthead-subheading font-weight-light mb-0">Welcome to</p>
                <h1 class="masthead-heading text-uppercase mb-0">Björn's Fakestore Creator!</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
            <div id="mainContainer" class="container d-flex align-items-center flex-column">
                <form action="store/" method="post">
                    <label class="text-secondary" for="endpoint">Create a new store:</label>
                    <input type="text" id="endpoint" name="endpoint" class="text-center form-control" required placeholder="API URL here">
                    <input type="submit" class="form-control mt-2 btn btn-outline-secondary" value="Create New Store">
                </form>
                <p class="mt-2">Or visit one below:</p>
            </div>
        </main>
        <!-- Copyright Section-->
        <div class="copyright2 copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Björn Tirsén 2021</small></div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <!-- <script src="js/scripts.js"></script> -->
        <!-- My added JS-->
        <script src="public/js/main.js"></script>
        <script src="public/js/Interface.js"></script>
        <script src="public/js/StoreList.js"></script>
        <script src="public/js/Store.js"></script>
    </body>
</html>
