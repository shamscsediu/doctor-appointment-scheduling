<?php
include 'admin/db_connect.php';
?>
<style>
    #portfolio .img-fluid {
        width: 100%
    }
</style>
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>Welcome to Doctech</h1>
                <h2>Booking appointments with a doctor can be a tedious process but we are here to help people take
                    appointments either offline or online with just few click.</h2>
                <div><a href="index.php?page=doctors" class="btn-get-started scrollto">Find Doctors</a></div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="assets/img/1600918560_medical-appointment-cover.jpg" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section>
<section id="services" class="services section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Services</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-cash-stack" style="color: #ff689b;"></i></div>
                    <h4 class="title"><a href="">Online Appointment Scheduling</a></h4>
                    <p class="description">Our doctors' appointment system provides a convenient online platform for
                        scheduling appointments.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-calendar4-week" style="color: #e9bf06;"></i></div>
                    <h4 class="title"><a href="">Real-time Doctor Availability</a></h4>
                    <p class="description">Our doctors' appointment system provides real-time information on doctor
                        availability. Patients can view the availability of different doctors</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-wow-delay="0.1s">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-chat-text" style="color: #3fcdc7;"></i></div>
                    <h4 class="title"><a href="">Customized Appointment Preferences</a></h4>
                    <p class="description">Our doctors' appointment system allows patients to customize their
                        appointment preferences based on their specific needs. Patients can indicate their preferred
                        doctor, preferred time slots, and any specific requirements or preferences they may have.</p>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Services Section -->
<section class="page-section" id="menu">

</section>
<div id="portfolio" class="container">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="mb-4">Medical Specialties</h2>
                <hr class="divider">

            </div>
        </div>
        <div class="row no-gutters">
            <?php
            $cats = $conn->query("SELECT * FROM medical_specialty order by id asc");
            while ($row = $cats->fetch_assoc()):
                ?>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="index.php?page=doctors&sid=<?php echo $row['id'] ?>">
                        <img class="img-fluid" src="assets/img/<?php echo $row['img_path'] ?>" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">
                                <?php echo $row['name'] ?>
                            </div>
                            <div class="project-category text-white">Find Doctor</div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>

        </div>
    </div>
</div>
<section id="services" class="services section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Divisions</h2>
            <h4>Find doctors around Bangladesh</h4>
        </div>

        <div class="row">
            <?php
            $divisions = $conn->query("select * from basic_division");
            while ($row = $divisions->fetch_assoc()) {

                ?>
                
                    <div class="col-md-3">

                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-cash-stack" style="color: #ff689b;"></i></div>
                            <h4 class="title">
                            <a href="index.php?page=doctors&division=<?php echo $row["division"]; ?>"><?php echo $row["division"]; ?>
            </a>    
                        </h4>
                        </div>
                    </div>
                </a>
            <?php } ?>

        </div>

    </div>
</section><!-- End Services Section -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <h2 class="mt-0">Contact us</h2>
            <hr class="divider my-4" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
            <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
            <div>
                <?php echo $_SESSION['setting_contact'] ?>
            </div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
            <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
            <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
            <a class="d-block" href="mailto:<?php echo $_SESSION['setting_email'] ?>"><?php echo $_SESSION['setting_email'] ?></a>
        </div>
    </div>
</div>

<script>

    $('.view_prod').click(function () {
        uni_modal_right('Product', 'view_prod.php?id=' + $(this).attr('data-id'))
    })
</script>