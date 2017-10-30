

<div class="navbar navbar-inverse set-radius-zero" style="background: url(<?php echo base_url();?>images/56.jpg) no-repeat center;">
        <div class="container">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="float:left;">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <div class="navbar-header" style="float:right;">

                <a class="navbar-brand" href="<?php echo base_url('admin');?>" style="text-align:right; margin-right: 60px;">

                    <h1 style="color:white;">Admin <?php echo $firstname;?> </h1>

                </a>
                <div class="left-div">
                    <div class="user-settings-wrapper">
                        <ul class="nav">

                            <li class="dropdown" style="float:right;">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <i class="fa fa-angle-down" aria-hidden="true" style="font-size: 40px;"></i>
                                </a>
                                <ul class="dropdown-menu pull-right" style="text-align:right;">
                                    <li>
                                        <a  href="<?php echo base_url('admin/change_pwd');?>">Change Password</a>
                                    </li>                                
                                    <li >
                                        <a href="<?php echo base_url('admin/logout');?>" style="text-decoration: none;">Log Out</a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
	  <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url('admin');?>">Dashboard</a></li>
                            <li><a href="<?php echo base_url('admin/register');?>">Registration</a></li>
                            <li><a href="<?php echo base_url('admin/search'); ?>">Search</a></li>
                            <li><a href="<?php echo base_url('admin/announcement'); ?>">Announcement</a></li>
							<li><a href="<?php echo base_url('admin/report'); ?>">Reports</a></li>
							<li><a href="<?php echo base_url('admin/violations'); ?>">Violations</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>