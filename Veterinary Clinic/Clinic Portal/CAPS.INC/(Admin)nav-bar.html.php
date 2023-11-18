<nav>
    <!-- logo and name -->
    <div class="logo-name" id="toRefresh">
        <div class="logo-image">
            <img src=".vscode\Doc Lenon Logo.png" alt="" />
        </div>
        <span class="logo_name"><label>Doc Lenon Veterinary Clinic</label> | <br />
            Vet Portal</span>
        <?php require 'script files\reload-logo-name.js.php'; ?>
    </div>

    <!--=====Nav Menus====-->
    <div class="menu-items">
        <ul class="nav-links">
            <li>
                <a href="zHTML_dashboard.php">
                    <i><span class="material-symbols-outlined" style="color: #5a81fa">home</span></i>
                    <span class="link-name" style="color: #5a81fa">Dashboard</span>
                </a>
            </li>
            <!--=====Clinic Management Menu====-->
            <ul class="clinic-management-link">
                <div class="page-maintenance" id="menu-maintenance">
                    <li>
                        <a href="">
                            <i><span class="material-symbols-outlined">help_clinic</span></i>
                            <span class="link-name">Page Maintenance</span>
                        </a>
                    </li>
                    <div class="page-maintenance-content">
                        <li>
                            <a href="Z_ClinicAboutUs.php">
                                <i><span class="material-symbols-outlined">info</span></i>
                                <span class="link-name">&nbsp; About Us</span>
                            </a>
                        </li>
                        <li>
                            <a href="Z_ClinicContact.php">
                                <i><span class="material-symbols-outlined">call</span></i>
                                <span class="link-name">&nbsp; Contacts</span>
                            </a>
                        </li>
                        <li>
                            <a href="Z_ClinicPSched.php">
                                <i><span class="material-symbols-outlined">schedule</span></i>
                                <span class="link-name">&nbsp; Schedule Page</span>
                            </a>
                        </li>
                        <li>
                            <a href="zHTML_announcement.php">
                                <i><span class="material-symbols-outlined">campaign</span></i>
                                <span class="link-name">Announcement</span>
                            </a>
                        </li>
                        <li>
                            <a href="zHTML_service_product.php">
                                <i><span class="material-symbols-outlined">sell</span></i>
                                <span class="link-name">Service and Product</span>
                            </a>
                        </li>
                    </div>
                </div>
            </ul>
            <!--=====Record Menus====-->
            <ul class="record-management-link">
                <li>
                    <a href="zHTML_customer.php">
                        <i class="uil uil-share"><span class="material-symbols-outlined">groups</span></i>
                        <span class="link-name">Customer</span>
                    </a>
                </li>
                <li>
                    <a href="zHTML_pets.php">
                        <i><span class="material-symbols-outlined">pets</span></i>
                        <span class="link-name">Pets</span>
                    </a>
                </li>
                <li>
                    <a href="zHTML_staff.php">
                        <i><span class="material-symbols-outlined">account_box</span></i>
                        <span class="link-name">Staff</span>
                    </a>
                </li>
                <li>
                    <a href="zHTML_report_analytics.php">
                        <i><span class="material-symbols-outlined">analytics</span></i>
                        <span class="link-name">Report Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="zHTML_login.php" style="position: absolute;
                 bottom: 10px;">
                        <i><span class="material-symbols-outlined"> logout </span></i>
                        <span class="link-name">Logout</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="Capstone_Bin.html">
                        <i><span class="material-symbols-outlined">delete</span></i>
                        <span class="link-name">Bin</span>
                    </a>
                </li> -->
            </ul>
        </ul>
        <!--=====Logout Menu====-->

    </div>
</nav>