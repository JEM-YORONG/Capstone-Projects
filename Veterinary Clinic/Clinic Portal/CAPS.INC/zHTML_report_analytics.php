<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css files\Capstone_ReportAnalytics.css" />

    <!----===== Icons ===== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--=====Change name mo na lang====-->
    <title>Admin Dashboard Panel</title>
</head>

<body>
    <!--=====Navigation Bar====-->
    <?php require 'nav-bar.html.php'; ?>
    <!--=====Pinaka taas/ title ganon====-->
    <section class="Contents">
        <div class="top">
            <i class="sidebar-toggle"><span class="material-symbols-outlined"> menu </span></i>
            <div class="title">
                <span class="text">Report Analytics</span>
            </div>
        </div>

        <div class="dash-content">
            <!--=====Report Analytics====-->
            <div class="report-analytics">
                <div class="title-report-analytics">
                    <span class="text">Report Analytics</span>
                </div>
                <div class="boxes-report">
                    <div class="box-report box1-report">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Chart</span>
                        <span class="number">0</span>
                    </div>
                    <div class="box-report box2-report">
                        <i class="uil uil-comments"></i>
                        <span class="text">Chart</span>
                        <span class="number">0</span>
                    </div>
                    <div class="box-report box3-report">
                        <i class="uil uil-share"></i>
                        <span class="text">Chart</span>
                        <span class="number">0</span>
                    </div>
                    <div class="box-report box4-report">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Chart</span>
                        <span class="number">0</span>
                    </div>
                    <div class="box-report box5-report">
                        <i class="uil uil-comments"></i>
                        <span class="text">Chart</span>
                        <span class="number">0</span>
                    </div>
                    <div class="box-report box6-report">
                        <i class="uil uil-share"></i>
                        <span class="text">Chart</span>
                        <span class="number">0</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const body = document.querySelector("body"),
            modeToggle = body.querySelector(".mode-toggle");
        sidebar = body.querySelector("nav");
        sidebarToggle = body.querySelector(".sidebar-toggle");

        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            if (sidebar.classList.contains("close")) {
                localStorage.setItem("status", "close");
            } else {
                localStorage.setItem("status", "open");
            }
        });

        function openClientRecords() {
            document.getElementById("viewClientRecord").style.display = "block";
            document.getElementById("viewCustomer").style.display = "none";
            document.getElementById("viewPet").style.display = "none";
        }

        function openCustomer() {
            document.getElementById("viewClientRecord").style.display = "none";
            document.getElementById("viewCustomer").style.display = "block";
            document.getElementById("viewPet").style.display = "none";
        }

        function openFormPets() {
            document.getElementById("viewClientRecord").style.display = "none";
            document.getElementById("viewCustomer").style.display = "none";
            document.getElementById("viewPet").style.display = "block";
        }
    </script>
</body>

</html>