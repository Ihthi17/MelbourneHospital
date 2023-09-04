


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="././index3.html" class="brand-link">
       <!-- <img src="./assets/dist/img/ambulance-cross-hospital-icon-11.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
        <span class="brand-text font-weight-light"><i class="fa-regular fa-hospital"></i> MELBOURNE HOSPITAL</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <p style="color:white ;"><?php echo ($_SESSION["p_name"]) ;?></p>
        </div>
      </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="index.php" class="nav-link">
            <i class="fa-solid fa-gauge"></i>
              <p>
               Dashboard
               
             </p>
           </a>

         </li>
         <li class="nav-item">
          <a href="Make_Appointment.php" class="nav-link">
          <i class="fa-regular fa-calendar-check"></i>
            <p>
              Make Appointment

            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="patient.php" class="nav-link">
          <i class="fa-regular fa-calendar-check"></i>
            <p>
              Continus Patient

            </p>
          </a>
        </li>
       
        <li class="nav-item">
          <a href="View_Appointment_History.php" class="nav-link">
          <i class="fa-regular fa-calendar-check"></i>
            <p>
               View Appointment History

            </p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="Payment.php" class="nav-link">
          <i class="fa-sharp fa-solid fa-file-invoice-dollar"></i>
                                <p>
               Payment

            </p>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
