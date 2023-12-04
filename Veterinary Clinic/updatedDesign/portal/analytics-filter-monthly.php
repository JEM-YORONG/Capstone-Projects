<?php
require 'database-conn.php';

$selectedMonth = $_POST['m'];
$currentMonth = $selectedMonth; // Get the current month number

// customer
$query = "SELECT COUNT(*) as count FROM schedule WHERE MONTH(date) = '$currentMonth'";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $monthlyCustomers = $row['count'];
} else {
    // echo "Error in query: " . mysqli_error($conn);
}

// pet
$query2 = "SELECT petname, petname2, petname3, petname4, petname5 FROM schedule WHERE MONTH(date) = '$currentMonth'";
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
$query3 = "SELECT service, service2, service3 FROM schedule WHERE MONTH(date) = '$currentMonth'";
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
$query4 = "SELECT service, service2, service3 FROM schedule WHERE MONTH(date) = '$currentMonth'";
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
$query5 = "SELECT service, service2, service3 FROM schedule WHERE MONTH(date) = '$currentMonth'";
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
$query6 = "SELECT service, service2, service3 FROM schedule WHERE MONTH(date) = '$currentMonth'";
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
$query7 = "SELECT service, service2, service3 FROM schedule WHERE MONTH(date) = '$currentMonth'";
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
