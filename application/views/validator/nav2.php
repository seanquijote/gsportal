<header class="header" role="banner">

	<div class="navbar navbar-inverse">
	      	<div class="navbar-brand col-md-5">
		      	<div class="logo">
		      		<a href="<?php echo base_url('validator') ?>" style="color:white;text-decoration: none;">
		      		<i class="fa fa-list-alt" aria-hidden="true"></i><i class="fa fa-check" style="font-size:15px;"></i>
		      		<b> COE Validation</b></a>
				</div>      
			</div>

			<div class="col-md-4">
	              <div class="row">
	                <div class="col-lg-12">
	                    <form class="navbar-form" method="GET" action="<?php echo base_url().'validator/search' ?>">
		                  <div class="input-group form">
		                       <input name="search" type="text" class="form-control" placeholder="Enter ID# or Name...">
		                       <span class="input-group-btn">
		                         <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
		                       </span>
		                  </div>
		                </form>
	                </div>
	              </div>
	           </div>

	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">

		                    <li class="dropdown">
		                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url().'images/'.$picture; ?>" width="20" height="20" style="border-radius:10px;"> <i>Validator</i> <?= $firstname; ?> <b class="caret"></b></a>
		                        <ul class="dropdown-menu animated fadeInUp">
		                          <li><a href="<?php echo base_url().'validator/change_pwd'; ?>">Change Password</a></li>
		                          <li><a href="<?php echo base_url().'validator/logout'; ?>">Logout</a></li>
		                        </ul>
		                    </li>
	                    </ul>
	                  </nav>
	</div>
</header>