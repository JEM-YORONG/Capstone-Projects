<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css files\Capstone_ReportAnalytics.css" />
    <link rel="stylesheet" href="css files\Capstone_ClinicAboutUs copy.css">

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

                <!-- Daily -->
                <?php
                require 'database-conn.php';

                $currentDate = new DateTime();
                $currentDateFormatted = $currentDate->format('Y-m-d');
                // customer
                // get the count of scheduled items where date is the current date
                $query = "SELECT COUNT(*) as count FROM schedule WHERE date = '$currentDateFormatted'";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $dailyCustomers = $row['count'];
                } else {
                    //echo "Error in query: " . mysqli_error($conn);
                }

                // pet
                // get the count of scheduled items where date is the current date
                $query2 = "SELECT petname, petname2, petname3, petname4, petname5 FROM schedule WHERE date = '$currentDateFormatted'";
                $result2 = mysqli_query($conn, $query2);

                if ($result2) {
                    $dailyPets = 0;

                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        // Loop through each column and count the pets
                        foreach ($row2 as $pet) {
                            if (!empty($pet)) {
                                $dailyPets++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // grooming
                // get the count of scheduled items where date is the current date
                $query3 = "SELECT service, service2, service3 FROM schedule WHERE date = '$currentDateFormatted'";
                $result3 = mysqli_query($conn, $query3);

                if ($result3) {
                    $dailyGrooming = 0;

                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        // Loop through each column and count the grooming services
                        foreach ($row3 as $service) {
                            if (!empty($service) && $service == "Grooming") {
                                $dailyGrooming++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }
                ?>

                <br>
                <h2>Daily</h2>
                <div class="boxes-report">
                    <div class="box-report box3-report">
                        <i class="uil uil-share"></i>
                        <span class="text">Customers</span>
                        <span class="number"><?php echo $dailyCustomers; ?></span>
                    </div>
                    <div class="box-report box4-report">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Pets</span>
                        <span class="number"><?php echo $dailyPets; ?></span>
                    </div>

                    <div style="
                    width: 100%;
                    padding-left: 545px
                    ">
                        <div class="box-report box4-report">
                            <i class="uil uil-thumbs-up"></i>
                            <span class="text">Grooming</span>
                            <span class="number"><?php echo $dailyGrooming; ?></span>
                        </div>
                    </div>
                </div>

                <!-- Weekly -->
                <?php
                require 'database-conn.php';

                $currentDate = new DateTime();
                $currentWeek = $currentDate->format('W'); // Get the current week number

                // customer
                // get the count of scheduled items for the current week
                $query = "SELECT COUNT(*) as count FROM schedule WHERE WEEK(date) = '$currentWeek'";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $weeklyCustomers = $row['count'];
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // pet
                // get the count of scheduled items for the current week
                $query2 = "SELECT petname, petname2, petname3, petname4, petname5 FROM schedule WHERE WEEK(date) = '$currentWeek'";
                $result2 = mysqli_query($conn, $query2);

                if ($result2) {
                    $weeklyPets = 0;

                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        // Loop through each column and count the pets
                        foreach ($row2 as $pet) {
                            if (!empty($pet)) {
                                $weeklyPets++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // grooming
                // get the count of scheduled items for the current week
                $query3 = "SELECT service, service2, service3 FROM schedule WHERE WEEK(date) = '$currentWeek'";
                $result3 = mysqli_query($conn, $query3);

                if ($result3) {
                    $weeklyGrooming = 0;

                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        // Loop through each column and count the grooming services
                        foreach ($row3 as $service) {
                            if (!empty($service) && $service == "Grooming") {
                                $weeklyGrooming++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // Consultation and Treatment
                // get the count of scheduled items for the current week
                $query4 = "SELECT service, service2, service3 FROM schedule WHERE WEEK(date) = '$currentWeek'";
                $result4 = mysqli_query($conn, $query4);

                if ($result4) {
                    $weeklyConsult = 0;

                    while ($row4 = mysqli_fetch_assoc($result4)) {
                        // Loop through each column and count the grooming services
                        foreach ($row4 as $service) {
                            if (!empty($service) && $service == "Consultation and Treatment") {
                                $weeklyConsult++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // Lab Test
                // get the count of scheduled items for the current week
                $query5 = "SELECT service, service2, service3 FROM schedule WHERE WEEK(date) = '$currentWeek'";
                $result5 = mysqli_query($conn, $query5);

                if ($result5) {
                    $weeklyLab = 0;

                    while ($row5 = mysqli_fetch_assoc($result5)) {
                        // Loop through each column and count the grooming services
                        foreach ($row5 as $service) {
                            if (!empty($service) && $service == "Lab Test") {
                                $weeklyLab++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // Surgery
                // get the count of scheduled items for the current week
                $query6 = "SELECT service, service2, service3 FROM schedule WHERE WEEK(date) = '$currentWeek'";
                $result6 = mysqli_query($conn, $query6);

                if ($result6) {
                    $weeklySurgery = 0;

                    while ($row6 = mysqli_fetch_assoc($result6)) {
                        // Loop through each column and count the grooming services
                        foreach ($row6 as $service) {
                            if (!empty($service) && $service == "Surgery") {
                                $weeklySurgery++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // Surgery
                // get the count of scheduled items for the current week
                $query6 = "SELECT service, service2, service3 FROM schedule WHERE WEEK(date) = '$currentWeek'";
                $result6 = mysqli_query($conn, $query6);

                if ($result6) {
                    $weeklySurgery = 0;

                    while ($row6 = mysqli_fetch_assoc($result6)) {
                        // Loop through each column and count the grooming services
                        foreach ($row6 as $service) {
                            if (!empty($service) && $service == "Surgery") {
                                $weeklySurgery++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // Vaccine
                // get the count of scheduled items for the current week
                $query7 = "SELECT service, service2, service3 FROM schedule WHERE WEEK(date) = '$currentWeek'";
                $result7 = mysqli_query($conn, $query7);

                if ($result7) {
                    $weeklyVaccine = 0;

                    while ($row7 = mysqli_fetch_assoc($result7)) {
                        // Loop through each column and count the grooming services
                        foreach ($row7 as $service) {
                            if (!empty($service) && $service == "Vaccine") {
                                $weeklyVaccine++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }
                ?>

                <br>
                <h2>Weekly</h2>
                <div class="boxes-report">
                    <div class="box-report box3-report">
                        <i class="uil uil-share"></i>
                        <span class="text">Customers</span>
                        <span class="number"><?php echo $weeklyCustomers; ?></span>
                    </div>
                    <div class="box-report box4-report">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Pets</span>
                        <span class="number"><?php echo $weeklyPets; ?></span>
                    </div>
                </div>

                <!-- services -->
                <br>
                <div class="boxes-report">
                    <div class="box-report box3-report">
                        <i class="uil uil-share"></i>
                        <span class="text">Grooming</span>
                        <span class="number"><?php echo $weeklyGrooming; ?></span>
                    </div>
                    <div class="box-report box4-report">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Consultation and Treatment</span>
                        <span class="number"><?php echo $weeklyConsult; ?></span>
                    </div>
                    <div class="box-report box3-report">
                        <i class="uil uil-share"></i>
                        <span class="text">Lab Test</span>
                        <span class="number"><?php echo $weeklyLab; ?></span>
                    </div>
                    <div class="box-report box4-report">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Surgery</span>
                        <span class="number"><?php echo $weeklySurgery; ?></span>
                    </div>
                    <div style="
                    width: 100%;
                    padding-left: 545px
                    ">
                        <div class="box-report box4-report">
                            <i class="uil uil-thumbs-up"></i>
                            <span class="text">Vaccine</span>
                            <span class="number"><?php echo $weeklyVaccine; ?></span>
                        </div>
                    </div>
                </div>

                <!-- Monthly -->
                <?php
                require 'database-conn.php';

                $filterMonth = isset($_GET['filter_month']) ? $_GET['filter_month'] : date('Y-m');

                $currentMonth = $filterMonth;

                // customer
                $query = "SELECT COUNT(*) as count FROM schedule WHERE DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $monthlyCustomers = $row['count'];
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // pet
                $query2 = "SELECT petname, petname2, petname3, petname4, petname5 FROM schedule WHERE DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
                $result2 = mysqli_query($conn, $query2);

                if ($result2) {
                    $monthlyPets = 0;

                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        foreach ($row2 as $pet) {
                            if (!empty($pet)) {
                                $monthlyPets++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // grooming
                $query3 = "SELECT service, service2, service3 FROM schedule WHERE DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
                $result3 = mysqli_query($conn, $query3);

                if ($result3) {
                    $monthlyGrooming = 0;

                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        foreach ($row3 as $service) {
                            if (!empty($service) && $service == "Grooming") {
                                $monthlyGrooming++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // Consultation and Treatment
                $query4 = "SELECT service, service2, service3 FROM schedule WHERE DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
                $result4 = mysqli_query($conn, $query4);

                if ($result4) {
                    $monthlyConsult = 0;

                    while ($row4 = mysqli_fetch_assoc($result4)) {
                        foreach ($row4 as $service) {
                            if (!empty($service) && $service == "Consultation and Treatment") {
                                $monthlyConsult++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // Lab Test
                $query5 = "SELECT service, service2, service3 FROM schedule WHERE DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
                $result5 = mysqli_query($conn, $query5);

                if ($result5) {
                    $monthlyLab = 0;

                    while ($row5 = mysqli_fetch_assoc($result5)) {
                        foreach ($row5 as $service) {
                            if (!empty($service) && $service == "Lab Test") {
                                $monthlyLab++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // Surgery
                $query6 = "SELECT service, service2, service3 FROM schedule WHERE DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
                $result6 = mysqli_query($conn, $query6);

                if ($result6) {
                    $monthlySurgery = 0;

                    while ($row6 = mysqli_fetch_assoc($result6)) {
                        foreach ($row6 as $service) {
                            if (!empty($service) && $service == "Surgery") {
                                $monthlySurgery++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }

                // Vaccine
                $query7 = "SELECT service, service2, service3 FROM schedule WHERE DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
                $result7 = mysqli_query($conn, $query7);

                if ($result7) {
                    $monthlyVaccine = 0;

                    while ($row7 = mysqli_fetch_assoc($result7)) {
                        foreach ($row7 as $service) {
                            if (!empty($service) && $service == "Vaccine") {
                                $monthlyVaccine++;
                            }
                        }
                    }
                } else {
                    // echo "Error in query: " . mysqli_error($conn);
                }
                ?>

                <br>
                <h2>Monthly</h2>
                <br>

                <form method="get" action="">
                    <label for="filterM">Filter by Month:</label>
                    <input type="month" id="filterM" name="filter_month" value="<?php echo $filterMonth; ?>" />
                    <input type="submit" value="Apply Filter" />
                </form>

                <div class="boxes-report">
                    <div class="box-report box3-report">
                        <i class="uil uil-share"></i>
                        <span class="text">Customers</span>
                        <span class="number"><?php echo $monthlyCustomers; ?></span>
                    </div>
                    <div class="box-report box4-report">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Pets</span>
                        <span class="number"><?php echo $monthlyPets; ?></span>
                    </div>
                </div>

                <!-- services -->
                <br>
                <div class="boxes-report">
                    <div class="box-report box3-report">
                        <i class="uil uil-share"></i>
                        <span class="text">Grooming</span>
                        <span class="number"><?php echo $monthlyGrooming; ?></span>
                    </div>
                    <div class="box-report box4-report">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Consultation and Treatment</span>
                        <span class="number"><?php echo $monthlyConsult; ?></span>
                    </div>
                    <div class="box-report box3-report">
                        <i class="uil uil-share"></i>
                        <span class="text">Lab Test</span>
                        <span class="number"><?php echo $monthlyLab; ?></span>
                    </div>
                    <div class="box-report box4-report">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Surgery</span>
                        <span class="number"><?php echo $monthlySurgery; ?></span>
                    </div>
                    <div style="
                    width: 100%;
                    padding-left: 545px
                    ">
                        <div class="box-report box4-report">
                            <i class="uil uil-thumbs-up"></i>
                            <span class="text">Vaccine</span>
                            <span class="number"><?php echo $monthlyVaccine; ?></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        // Wait for the document to be ready
        $(document).ready(function() {
            // Add change event listener to the month input
            $('#filterM').on('change', function() {
                // Get the selected value
                var selectedMonth = $(this).val();

                // Display the selected value in the monthHolder element
                $('#monthHolder').val(selectedMonth);
            });
        });
    </script>

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