<?php include_once('header.php'); ?>

<div id="wrap">

<header class="navbar navbar-bright navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-education" style="font-size:20px;"></span>&nbsp;&nbsp;<b>Graduate's Tracer Survey</b></a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
	  <ul class="nav navbar-right navbar-nav">
		<li><a><img src="<?php echo base_url().'images/'.$picture; ?>" width="20" height="20" style="border-radius: 10px;"><?php echo ' '.$firstname;?></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-triangle-bottom" style="font-size:10px; padding:5px;"></span></a>
          <ul class="dropdown-menu">
			<a href="<?php echo base_url().'user/logout'; ?>"><li style="font-size: 12px; color: black;" class="btn pull-right">Logout</li></a>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</header>
<!-- Contains the body -->
<div class="container">
  <!-- upper section -->
  <div class="row" style="background-color:#fff">
  <div style="width:70%; margin:auto;">
       <h3><i class="glyphicon"></i> Welcome <?php echo $firstname . ' !' ?></h3>  
           
       <hr>
            <!-- center left-->	
			<div class="panel panel-default">
                  <div class="panel-heading"><h4>Information Survey</h4></div>
					  <div class="panel-body">
						
						<p>Please answer this survey honestly according to the fields provided.<br><br><small><i>Note: Fields with <b style="color:red">**</b> are required</i></small><br>
						</p>
						<hr>
					<?php 
					if(validation_errors()){
					?>
						<strong><?php echo validation_errors(); ?></strong><br>
						<?php
					}
					?>

					<?php
					echo form_open('user/survey',array("onsubmit"=>"this.style.display = 'none'"));

							echo '<h3>Employment Record</h3><hr>';
							echo '<small>(Begin with your first job after graduation)</small>';
							echo '<br>';
							echo '<br>';
							$age = array(
							
								'15' => '20-25',
								'16' => '25-30',
								'17' => '30-35',
								'18' => '35-40',
								'19' => '40+'
								
							);
							
							echo '<label>Age upon employment:</label><input type="hidden" name="question[1]" value="6">';
							echo form_dropdown('answer[1]',$age,'','class="form-control" required');
							echo '<br>';
							echo '<label>Company Name: <b style="color:red">**</b></label>
              					  <input type="text" class="form-control" name="empCompName1"><br>';
							
							echo '<label>Job Position: <b style="color:red">**</b></label>
									<input type="hidden" name="fj" value="first job">
									<input type="hidden" name="question4" value="5">';
							echo form_input('fjob_pos','','class="form-control" required');
							echo '<br>';

							echo '<div class="form-group">
					<label>- Company Address - <b style="color:red">**</b></label>
				</div>

				<div class="form-group">
					<div class="col-xs-8">
						<label class="control-label" style="font-size:12px;">Street address, suite, unit, building, floor, etc.:</label>
						<input type="text" class="form-control input-sm" name="empCompAddrStreet1" required>
					</div>

					<div class="col-xs-3">
						<label class="control-label" style="font-size:12px;">City:</label>
							<input type="text" class="form-control input-sm" name="empCompAddrCity1" list="CityList" placeholder="" required>
					</div>
						<datalist id="CityList">
							<option value="Alaminos">
	  						<option value="Angeles">
	  						<option value="Antipolo">
	  						<option value="Bacolod">
	  						<option value="Bacoor">
	  						<option value="Bago">
	  						<option value="Baguio">
	  						<option value="Bais">
	  						<option value="Balanga">
	  						<option value="Batac">
	  						<option value="Batangas City">
	  						<option value="Baybay">
	  						<option value="Biñan">
	  						<option value="Bislig">
	  						<option value="Bogo">
	  						<option value="Borongan">
	  						<option value="Butuan">
	  						<option value="Cabadbaran">
	  						<option value="Cabanatuan">
	  						<option value="Cabuyao">
	  						<option value="Cadiz">
	  						<option value="Cagayan de Oro">
	  						<option value="Calamba">
	  						<option value="Calapan">
	  						<option value="Calbayog">
	  						<option value="Caloocan">
	  						<option value="Candon">	  						  						
	  						<option value="Canlaon">
	  						<option value="Carcar">
	  						<option value="Catbalogan">
	  						<option value="Cauayan">
	  						<option value="Cavite City">
	  						<option value="Cebu City">
	  						<option value="Cotabato City">
	  						<option value="Dagupan">
	  						<option value="Danao">
	  						<option value="Dapitan">
	  						<option value="Dasmariñas">
	  						<option value="Davao City">
	  						<option value="Digos">
	  						<option value="Dipolog">
	  						<option value="Dumaguete">
	  						<option value="El Salvador">
	  						<option value="Escalante">
	  						<option value="Gapan">
	  						<option value="General Santos">
	  						<option value="General Trias">
	  						<option value="Gingoog">
	  						<option value="Guihulngan">
	  						<option value="Himaymaylan">
	  						<option value="Ilagan">
	  						<option value="Iligan">
	  						<option value="Iloilo City">
	  						<option value="Imus">
	  						<option value="Iriga">
	  						<option value="Isabela">
	  						<option value="Kabankalan">
	  						<option value="Kidapawan">
	  						<option value="Koronadal">
	  						<option value="La Carlota">
	  						<option value="Lamitan">
	  						<option value="Laoag">
	  						<option value="Lapu-lapu">
	  						<option value="Las Piñas">
	  						<option value="Legazpi">
	  						<option value="Ligao">
	  						<option value="Lipa">
	  						<option value="Lucena">
	  						<option value="Maasin">
	  						<option value="Mabalacat">
	  						<option value="Makati">
	  						<option value="Malabon">
	  						<option value="Malaybalay">
	  						<option value="Malolos">
	  						<option value="Mandaluyong">
	  						<option value="Mandaue">
	  						<option value="Manila">
	  						<option value="Marawi">
	  						<option value="Marikina">
	  						<option value="Masbate City">
	  						<option value="Mati">
	  						<option value="Meycauayan">
	  						<option value="Muñoz">
	  						<option value="Muntinlupa">
	  						<option value="Naga">
	  						<option value="Navotas">
	  						<option value="Olongapo">
	  						<option value="Ormoc">
	  						<option value="Oroquieta">
	  						<option value="Ozamiz">
	  						<option value="Pagadian">
	  						<option value="Palayan">
	  						<option value="Panabo">
	  						<option value="Parañaque">
	  						<option value="Pasay">
	  						<option value="Pasig">
	  						<option value="Passi">
	  						<option value="Puerto Princesa">
	  						<option value="Quezon City">
	  						<option value="Roxas">
	  						<option value="Sagay">
	  						<option value="Samal">
	  						<option value="San Carlos">
	  						<option value="San Fernando">
	  						<option value="San Jose">
	  						<option value="San Jose del Monte">
	  						<option value="San Juan">
	  						<option value="San Pablo">
	  						<option value="Santa Rosa">
	  						<option value="Santiago">
	  						<option value="Silay">
	  						<option value="Sipalay">
	  						<option value="Sorsogon City">
	  						<option value="Surigao City">
	  						<option value="Tabaco">
	  						<option value="Tabuk">
	  						<option value="Tacloban">
	  						<option value="Tacurong">
	  						<option value="Tagaytay">
	  						<option value="Tagbilaran">
	  						<option value="Taguig">
	  						<option value="Tagum">
	  						<option value="Talisay">
	  						<option value="Tanauan">
	  						<option value="Tandag">
	  						<option value="Tangub">
	  						<option value="Tanjay">
	  						<option value="Tarlac City">
	  						<option value="Tayabas">
	  						<option value="Toledo">
	  						<option value="Trece Martires">
	  						<option value="Tuguegarao">
	  						<option value="Urdaneta">
	  						<option value="Valencia">
	  						<option value="Valenzuela">
	  						<option value="Victorias">
	  						<option value="Vigan">
	  						<option value="Zamboanga City">
						</datalist>
				</div>

				<br><br><br>

				<div class="form-group">			
					<div class="col-xs-4">
						<label class="control-label" style="font-size:12px;">State/Province:</label>
							<input type="text" class="form-control input-sm" name="empCompAddrProvince1" list="ProvinceListPH" required>
					</div>
					<datalist id="ProvinceListPH">
						<option value="Abra">
						<option value="Agusan del Norte">
						<option value="Agusan del Sur">
						<option value="Aklan">
						<option value="Albay">
						<option value="Antique">
						<option value="Apayao">
						<option value="Aurora">
						<option value="Basilan">
						<option value="Bataan">
						<option value="Batanes">
						<option value="Batangas">
						<option value="Benguet">
						<option value="Biliran">
						<option value="Bohol">
						<option value="Bukidnon">
						<option value="Bulacan">
						<option value="Cagayan">
						<option value="Camarines Norte">
						<option value="Camarines Sur">
						<option value="Camiguin">
						<option value="Capiz">
						<option value="Catanduanes">
						<option value="Cavite">
						<option value="Cebu">
						<option value="Compostela Valley">
						<option value="Cotabato">
						<option value="Davao del Norte">
						<option value="Davao del Sur">
						<option value="Davao Occidental">
						<option value="Davao Oriental">
						<option value="Dinagat Islands">
						<option value="Eastern Samar">
						<option value="Guimaras">
						<option value="Ifugao">
						<option value="Ilocos Norte">
						<option value="Ilocos Sur">
						<option value="Iloilo">
						<option value="Isabela">
						<option value="Kalinga">
						<option value="La Union">
						<option value="Laguna">
						<option value="Lanao del Norte">
						<option value="lanao del Sur">
						<option value="Leyte">
						<option value="Maguindanao">
						<option value="Marinduque">
						<option value="Masbate">
						<option value="Metro Manila">
						<option value="Misamis Occidental">
						<option value="Misamis Oriental">
						<option value="Mountain Province">
						<option value="Negros Occidental">
						<option value="Negros Oriental">
						<option value="Nueva Vizcaya">
						<option value="Occidental Mindoro">
						<option value="Oriental Mindoro">
						<option value="Palawan">
						<option value="Pampanga">
						<option value="Pangasinan">
						<option value="Quezon">
						<option value="Quirino">
						<option value="Rizal">
						<option value="Romblon">
						<option value="Samar">
						<option value="Sarangani">
						<option value="Sorsogon">
						<option value="South Cotabato">
						<option value="Southern Leyte">
						<option value="Sultan Kudarat">
						<option value="Sulu">
						<option value="Surigao del Norte">
						<option value="Surigao del Sur">
						<option value="Tarlac">
						<option value="Tawi-Tawi">
						<option value="Zambales">
						<option value="Zamboanga del Norte">
						<option value="Zamboanga del Sur">
						<option value="Zamboanga Sibugay">

							<option value="Alabama"></option>
							<option value="Alaska"></option>
							<option value="Arizona"></option>
							<option value="Arkansas"></option>
							<option value="California"></option>
							<option value="Colorado"></option>
							<option value="Connecticut"></option>
							<option value="Delaware"></option>
							<option value="District of Columbia"></option>
							<option value="Florida"></option>
							<option value="Georgia"></option>
							<option value="Hawaii"></option>
							<option value="Idaho"></option>
							<option value="Illinois"></option>
							<option value="Indiana"></option>
							<option value="Iowa"></option>
							<option value="Kansas"></option>
							<option value="Kentucky"></option>
							<option value="Louisiana"></option>
							<option value="Maine"></option>
							<option value="Maryland"></option>
							<option value="Massachusetts"></option>
							<option value="Michigan"></option>
							<option value="Minnesota"></option>
							<option value="Mississippi"></option>
							<option value="Missouri"></option>
							<option value="Montana"></option>
							<option value="Nebraska"></option>
							<option value="Nevada"></option>
							<option value="New Hampshire"></option>
							<option value="New Jersey"></option>
							<option value="New Mexico"></option>
							<option value="New York"></option>
							<option value="North Carolina"></option>
							<option value="North Dakota"></option>
							<option value="Ohio"></option>
							<option value="Oklahoma"></option>
							<option value="Oregon"></option>
							<option value="Pennsylvania"></option>
							<option value="Rhode Island"></option>
							<option value="South Carolina"></option>
							<option value="South Dakota"></option>
							<option value="Tennessee"></option>
							<option value="Texas"></option>
							<option value="Utah"></option>
							<option value="Vermont"></option>
							<option value="Virginia"></option>
							<option value="Washington"></option>
							<option value="West Virginia"></option>
							<option value="Wisconsin"></option>
							<option value="Wyoming"></option>
					</datalist>

					<div class="col-xs-4">
						<label class="control-label" style="font-size:12px;">Country:</label>
						<input type="text" class="form-control input-sm" name="empCompAddrCountry1" list="CountryList" placeholder="" required>
					</div>
					<datalist id="CountryList">
				        <option value="Afghanistan" />
				        <option value="Albania" />
				        <option value="Algeria" />
				        <option value="American Samoa" />
				        <option value="Andorra" />
				        <option value="Angola" />
				        <option value="Anguilla" />
				        <option value="Antarctica" />
				        <option value="Antigua and Barbuda" />
				        <option value="Argentina" />
				        <option value="Armenia" />
				        <option value="Aruba" />
				        <option value="Australia" />
				        <option value="Austria" />
				        <option value="Azerbaijan" />
				        <option value="Bahamas" />
				        <option value="Bahrain" />
				        <option value="Bangladesh" />
				        <option value="Barbados" />
				        <option value="Belarus" />
				        <option value="Belgium" />
				        <option value="Belize" />
				        <option value="Benin" />
				        <option value="Bermuda" />
				        <option value="Bhutan" />
				        <option value="Bolivia" />
				        <option value="Bosnia and Herzegovina" />
				        <option value="Botswana" />
				        <option value="Bouvet Island" />
				        <option value="Brazil" />
				        <option value="British Indian Ocean Territory" />
				        <option value="Brunei Darussalam" />
				        <option value="Bulgaria" />
				        <option value="Burkina Faso" />
				        <option value="Burundi" />
				        <option value="Cambodia" />
				        <option value="Cameroon" />
				        <option value="Canada" />
				        <option value="Cape Verde" />
				        <option value="Cayman Islands" />
				        <option value="Central African Republic" />
				        <option value="Chad" />
				        <option value="Chile" />
				        <option value="China" />
				        <option value="Christmas Island" />
				        <option value="Cocos (Keeling) Islands" />
				        <option value="Colombia" />
				        <option value="Comoros" />
				        <option value="Congo" />
				        <option value="Congo, The Democratic Republic of The" />
				        <option value="Cook Islands" />
				        <option value="Costa Rica" />
				        <option value="Croatia" />
				        <option value="Cuba" />
				        <option value="Cyprus" />
				        <option value="Czech Republic" />
				        <option value="Denmark" />
				        <option value="Djibouti" />
				        <option value="Dominica" />
				        <option value="Dominican Republic" />
				        <option value="Ecuador" />
				        <option value="Egypt" />
				        <option value="El Salvador" />
				        <option value="Equatorial Guinea" />
				        <option value="Eritrea" />
				        <option value="Estonia" />
				        <option value="Ethiopia" />
				        <option value="Falkland Islands (Malvinas)" />
				        <option value="Faroe Islands" />
				        <option value="Fiji" />
				        <option value="Finland" />
				        <option value="France" />
				        <option value="French Guiana" />
				        <option value="French Polynesia" />
				        <option value="French Southern Territories" />
				        <option value="Gabon" />
				        <option value="Gambia" />
				        <option value="Georgia" />
				        <option value="Germany" />
				        <option value="Ghana" />
				        <option value="Gibraltar" />
				        <option value="Greece" />
				        <option value="Greenland" />
				        <option value="Grenada" />
				        <option value="Guadeloupe" />
				        <option value="Guam" />
				        <option value="Guatemala" />
				        <option value="Guinea" />
				        <option value="Guinea-bissau" />
				        <option value="Guyana" />
				        <option value="Haiti" />
				        <option value="Heard Island and Mcdonald Islands" />
				        <option value="Holy See (Vatican City State)" />
				        <option value="Honduras" />
				        <option value="Hong Kong" />
				        <option value="Hungary" />
				        <option value="Iceland" />
				        <option value="India" />
				        <option value="Indonesia" />
				        <option value="Iran, Islamic Republic of" />
				        <option value="Iraq" />
				        <option value="Ireland" />
				        <option value="Israel" />
				        <option value="Italy" />
				        <option value="Jamaica" />
				        <option value="Japan" />
				        <option value="Jordan" />
				        <option value="Kazakhstan" />
				        <option value="Kenya" />
				        <option value="Kiribati" />
				        <option value="Kuwait" />
				        <option value="Kyrgyzstan" />
				        <option value="Latvia" />
				        <option value="Lebanon" />
				        <option value="Lesotho" />
				        <option value="Liberia" />
				        <option value="Libyan Arab Jamahiriya" />
				        <option value="Liechtenstein" />
				        <option value="Lithuania" />
				        <option value="Luxembourg" />
				        <option value="Macao" />
				        <option value="Macedonia, The Former Yugoslav Republic of" />
				        <option value="Madagascar" />
				        <option value="Malawi" />
				        <option value="Malaysia" />
				        <option value="Maldives" />
				        <option value="Mali" />
				        <option value="Malta" />
				        <option value="Marshall Islands" />
				        <option value="Martinique" />
				        <option value="Mauritania" />
				        <option value="Mauritius" />
				        <option value="Mayotte" />
				        <option value="Mexico" />
				        <option value="Micronesia, Federated States of" />
				        <option value="Moldova, Republic of" />
				        <option value="Monaco" />
				        <option value="Mongolia" />
				        <option value="Montserrat" />
				        <option value="Morocco" />
				        <option value="Mozambique" />
				        <option value="Myanmar" />
				        <option value="Namibia" />
				        <option value="Nauru" />
				        <option value="Nepal" />
				        <option value="Netherlands" />
				        <option value="Netherlands Antilles" />
				        <option value="New Caledonia" />
				        <option value="New Zealand" />
				        <option value="Nicaragua" />
				        <option value="Niger" />
				        <option value="Nigeria" />
				        <option value="Niue" />
				        <option value="Norfolk Island" />
				        <option value="Northern Mariana Islands" />
				        <option value="Norway" />
				        <option value="Oman" />
				        <option value="Pakistan" />
				        <option value="Palau" />
				        <option value="Palestinian Territory, Occupied" />
				        <option value="Panama" />
				        <option value="Papua New Guinea" />
				        <option value="Paraguay" />
				        <option value="Peru" />
				        <option value="Philippines" />
				        <option value="Pitcairn" />
				        <option value="Poland" />
				        <option value="Portugal" />
				        <option value="Puerto Rico" />
				        <option value="Qatar" />
				        <option value="Reunion" />
				        <option value="Romania" />
				        <option value="Russian Federation" />
				        <option value="Rwanda" />
				        <option value="Saint Helena" />
				        <option value="Saint Kitts and Nevis" />
				        <option value="Saint Lucia" />
				        <option value="Saint Pierre and Miquelon" />
				        <option value="Saint Vincent and The Grenadines" />
				        <option value="Samoa" />
				        <option value="San Marino" />
				        <option value="Sao Tome and Principe" />
				        <option value="Saudi Arabia" />
				        <option value="Senegal" />
				        <option value="Serbia and Montenegro" />
				        <option value="Seychelles" />
				        <option value="Sierra Leone" />
				        <option value="Singapore" />
				        <option value="Slovakia" />
				        <option value="Slovenia" />
				        <option value="Solomon Islands" />
				        <option value="Somalia" />
				        <option value="South Africa" />
				        <option value="South Georgia and The South Sandwich Islands" />
				        <option value="Spain" />
				        <option value="Sri Lanka" />
				        <option value="Sudan" />
				        <option value="Suriname" />
				        <option value="Svalbard and Jan Mayen" />
				        <option value="Swaziland" />
				        <option value="Sweden" />
				        <option value="Switzerland" />
				        <option value="Syrian Arab Republic" />
				        <option value="Taiwan, Province of China" />
				        <option value="Tajikistan" />
				        <option value="Tanzania, United Republic of" />
				        <option value="Thailand" />
				        <option value="Timor-leste" />
				        <option value="Togo" />
				        <option value="Tokelau" />
				        <option value="Tonga" />
				        <option value="Trinidad and Tobago" />
				        <option value="Tunisia" />
				        <option value="Turkey" />
				        <option value="Turkmenistan" />
				        <option value="Turks and Caicos Islands" />
				        <option value="Tuvalu" />
				        <option value="Uganda" />
				        <option value="Ukraine" />
				        <option value="United Arab Emirates" />
				        <option value="United Kingdom" />
				        <option value="United States" />
				        <option value="United States Minor Outlying Islands" />
				        <option value="Uruguay" />
				        <option value="Uzbekistan" />
				        <option value="Vanuatu" />
				        <option value="Valenzuela" />
				        <option value="Vietnam" />
				        <option value="Virgin Islands, British" />
				        <option value="Virgin Islands, U.S." />
				        <option value="Wallis and Futuna" />
				        <option value="Western Sahara" />
				        <option value="Yemen" />
				        <option value="Zambia" />
				        <option value="Zimbabwe" />
					</datalist>
				
					<div class="col-xs-3">
						<label class="control-label" style="font-size:12px;">ZIP Code:</label>
						<input type="number" class="form-control input-sm" name="empCompAddrZIP1" min="1000" max="99999" required>
					</div>
				</div>
				<br><br>
				<hr>';

              				echo '<div class="form-group has-feedback">';
              				echo '<label>Start of Working Days</label><input type="date" name="empStartDate_first_job" class="form-control compatibleDate" placeholder="yyyy/mm/dd">';
							echo '<i class="glyphicon glyphicon-calendar form-control-feedback"></i>';
              				echo '</div>';
              				
              				echo '<div class="form-group has-feedback">';
              				echo '<br><label>End of Working Days</label> <small><i>**leave blank if this is still your current job</i></small><input type="date" name="empEndDate_first_job" class="form-control compatibleDate" placeholder="yyyy/mm/dd"><br>';
							echo '<i class="glyphicon glyphicon-calendar form-control-feedback" style="margin-top:23px;"></i>';
              				echo '</div>';
								
								$salaries = array(
									'20' => 'Below ₱5,000.00',
									'21' => '₱5,000.00 to less than ₱10,000.00',
									'22' => '₱10,000.00 to less than ₱20,000.00',
									'23' => '₱20,000.00 to less than ₱30,000.00',
									'24' => '₱30,000.00 to less than ₱40,000.00',
									'25' => '₱40,000.00 to less than ₱50,000.00',
									'26' => '₱50,000.00 and above'
								);

							echo '<label>Approximate Monthly Salary: <b style="color:red">**</b></label>
									<input type="hidden" name="question[2]" value="8">';
							echo form_dropdown('answer[2]',$salaries,'','class="form-control" required');
							echo '<div id="length"><br>';
							
								$staylengths = array(
									'27' => 'Still the current job',
									'28' => 'Less than a month',
									'29' => '1-6 months',
									'30' => '7-11 months',
									'31' => '1 year to less than 2 years',
									'32' => '2 years to less than 3 years',
									'33' => '3 years to less than 4 years',
									'34' => '4 years to less than 5 years',
									'35' => 'More than 5 years'
								);

							echo '<label>Length of Stay: <b style="color:red">**</b></label>
									<input type="hidden" name="question[3]" value="9">';
							echo form_dropdown('answer[3]',$staylengths,'','class="form-control"').'</div>';
							$placeofworkID = array(
							
								'36' => 'Local',
								'37' => 'Abroad'
							
							);

							echo '<br><label>Place of Work:<b style="color:red">**</b>
							</label><input type="hidden" name="question[4]" value="10">';
							echo form_dropdown('answer[4]',$placeofworkID,'','class="form-control"');
							echo '<br><br>';
							echo '<div id="yeah"><h4><b>Current Job</b></h4>';
							echo '<small>(Skip this if your first job is still your current job)</small>';
							echo '<br>';
							echo '<br>';
							echo '<label>Company Name: <b style="color:red">**</b></label>
              					  <input type="text" class="form-control" name="empCompName2"><br>';
							echo '<label>Job Position: <b style="color:red">**</b></label>';
							echo form_input('cjob_pos','','class="form-control"');
							echo '<br>';


							echo '<div class="form-group">
					<label>- Company Address - <b style="color:red">**</b></label>
				</div>

				<div class="form-group">
					<div class="col-xs-8">
						<label class="control-label" style="font-size:12px;">Street address, suite, unit, building, floor, etc.:</label>
						<input type="text" class="form-control input-sm" name="empCompAddrStreet2" placeholder="">
					</div>

					<div class="col-xs-3">
						<label class="control-label" style="font-size:12px;">City:</label>
							<input type="text" class="form-control input-sm" name="empCompAddrCity2" list="CityList">
					</div>
						<datalist id="CityList">
							<option value="Alaminos">
	  						<option value="Angeles">
	  						<option value="Antipolo">
	  						<option value="Bacolod">
	  						<option value="Bacoor">
	  						<option value="Bago">
	  						<option value="Baguio">
	  						<option value="Bais">
	  						<option value="Balanga">
	  						<option value="Batac">
	  						<option value="Batangas City">
	  						<option value="Baybay">
	  						<option value="Biñan">
	  						<option value="Bislig">
	  						<option value="Bogo">
	  						<option value="Borongan">
	  						<option value="Butuan">
	  						<option value="Cabadbaran">
	  						<option value="Cabanatuan">
	  						<option value="Cabuyao">
	  						<option value="Cadiz">
	  						<option value="Cagayan de Oro">
	  						<option value="Calamba">
	  						<option value="Calapan">
	  						<option value="Calbayog">
	  						<option value="Caloocan">
	  						<option value="Candon">	  						  						
	  						<option value="Canlaon">
	  						<option value="Carcar">
	  						<option value="Catbalogan">
	  						<option value="Cauayan">
	  						<option value="Cavite City">
	  						<option value="Cebu City">
	  						<option value="Cotabato City">
	  						<option value="Dagupan">
	  						<option value="Danao">
	  						<option value="Dapitan">
	  						<option value="Dasmariñas">
	  						<option value="Davao City">
	  						<option value="Digos">
	  						<option value="Dipolog">
	  						<option value="Dumaguete">
	  						<option value="El Salvador">
	  						<option value="Escalante">
	  						<option value="Gapan">
	  						<option value="General Santos">
	  						<option value="General Trias">
	  						<option value="Gingoog">
	  						<option value="Guihulngan">
	  						<option value="Himaymaylan">
	  						<option value="Ilagan">
	  						<option value="Iligan">
	  						<option value="Iloilo City">
	  						<option value="Imus">
	  						<option value="Iriga">
	  						<option value="Isabela">
	  						<option value="Kabankalan">
	  						<option value="Kidapawan">
	  						<option value="Koronadal">
	  						<option value="La Carlota">
	  						<option value="Lamitan">
	  						<option value="Laoag">
	  						<option value="Lapu-lapu">
	  						<option value="Las Piñas">
	  						<option value="Legazpi">
	  						<option value="Ligao">
	  						<option value="Lipa">
	  						<option value="Lucena">
	  						<option value="Maasin">
	  						<option value="Mabalacat">
	  						<option value="Makati">
	  						<option value="Malabon">
	  						<option value="Malaybalay">
	  						<option value="Malolos">
	  						<option value="Mandaluyong">
	  						<option value="Mandaue">
	  						<option value="Manila">
	  						<option value="Marawi">
	  						<option value="Marikina">
	  						<option value="Masbate City">
	  						<option value="Mati">
	  						<option value="Meycauayan">
	  						<option value="Muñoz">
	  						<option value="Muntinlupa">
	  						<option value="Naga">
	  						<option value="Navotas">
	  						<option value="Olongapo">
	  						<option value="Ormoc">
	  						<option value="Oroquieta">
	  						<option value="Ozamiz">
	  						<option value="Pagadian">
	  						<option value="Palayan">
	  						<option value="Panabo">
	  						<option value="Parañaque">
	  						<option value="Pasay">
	  						<option value="Pasig">
	  						<option value="Passi">
	  						<option value="Puerto Princesa">
	  						<option value="Quezon City">
	  						<option value="Roxas">
	  						<option value="Sagay">
	  						<option value="Samal">
	  						<option value="San Carlos">
	  						<option value="San Fernando">
	  						<option value="San Jose">
	  						<option value="San Jose del Monte">
	  						<option value="San Juan">
	  						<option value="San Pablo">
	  						<option value="Santa Rosa">
	  						<option value="Santiago">
	  						<option value="Silay">
	  						<option value="Sipalay">
	  						<option value="Sorsogon City">
	  						<option value="Surigao City">
	  						<option value="Tabaco">
	  						<option value="Tabuk">
	  						<option value="Tacloban">
	  						<option value="Tacurong">
	  						<option value="Tagaytay">
	  						<option value="Tagbilaran">
	  						<option value="Taguig">
	  						<option value="Tagum">
	  						<option value="Talisay">
	  						<option value="Tanauan">
	  						<option value="Tandag">
	  						<option value="Tangub">
	  						<option value="Tanjay">
	  						<option value="Tarlac City">
	  						<option value="Tayabas">
	  						<option value="Toledo">
	  						<option value="Trece Martires">
	  						<option value="Tuguegarao">
	  						<option value="Urdaneta">
	  						<option value="Valencia">
	  						<option value="Valenzuela">
	  						<option value="Victorias">
	  						<option value="Vigan">
	  						<option value="Zamboanga City">
			                <option value="Tokyo">
			                <option value="Yokohama">
			                <option value="Osaka">
			                <option value="Nagoya">
			                <option value="Sapporo">
			                <option value="Fukouka">
			                <option value="Kobe">
			                <option value="Kawasaki">
			                <option value="Kyoto">
			                <option value="Saitama">
			                <option value="Hiroshima">
			                <option value="Sendai">
			                <option value="Chiba">
			                <option value="Kitakyushu">
			                <option value="Nara">
			                <option value="Okayama">
			                <option value="Kanazawa">
			                <option value="Kagoshima">
						</datalist>
				</div>

				<br><br><br>

				<div class="form-group">			
					<div class="col-xs-4">
						<label class="control-label" style="font-size:12px;">State/Province:</label>
							<input type="text" class="form-control input-sm" name="empCompAddrProvince2" list="ProvinceList" placeholder="">
					</div>
					<datalist id="ProvinceList">
						<option value="Abra">
						<option value="Agusan del Norte">
						<option value="Agusan del Sur">
						<option value="Aklan">
						<option value="Albay">
						<option value="Antique">
						<option value="Apayao">
						<option value="Aurora">
						<option value="Basilan">
						<option value="Bataan">
						<option value="Batanes">
						<option value="Batangas">
						<option value="Benguet">
						<option value="Biliran">
						<option value="Bohol">
						<option value="Bukidnon">
						<option value="Bulacan">
						<option value="Cagayan">
						<option value="Camarines Norte">
						<option value="Camarines Sur">
						<option value="Camiguin">
						<option value="Capiz">
						<option value="Catanduanes">
						<option value="Cavite">
						<option value="Cebu">
						<option value="Compostela Valley">
						<option value="Cotabato">
						<option value="Davao del Norte">
						<option value="Davao del Sur">
						<option value="Davao Occidental">
						<option value="Davao Oriental">
						<option value="Dinagat Islands">
						<option value="Eastern Samar">
						<option value="Guimaras">
						<option value="Ifugao">
						<option value="Ilocos Norte">
						<option value="Ilocos Sur">
						<option value="Iloilo">
						<option value="Isabela">
						<option value="Kalinga">
						<option value="La Union">
						<option value="Laguna">
						<option value="Lanao del Norte">
						<option value="lanao del Sur">
						<option value="Leyte">
						<option value="Maguindanao">
						<option value="Marinduque">
						<option value="Masbate">
						<option value="Metro Manila">
						<option value="Misamis Occidental">
						<option value="Misamis Oriental">
						<option value="Mountain Province">
						<option value="Negros Occidental">
						<option value="Negros Oriental">
						<option value="Nueva Vizcaya">
						<option value="Occidental Mindoro">
						<option value="Oriental Mindoro">
						<option value="Palawan">
						<option value="Pampanga">
						<option value="Pangasinan">
						<option value="Quezon">
						<option value="Quirino">
						<option value="Rizal">
						<option value="Romblon">
						<option value="Samar">
						<option value="Sarangani">
						<option value="Sorsogon">
						<option value="South Cotabato">
						<option value="Southern Leyte">
						<option value="Sultan Kudarat">
						<option value="Sulu">
						<option value="Surigao del Norte">
						<option value="Surigao del Sur">
						<option value="Tarlac">
						<option value="Tawi-Tawi">
						<option value="Zambales">
						<option value="Zamboanga del Norte">
						<option value="Zamboanga del Sur">
						<option value="Zamboanga Sibugay">

							<option value="Alabama"></option>
							<option value="Alaska"></option>
							<option value="Arizona"></option>
							<option value="Arkansas"></option>
							<option value="California"></option>
							<option value="Colorado"></option>
							<option value="Connecticut"></option>
							<option value="Delaware"></option>
							<option value="District of Columbia"></option>
							<option value="Florida"></option>
							<option value="Georgia"></option>
							<option value="Hawaii"></option>
							<option value="Idaho"></option>
							<option value="Illinois"></option>
							<option value="Indiana"></option>
							<option value="Iowa"></option>
							<option value="Kansas"></option>
							<option value="Kentucky"></option>
							<option value="Louisiana"></option>
							<option value="Maine"></option>
							<option value="Maryland"></option>
							<option value="Massachusetts"></option>
							<option value="Michigan"></option>
							<option value="Minnesota"></option>
							<option value="Mississippi"></option>
							<option value="Missouri"></option>
							<option value="Montana"></option>
							<option value="Nebraska"></option>
							<option value="Nevada"></option>
							<option value="New Hampshire"></option>
							<option value="New Jersey"></option>
							<option value="New Mexico"></option>
							<option value="New York"></option>
							<option value="North Carolina"></option>
							<option value="North Dakota"></option>
							<option value="Ohio"></option>
							<option value="Oklahoma"></option>
							<option value="Oregon"></option>
							<option value="Pennsylvania"></option>
							<option value="Rhode Island"></option>
							<option value="South Carolina"></option>
							<option value="South Dakota"></option>
							<option value="Tennessee"></option>
							<option value="Texas"></option>
							<option value="Utah"></option>
							<option value="Vermont"></option>
							<option value="Virginia"></option>
							<option value="Washington"></option>
							<option value="West Virginia"></option>
							<option value="Wisconsin"></option>
							<option value="Wyoming"></option>
					</datalist>

					<div class="col-xs-4">
						<label class="control-label" style="font-size:12px;">Country:</label>
						<input type="text" class="form-control input-sm" name="empCompAddrCountry2" list="CountryList" placeholder="">
					</div>
					<datalist id="CountryList">
				        <option value="Afghanistan" />
				        <option value="Albania" />
				        <option value="Algeria" />
				        <option value="American Samoa" />
				        <option value="Andorra" />
				        <option value="Angola" />
				        <option value="Anguilla" />
				        <option value="Antarctica" />
				        <option value="Antigua and Barbuda" />
				        <option value="Argentina" />
				        <option value="Armenia" />
				        <option value="Aruba" />
				        <option value="Australia" />
				        <option value="Austria" />
				        <option value="Azerbaijan" />
				        <option value="Bahamas" />
				        <option value="Bahrain" />
				        <option value="Bangladesh" />
				        <option value="Barbados" />
				        <option value="Belarus" />
				        <option value="Belgium" />
				        <option value="Belize" />
				        <option value="Benin" />
				        <option value="Bermuda" />
				        <option value="Bhutan" />
				        <option value="Bolivia" />
				        <option value="Bosnia and Herzegovina" />
				        <option value="Botswana" />
				        <option value="Bouvet Island" />
				        <option value="Brazil" />
				        <option value="British Indian Ocean Territory" />
				        <option value="Brunei Darussalam" />
				        <option value="Bulgaria" />
				        <option value="Burkina Faso" />
				        <option value="Burundi" />
				        <option value="Cambodia" />
				        <option value="Cameroon" />
				        <option value="Canada" />
				        <option value="Cape Verde" />
				        <option value="Cayman Islands" />
				        <option value="Central African Republic" />
				        <option value="Chad" />
				        <option value="Chile" />
				        <option value="China" />
				        <option value="Christmas Island" />
				        <option value="Cocos (Keeling) Islands" />
				        <option value="Colombia" />
				        <option value="Comoros" />
				        <option value="Congo" />
				        <option value="Cook Islands" />
				        <option value="Costa Rica" />
				        <option value="Croatia" />
				        <option value="Cuba" />
				        <option value="Cyprus" />
				        <option value="Czech Republic" />
				        <option value="Denmark" />
				        <option value="Djibouti" />
				        <option value="Dominica" />
				        <option value="Dominican Republic" />
				        <option value="Ecuador" />
				        <option value="Egypt" />
				        <option value="El Salvador" />
				        <option value="Equatorial Guinea" />
				        <option value="Eritrea" />
				        <option value="Estonia" />
				        <option value="Ethiopia" />
				        <option value="Falkland Islands (Malvinas)" />
				        <option value="Faroe Islands" />
				        <option value="Fiji" />
				        <option value="Finland" />
				        <option value="France" />
				        <option value="French Guiana" />
				        <option value="French Polynesia" />
				        <option value="French Southern Territories" />
				        <option value="Gabon" />
				        <option value="Gambia" />
				        <option value="Georgia" />
				        <option value="Germany" />
				        <option value="Ghana" />
				        <option value="Gibraltar" />
				        <option value="Greece" />
				        <option value="Greenland" />
				        <option value="Grenada" />
				        <option value="Guadeloupe" />
				        <option value="Guam" />
				        <option value="Guatemala" />
				        <option value="Guinea" />
				        <option value="Guinea-bissau" />
				        <option value="Guyana" />
				        <option value="Haiti" />
				        <option value="Heard Island and Mcdonald Islands" />
				        <option value="Honduras" />
				        <option value="Hong Kong" />
				        <option value="Hungary" />
				        <option value="Iceland" />
				        <option value="India" />
				        <option value="Indonesia" />
				        <option value="Iran" />
				        <option value="Iraq" />
				        <option value="Ireland" />
				        <option value="Israel" />
				        <option value="Italy" />
				        <option value="Jamaica" />
				        <option value="Japan" />
				        <option value="Jordan" />
				        <option value="Kazakhstan" />
				        <option value="Kenya" />
				        <option value="Kiribati" />
				        <option value="Kuwait" />
				        <option value="Kyrgyzstan" />
				        <option value="Latvia" />
				        <option value="Lebanon" />
				        <option value="Lesotho" />
				        <option value="Liberia" />
				        <option value="Libyan Arab Jamahiriya" />
				        <option value="Liechtenstein" />
				        <option value="Lithuania" />
				        <option value="Luxembourg" />
				        <option value="Macao" />
				        <option value="Macedonia" />
				        <option value="Madagascar" />
				        <option value="Malawi" />
				        <option value="Malaysia" />
				        <option value="Maldives" />
				        <option value="Mali" />
				        <option value="Malta" />
				        <option value="Marshall Islands" />
				        <option value="Martinique" />
				        <option value="Mauritania" />
				        <option value="Mauritius" />
				        <option value="Mayotte" />
				        <option value="Mexico" />
				        <option value="Micronesia" />
				        <option value="Moldova" />
				        <option value="Monaco" />
				        <option value="Mongolia" />
				        <option value="Montserrat" />
				        <option value="Morocco" />
				        <option value="Mozambique" />
				        <option value="Myanmar" />
				        <option value="Namibia" />
				        <option value="Nauru" />
				        <option value="Nepal" />
				        <option value="Netherlands" />
				        <option value="Netherlands Antilles" />
				        <option value="New Caledonia" />
				        <option value="New Zealand" />
				        <option value="Nicaragua" />
				        <option value="Niger" />
				        <option value="Nigeria" />
				        <option value="Niue" />
				        <option value="Norfolk Island" />
				        <option value="Northern Mariana Islands" />
				        <option value="Norway" />
				        <option value="North Korea" />
				        <option value="Oman" />
				        <option value="Pakistan" />
				        <option value="Palau" />
				        <option value="Palestinian Territory, Occupied" />
				        <option value="Panama" />
				        <option value="Papua New Guinea" />
				        <option value="Paraguay" />
				        <option value="Peru" />
				        <option value="Philippines" />
				        <option value="Pitcairn" />
				        <option value="Poland" />
				        <option value="Portugal" />
				        <option value="Puerto Rico" />
				        <option value="Qatar" />
				        <option value="Reunion" />
				        <option value="Romania" />
				        <option value="Russian Federation" />
				        <option value="Rwanda" />
				        <option value="Saint Helena" />
				        <option value="Saint Kitts and Nevis" />
				        <option value="Saint Lucia" />
				        <option value="Saint Pierre and Miquelon" />
				        <option value="Saint Vincent and The Grenadines" />
				        <option value="Samoa" />
				        <option value="San Marino" />
				        <option value="Sao Tome and Principe" />
				        <option value="Saudi Arabia" />
				        <option value="Senegal" />
				        <option value="Serbia and Montenegro" />
				        <option value="Seychelles" />
				        <option value="Sierra Leone" />
				        <option value="Singapore" />
				        <option value="Slovakia" />
				        <option value="Slovenia" />
				        <option value="Solomon Islands" />
				        <option value="Somalia" />
				        <option value="South Africa" />
				        <option value="South Korea" />
				        <option value="South Georgia and The South Sandwich Islands" />
				        <option value="Spain" />
				        <option value="Sri Lanka" />
				        <option value="Sudan" />
				        <option value="Suriname" />
				        <option value="Svalbard and Jan Mayen" />
				        <option value="Swaziland" />
				        <option value="Sweden" />
				        <option value="Switzerland" />
				        <option value="Syrian Arab Republic" />
				        <option value="Taiwan, Province of China" />
				        <option value="Tajikistan" />
				        <option value="Tanzania" />
				        <option value="Thailand" />
				        <option value="Timor-leste" />
				        <option value="Togo" />
				        <option value="Tokelau" />
				        <option value="Tonga" />
				        <option value="Trinidad and Tobago" />
				        <option value="Tunisia" />
				        <option value="Turkey" />
				        <option value="Turkmenistan" />
				        <option value="Turks and Caicos Islands" />
				        <option value="Tuvalu" />
				        <option value="Uganda" />
				        <option value="Ukraine" />
				        <option value="United Arab Emirates" />
				        <option value="United Kingdom" />
				        <option value="United States" />
				        <option value="United States Minor Outlying Islands" />
				        <option value="Uruguay" />
				        <option value="Uzbekistan" />
				        <option value="Vanuatu" />
				        <option value="Valenzuela" />
				        <option value="Vietnam" />
				        <option value="Virgin Islands, British" />
				        <option value="Virgin Islands, U.S." />
				        <option value="Wallis and Futuna" />
				        <option value="Western Sahara" />
				        <option value="Yemen" />
				        <option value="Zambia" />
				        <option value="Zimbabwe" />
					</datalist>
				
					<div class="col-xs-3">
						<label class="control-label" style="font-size:12px;">ZIP Code:</label>
						<input type="number" class="form-control input-sm" name="empCompAddrZIP2" min="1000" max="99999">
					</div>
				</div>
	
				<br><br>
				<hr>';

              				echo '<div class="form-group has-feedback">';
              				echo '<label>Start of Working Days</label><input type="date" name="empStartDate_current_job" class="form-control compatibleDate" placeholder="yyyy/mm/dd">';
							echo '<i class="glyphicon glyphicon-calendar form-control-feedback"></i>';
              				echo '</div>';

								$salaries = array(
									'38' => 'Below ₱5,000.00',
									'39' => '₱5,000.00 to less than ₱10,000.00',
									'40' => '₱10,000.00 to less than ₱20,000.00',
									'41' => '₱20,000.00 to less than ₱30,000.00',
									'42' => '₱30,000.00 to less than ₱40,000.00',
									'43' => '₱40,000.00 to less than ₱50,000.00',
									'44' => '₱50,000.00 and above'
								);

							echo '<label>Approximate Monthly Salary: <b style="color:red">**</b></label>';
									
							echo form_dropdown('ams',$salaries,'','class="form-control"');
							echo '<br>';
							
								$placeofwork = array(
									'45' =>'Local',
									'46' => 'Abroad'
								);

							echo '<label>Place of Work: <b style="color:red">**</b></label>';
									
							echo form_dropdown('pow',$placeofwork,'','class="form-control"');

							echo '</div><hr>';

							echo '<input type="submit" value="Submit" class="btn btn-success btn-block" />';
										
					echo form_close();
					?>
					</div>
					</div><!--/panel-body--> 
  	</div><!--/col-span-9-->
  </div><!--/row-->
  <!-- /upper section -->
</div>
	
</div>

<?php include_once('footer.php'); ?>

<script type="text/javascript" >

$(document).ready(function() {

    //------ BROWSER date COMPATIBILITY Code
    if ( $('.compatibleDate')[0].type != 'date') {
      $('.compatibleDate').datepicker({ dateFormat: 'yy-mm-dd' });
    }
    //---------------------------------------
});
</script>