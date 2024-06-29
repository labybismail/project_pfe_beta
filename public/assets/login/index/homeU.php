<!-- Home Banner -->
<section class="section section-search-1">
			
            <!-- Header -->
               <?php
           if ($_SESSION['usertype']=='user')
           {
              include_once("headerU.php"); 
           } 
           elseif ($_SESSION['usertype']=='admin') 
           {
            include_once("headerA.php"); 
           } 
           elseif ($_SESSION['usertype']=='doctor') 
           {
            include_once("headerD.php"); 
           } 
           elseif (!isset($_SESSION) or !isset($_SESSION['usertype']))
           {
               session_destroy();
               header("location: ..\login-23.php");
           } 
               ?>



            <!-- /Header -->
          
            <div class="row">
                <div class="col-md-6">
                    <img src="assets/img/dr-slider.png" class="img-fluid dr-img" alt="" >
                </div>
                <div class="col-md-6 search-doctor">
                    <div class="search-area">
                        <h2 class="text-center">Search Doctor, Make an Appointment</h2>
                        
                        <form class="search-input" method="GET" action="search.php" > 
                            <div class="row">
                            <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label>Doctor Name</label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input id="location"  name="location" class="form-control" placeholder="Search by City" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name ="gender">
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">FeMale</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control Specialities" id="Specialities" name="Specialities" >
                                          <option value="">selectitem</option>

                                        <?php
                                            $sqql = "SELECT * FROM specialities  ";
                                            $result = mysqli_query($conn, $sqql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                          <option value="<?php echo $row["idspec"] ?>"><?php echo $row["name"] ?></option>
                                          <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                     
                            <div class="submit-section">
                               <input type="submit" name ="search" class="btn btn-primary search-btn " value="search"  >
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
    </section>
  
    <!-- /Home Banner -->
    