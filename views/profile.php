<?php
require_once './others/class/main_funtions.php';
$app = new setting();
$user = $_SESSION['user_id'];

$query = "SELECT
user_register.full_name,
user_register.user_nic,
user_register.user_email,
user_register.user_contact,
user_register.user_address,
user_register.user_name,
user_register.user_role,
user_register.user_status,
user_register.user_regi_date_time
FROM `user_register`
WHERE
user_register.user_id = '{$user}'";
$data = $app->basic_Select_Query($query);
?>

<?php require_once './others/sub_pages/all_css.php'; ?>
<!--profile-->
<link rel="stylesheet" href="others/css/profile.css">
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img class="img-circle" src="./images/29.PNG" style="height: 155px;width: 155px" alt=""/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-head">
                    <h5>
                        <?php echo $data[0]['full_name']; ?>
                    </h5>
                    <h6>
                        <?php echo $data[0]['user_name']; ?>
                    </h6>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <a type="button" class="profile-edit-btn" href="./?x=dashboard">Go Back</a>
            </div>
            <div class="col-md-2">
                <button type="button" class="profile-edit-btn" id="edit_prof">Edit Profile</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="profile-work">
                    <br>
                    <br>
                    <hr>
                    <hr>
                    <h4 style="background-color: black;color: white;border-radius: 10px">RON Rentors & Tailors</h4>
                    <hr>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Id</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $user; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p id="name_p"><?php echo $data[0]['full_name']; ?></p>
                                <input type="text" class="form-control d-none" id="name_t" value="<?php echo $data[0]['full_name']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p id="email_p"><?php echo $data[0]['user_email']; ?></p>
                                <input type="text" class="form-control d-none" id="email_t" value="<?php echo $data[0]['user_email']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data[0]['user_contact']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address</label>
                            </div>
                            <div class="col-md-6">
                                <p id="address_p"><?php echo $data[0]['user_address']; ?></p>
                                <input type="text" class="form-control d-none" id="address_t" value="<?php echo $data[0]['user_address']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>NIC No.</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data[0]['user_nic']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Registered Date</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data[0]['user_regi_date_time']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Current Status</label>
                            </div>
                            <div class="col-md-6">
                                <?php if ($data[0]['user_status'] == 1) { ?>
                                    <h5 style="color: green">Active</h5>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-secondary d-none" id="reset">Reset</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-warning d-none" id="update">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Experience</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hourly Rate</label>
                            </div>
                            <div class="col-md-6">
                                <p>10$/hr</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Projects</label>
                            </div>
                            <div class="col-md-6">
                                <p>230</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>English Level</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Availability</label>
                            </div>
                            <div class="col-md-6">
                                <p>6 months</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br/>
                                <p>Your detail description</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div>
<?php require_once './others/sub_pages/all_js.php'; ?>
<script type="text/javascript" src="./controllers/profile_controller.js"></script>