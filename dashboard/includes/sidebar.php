<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <?php
        if (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == 'profile.php') {
            ?>
            <li class="com-md-10 col-sm-offset-1">
                <img
                    src="<?php echo(!empty($row->photo) ? 'uploads/' . $table . '/avatar/' . $row->photo : 'uploads/gravatar.png'); ?>"
                    width="150"
                    height="150"/>
            </li>
            <?php
        }
        ?>
        <li><a href="profile.php">Contact Profile</a></li>
        <li><a href="business-profile.php">Bussiness Profile</a></li>
        <li><a href="homepage.php">Home Page</a></li>
        <li><a href="infrastructure-facilities.php">Infrastructure & Facilities</a></li>
        <li><a href="memberships-certificates.php">Memberships & Certificates</a></li>
        <li><a href="about-us.php">About Us</a></li>
        <li><a href="change-password.php">Change Password</a></li>
        <li><a href="manage-product.php">Manage Product</a></li>
    </ul>
</div>
