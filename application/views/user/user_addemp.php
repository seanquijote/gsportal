<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>

<div class="container shadow" style="background-color:#ffffff">
	<h3>Add Company/Employment History</h3>
	<hr>
	<div class="col-md-7">
		<div class="panel panel-default shadow">
			<div class="panel-body">

				<?php 
				if(validation_errors()){
				?>
				<i style="color:red;"><?php echo validation_errors(); ?></i>
				<?php
				}
				?>

				<form method="post" action="addemphs" name="addwork">
				<?php
					$csrf = array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash()
					);
				?>
				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
				
				<div class="form-group">
					<label class="control-label">Company Name:</label>
					<input type="text" class="form-control" name="empCompName" required>
				</div>

				<div class="form-group">
					<label>Job Position:</label>
					<input type="text" class="form-control" name="empPosition" required>
				</div>
				
				<div class="form-group">
					<label>- Company Address -</label>
				</div>

				<div class="form-group">
					<div class="col-xs-8">
						<label class="control-label" style="font-size:12px;">Street address, suite, unit, building, floor, etc.:</label>
						<input type="text" class="form-control input-sm" name="empCompAddrStreet" required>
					</div>

					<div class="col-xs-3">
						<label class="control-label" style="font-size:12px;">City:</label>
							<input type="text" class="form-control input-sm" name="empCompAddrCity" list="CityList" required>
					</div>
						<datalist id="CityList">
							<option value="Alaminos">All Months</option>
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
							<input type="text" class="form-control input-sm" name="empCompAddrProvince" list="ProvinceList" required>
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
						<input type="text" class="form-control input-sm" name="empCompAddrCountry" list="CountryList" required>
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
				        <option value="Cote D'ivoire" />
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
						<input type="number" class="form-control input-sm" name="empCompAddrZIP" min="1000" max="99999" required>
					</div>
				</div>
	
				<br><br>
				<hr>

				<div class="form-group has-feedback">
					<label class="control-label">Date of Starting Work:</label>
					<input  type="date" class="form-control compatibleDate" name="empStartDate" placeholder="yyyy/mm/dd" required>
					<i class="glyphicon glyphicon-calendar form-control-feedback"></i>
					<span class="help-block pull-right" style="font-size:12px;">Date format: YYYY-MM-DD</span>
				</div>
				
				<div class="form-group has-feedback">			
					<label class="control-label">Date of Resignation:</label>
					<input type="date" class="form-control compatibleDate" name="empEndDate" placeholder="yyyy/mm/dd" required>
					<i class="glyphicon glyphicon-calendar form-control-feedback"></i>
					<span class="help-block pull-right" style="font-size:12px;">Date format: YYYY-MM-DD</span>
				</div>
				<br><br>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" class="btn btn-success pull-right" value="Save">
						<a href="<?php echo base_url('user/profile'); ?>" class="btn btn-default btn-sm pull-right" style="margin-right:10px;">
			                           <i class="glyphicon glyphicon-arrow-left"></i> Go Back
			            </a>
			        </div>
				</div>
				</form>

			</div>
		</div>
	</div>

<div class="col-md-5">
	<div class="well">
		<strong>Note:</strong><br><br>
		Please provide your exact working details to let us keep in track of your employment progress.<br><br>-
	</div>
</div>

</div>
</div>

<?php include_once('footer.php'); ?>
	
<script type="text/javascript" >
$(document).ready(function() {

    //------ BROWSER date COMPATIBILITY Code
    if ( $('.compatibleDate')[0].type != 'date') {
      $('.compatibleDate').datepicker({ dateFormat: 'yy-mm-dd' });
    }
   
});
</script>
