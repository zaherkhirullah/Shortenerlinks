@extends('layouts.layout')

@section('content')
<section class="vbox" data-pjax="true">
	<section class="scrollable">
		<section class="hbox stretch">

			<section class="vbox">
				<section class="scrollable wrapper">
					<div class="row">
                     <section class="col-md-12">
						<form method="POST" action="/user/account/profile" accept-charset="UTF-8">
							<input name="_token" type="hidden" value="1m4qlv29NhVRkvO9Rse6NZQqpM2HLI8g8r4Hzp8l">
							<section class="panel no-borders">
								<header class="panel-heading">
									<h4 class="font-thin">User <b>Profile</b>
									</h4>
								</header>
								<div class="panel-body">
									<div class="form-group pull-in clearfix">

										<div class="col-sm-6">
											<label>First Name</label>
											<input type="text" class="form-control" name="first_name" placeholder="John" value="test" data-required="true">
										</div>

										<div class="col-sm-6">
											<label>Last Name</label>
											<input type="text" class="form-control" name="last_name" placeholder="Doe" value="test" data-required="true">
										</div>
									</div>
									<div class="form-group pull-in clearfix">

										<div class="col-sm-6">
											<label>Address 1</label>
											<input type="text" class="form-control" name="address1" value="teest" data-required="true">
										</div>

										<div class="col-sm-6">
											<label>Address 2</label>
											<input type="text" class="form-control" name="address2" value="teeest">
										</div>
									</div>
									<div class="line line-dashed line-lg pull-in">
									</div>
									<div class="form-group">

										<label>Withdrawal Method</label>
										<select class="form-control" name="withdrawal_method">
											<option value="">Please choose
											</option>
											<option value="1" selected="">PayPal
											</option>
											<option value="8">Payza
											</option>
										</select>
									</div>
									<div class="form-group">
										<label>Withdrawal Email</label>
										<input type="text" class="form-control" name="withdrawal_email" value="uobabylon@mohmal.com" data-required="true">
									</div>
								</div>
								<footer class="panel-footer text-right bg-light lter">
									<button type="submit" class="btn btn-success btn-s-xs">Update</button>
								</footer>
							</section>
						</form>
					  </section>
					</div>
					<!--/ row 1-->
					<div class="row">
						<section class="col-md-12">
							<div class="box box-primary">
								<div class="box-body">
									<form method="post" accept-charset="utf-8" action="/member/users/profile">
										<div style="display:none;">
											<input type="hidden" name="_method" value="PUT">
											<input type="hidden" name="_csrfToken" value="57145bb035991f3452df68f2a99a0b3a9ac6b1f13aa00b66eea89a1c15c0fa63d99fb59c77daaa9fd277bc4ff86e5bab6d5f9a1b0cfde1afec612f6e3d1a60fc">
										</div>
										<input type="hidden" name="id" value="3">
										<legend>Billing Address</legend>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group text  required">
													<label for="first-name">First Name</label>
													<input type="text" name="first_name" class="form-control" required="required" maxlength="256" id="first-name" value="Demo" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: pointer;">
												</div> 
											</div> 
											<div class="col-sm-6">
												<div class="form-group text  required">
													<label for="last-name">Last Name</label>
													<input type="text" name="last_name" class="form-control" required="required" maxlength="256" id="last-name" value="Account">
												</div> 
											</div> 
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group text  required">
													<label for="address1">Address 1</label>
													<input type="text" name="address1" class="form-control" required="required" maxlength="256" id="address1" value="Address 1">
												</div> 
											</div> 
											<div class="col-sm-6">
												<div class="form-group text ">
													<label for="address2">Address 2</label>
													<input type="text" name="address2" class="form-control" maxlength="256" id="address2" value="">
												</div> 
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group text  required">
													<label for="city">City</label>
													<input type="text" name="city" class="form-control" required="required" maxlength="256" id="city" value="City">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group text  required">
													<label for="state">State</label>
													<input type="text" name="state" class="form-control" required="required" maxlength="256" id="state" value="State">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group text  required">
													<label for="zip">ZIP</label>
													<input type="text" name="zip" class="form-control" required="required" maxlength="256" id="zip" value="12345">
												</div> 
											</div>
											<div class="col-sm-6">
												<div class="form-group select  required">
													<label for="country">Country
													</label>
													<select name="country" class="form-control" required="required" id="country">
														<option value="">Choose
														</option>
														<option value="AF">Afganistan
														</option>
														<option value="AL">Albania
														</option>
														<option value="DZ">Algeria
														</option>
														<option value="AS">American Samoa
														</option>
														<option value="AD">Andorra
														</option>
														<option value="AO">Angola
														</option>
														<option value="AI">Anguilla
														</option>
														<option value="AQ">Antarctica
														</option>
														<option value="AG">Antigua and Barbuda

														</option>
														<option value="AR">Argentina
														</option>
														<option value="AM">Armenia
														</option>
														<option value="AW">Aruba
														</option>
														<option value="AU">Australia
														</option>
														<option value="AT">Austria
														</option>
														<option value="AX">Åland Islands
														</option>
														<option value="AZ">Azerbaijan
														</option>
														<option value="BS">Bahamas
														</option>
														<option value="BH">Bahrain
														</option>
														<option value="BD">Bangladesh
														</option>
														<option value="BB">Barbados
														</option>
														<option value="BY">Belarus
														</option>
														<option value="BE">Belgium
														</option>
														<option value="BZ">Belize
														</option>
														<option value="BJ">Benin
														</option>
														<option value="BM">Bermuda
														</option>
														<option value="BT">Bhutan
														</option>
														<option value="BO">Bolivia
														</option>
														<option value="BA">Bosnia and Herzegowina
														</option>
														<option value="BW">Botswana
														</option>
														<option value="BV">Bouvet Island
														</option>
														<option value="BR">Brazil
														</option>
														<option value="IO">British Indian Ocean Territory
														</option>
														<option value="BN">Brunei Darussalam
														</option>
														<option value="BG">Bulgaria
														</option>
														<option value="BF">Burkina Faso
														</option>
														<option value="BI">Burundi
														</option>
														<option value="KH">Cambodia
														</option>
														<option value="CM">Cameroon
														</option>
														<option value="CA">Canada
														</option>
														<option value="CV">Cape Verde
														</option>
														<option value="KY">Cayman Islands

														</option>
														<option value="CF">Central African Republic

														</option>
														<option value="TD">Chad

														</option>
														<option value="CL">Chile

														</option>
														<option value="CN">China

														</option>
														<option value="CX">Christmas Island
														</option>
														<option value="CC">Cocos (Keeling) Islands

														</option>
														<option value="CO">Colombia

														</option>
														<option value="KM">Comoros

														</option>
														<option value="CG">Congo

														</option>
														<option value="CD">Congo, the Democratic Republic of the

														</option>
														<option value="CK">Cook Islands
														</option>
														<option value="CR">Costa Rica
														</option>
														<option value="CI">Cote d'Ivoire
														</option>
														<option value="CW">Curaçao

														</option>
														<option value="HR">Croatia (Hrvatska)
														</option>
														<option value="CU">Cuba
														</option>
														<option value="CY">Cyprus

														</option>
														<option value="CZ">Czech Republic
														</option>
														<option value="DK">Denmark

														</option>
														<option value="DJ">Djibouti

														</option>
														<option value="DM">Dominica

														</option>
														<option value="DO">Dominican Republic

														</option>
														<option value="TP">East Timor
														</option>
														<option value="EC">Ecuador
														</option>
														<option value="EG">Egypt
														</option>
														<option value="SV">El Salvador
														</option>
														<option value="GQ">Equatorial Guinea
														</option>
														<option value="ER">Eritrea
														</option>
														<option value="EE">Estonia
														</option>
														<option value="ET">Ethiopia
														</option>
														<option value="FK">Falkland Islands (Malvinas)
														</option>
														<option value="FO">Faroe Islands
														</option>
														<option value="FJ">Fiji
														</option>
														<option value="FI">Finland
														</option>
														<option value="FR">France
														</option>
														<option value="FX">France, Metropolitan
														</option>
														<option value="GF">French Guiana
														</option>
														<option value="PF">French Polynesia
														</option>
														<option value="TF">French Southern Territories

														</option>
														<option value="GA">Gabon
														</option>
														<option value="GM">Gambia
														</option>
														<option value="GE">Georgia
														</option>
														<option value="DE">Germany
														</option>
														<option value="GH">Ghana
														</option>
														<option value="GI">Gibraltar
														</option>
														<option value="GR">Greece
														</option>
														<option value="GL">Greenland
														</option>
														<option value="GD">Grenada
														</option>
														<option value="GP">Guadeloupe
														</option>
														<option value="GU">Guam
														</option>
														<option value="GT">Guatemala
														</option>
														<option value="GN">Guinea
														</option>
														<option value="GW">Guinea-Bissau
														</option>
														<option value="GY">Guyana
														</option>
														<option value="HT">Haiti
														</option>
														<option value="HM">Heard and Mc Donald Islands
														</option>
														<option value="VA">Holy See (Vatican City State)
														</option>
														<option value="HN">Honduras
														</option>
														<option value="HK">Hong Kong
														</option>
														<option value="HU">Hungary
														</option>
														<option value="IS">Iceland
														</option>
														<option value="IM">Isle of Man
														</option>
														<option value="IN">India
														</option>
														<option value="ID">Indonesia
														</option>
														<option value="IR">Iran (Islamic Republic of)
														</option>
														<option value="IQ">Iraq
														</option>
														<option value="IE">Ireland
														</option>
														<option value="IL">Israel
														</option>
														<option value="IT">Italy
														</option>
														<option value="JE">Jersey
														</option>
														<option value="JM">Jamaica
														</option>
														<option value="JP">Japan
														</option>
														<option value="JO">Jordan
														</option>
														<option value="KZ">Kazakhstan
														</option>
														<option value="KE">Kenya
														</option>
														<option value="KI">Kiribati
														</option>
														<option value="KP">Korea, Democratic People's Republic of
														</option>
														<option value="KR">Korea, Republic of
														</option>
														<option value="KW">Kuwait
														</option>
														<option value="KG">Kyrgyzstan
														</option>
														<option value="LA">Lao People's Democratic Republic
														</option>
														<option value="LV">Latvia
														</option>
														<option value="LB">Lebanon
														</option>
														<option value="LS">Lesotho
														</option>
														<option value="LR">Liberia
														</option>
														<option value="LY">Libyan Arab Jamahiriya

														</option>
														<option value="LI">Liechtenstein
														</option>
														<option value="LT">Lithuania
														</option>
														<option value="LU">Luxembourg
														</option>
														<option value="MO">Macau
														</option>
														<option value="MK">Macedonia, The Former Yugoslav Republic of
														</option>
														<option value="MG">Madagascar
														</option>
														<option value="MW">Malawi
														</option>
														<option value="MY">Malaysia
														</option>
														<option value="MV">Maldives
														</option>
														<option value="ML">Mali
														</option>
														<option value="MT">Malta
														</option>
														<option value="MH">Marshall Islands
														</option>
														<option value="MQ">Martinique
														</option>
														<option value="MR">Mauritania
														</option>
														<option value="MU">Mauritius
														</option>
														<option value="YT">Mayotte
														</option>
														<option value="MX">Mexico
														</option>
														<option value="FM">Micronesia, Federated States of
														</option>
														<option value="MD">Moldova, Republic of
														</option>
														<option value="MC">Monaco
														</option>
														<option value="ME">Montenegro
														</option>
														<option value="MN">Mongolia
														</option>
														<option value="MS">Montserrat
														</option>
														<option value="MA">Morocco
														</option>
														<option value="MZ">Mozambique
														</option>
														<option value="MM">Myanmar
														</option>
														<option value="NA">Namibia
														</option>
														<option value="NR">Nauru
														</option>
														<option value="NP">Nepal
														</option>
														<option value="NL">Netherlands
														</option>
														<option value="AN">Netherlands Antilles
														</option>
														<option value="NC">New Caledonia
														</option>
														<option value="NZ">New Zealand
														</option>
														<option value="NI">Nicaragua
														</option>
														<option value="NE">Niger
														</option>
														<option value="NG">Nigeria
														</option>
														<option value="NU">Niue
														</option>
														<option value="NF">Norfolk Island
														</option>
														<option value="MP">Northern Mariana Islands
														</option>
														<option value="NO">Norway
														</option>
														<option value="OM">Oman
														</option>
														<option value="PK">Pakistan
														</option>
														<option value="PW">Palau
														</option>
														<option value="PA">Panama
														</option>
														<option value="PG">Papua New Guinea
														</option>
														<option value="PY">Paraguay
														</option>
														<option value="PE">Peru
														</option>
														<option value="PH">Philippines
														</option>
														<option value="PN">Pitcairn
														</option>
														<option value="PL">Poland
														</option>
														<option value="PT">Portugal
														</option>
														<option value="PR">Puerto Rico
														</option>
														<option value="PS">Palestine
														</option>
														<option value="QA">Qatar
														</option>
														<option value="RE">Reunion
														</option>
														<option value="RO">Romania
														</option>
														<option value="RS">Republic of Serbia
														</option>
														<option value="RU">Russian Federation
														</option>
														<option value="RW">Rwanda
														</option>
														<option value="KN">Saint Kitts and Nevis
														</option>
														<option value="LC">Saint LUCIA
														</option>
														<option value="VC">Saint Vincent and the Grenadines
														</option>
														<option value="WS">Samoa
														</option>
														<option value="SM">San Marino
														</option>
														<option value="ST">Sao Tome and Principe
														</option>
														<option value="SA">Saudi Arabia
														</option>
														<option value="SN">Senegal
														</option>
														<option value="SC">Seychelles
														</option>
														<option value="SL">Sierra Leone
														</option>
														<option value="SG">Singapore
														</option>
														<option value="SK">Slovakia (Slovak Republic)
														</option>
														<option value="SI">Slovenia
														</option>
														<option value="SB">Solomon Islands
														</option>
														<option value="SO">Somalia
														</option>
														<option value="SX">Sint Maarten
														</option>
														<option value="ZA">South Africa
														</option>
														<option value="GS">South Georgia and the South Sandwich Islands
														</option>
														<option value="ES">Spain
														</option>
														<option value="LK">Sri Lanka
														</option>
														<option value="SH">St. Helena
														</option>
														<option value="PM">St. Pierre and Miquelon
														</option>
														<option value="SD">Sudan
														</option>
														<option value="SR">Suriname
														</option>
														<option value="SJ">Svalbard and Jan Mayen Islands
														</option>
														<option value="SZ">Swaziland
														</option>
														<option value="SE">Sweden
														</option>
														<option value="CH">Switzerland
														</option>
														<option value="SY">Syrian Arab Republic
														</option>
														<option value="TW">Taiwan, Province of China
														</option>
														<option value="TJ">Tajikistan
														</option>
														<option value="TZ">Tanzania, United Republic of
														</option>
														<option value="TH">Thailand
														</option>
														<option value="TG">Togo
														</option>
														<option value="TK">Tokelau
														</option>
														<option value="TO">Tonga
														</option>
														<option value="TT">Trinidad and Tobago
														</option>
														<option value="TN">Tunisia
														</option>
														<option value="TR">Turkey
														</option>
														<option value="TM">Turkmenistan
														</option>
														<option value="TC">Turks and Caicos Islands
														</option>
														<option value="TV">Tuvalu
														</option>
														<option value="UG">Uganda
														</option>
														<option value="UA">Ukraine
														</option>
														<option value="AE">United Arab Emirates
														</option>
														<option value="GB">United Kingdom
														</option>
														<option value="US" selected="selected">United States
														</option>
														<option value="UM">United States Minor Outlying Islands
														</option>
														<option value="UY">Uruguay
														</option>
														<option value="UZ">Uzbekistan
														</option>
														<option value="VU">Vanuatu
														</option>
														<option value="VE">Venezuela
														</option>
														<option value="VN">Vietnam
														</option>
														<option value="VG">Virgin Islands (British)
														</option>
														<option value="VI">Virgin Islands (U.S.)
														</option>
														<option value="WF">Wallis and Futuna Islands
														</option>
														<option value="EH">Western Sahara
														</option>
														<option value="YE">Yemen
														</option>
														<option value="YU">Yugoslavia
														</option>
														<option value="ZM">Zambia
														</option>
														<option value="ZW">Zimbabwe
														</option>
													</select>
												</div> 
											</div> 
										</div>

										<div class="row">
											<div class="col-sm-6">
												<div class="form-group text  required">
													<label for="phone-number">Phone Number</label>
													<input type="text" name="phone_number" class="form-control" required="required" maxlength="256" id="phone-number" value="0123456789">
												</div> 
											</div> 
										</div>
										<legend>Withdrawal Info</legend>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group select  required">
													<label for="withdrawal-method">Withdrawal Method</label>
													<select name="withdrawal_method" class="form-control" required="required" id="withdrawal-method">
														<option value="">Choose
														</option>
														<option value="wallet">My Wallet
														</option>
														<option value="paypal" selected="selected">PayPal
														</option>
														<option value="payza">Payza
														</option>
														<option value="skrill">Skrill
														</option>
														<option value="bitcoin">Bitcoin
														</option>
														<option value="webmoney">Web Money
														</option>
														<option value="banktransfer">Bank Transfer
														</option>
														<option value="faucethub">FaucetHub
														</option>
														<option value="payoneer">Payoneer
														</option>
														<option value="custom">Custom Withdrawal Method
														</option>
													</select>
												</div> 
											</div> 
											<div class="col-sm-6">
												<table class="table table-hover table-striped">
													<tbody>
														<tr>
															<th>Withdrawal Method</th>
															<th>Minimum Withdrawal Amount</th>
														</tr>
														<tr>
															<td>My Wallet</td>
															<td>$5.00</td>
														</tr>
														<tr>
															<td>PayPal</td>
															<td>$1.00</td>
														</tr>
														<tr>
															<td>Payza</td>
															<td>$5.00</td>
														</tr>
														<tr>
															<td>Skrill</td>
															<td>$10.00</td>
														</tr>
														<tr>
															<td>Bitcoin</td>
															<td>$15.00</td>
														</tr>
														<tr>
															<td>Web Money</td>
															<td>$20.00</td>
														</tr>
														<tr>
															<td>Bank Transfer</td>
															<td>$100.00</td>
														</tr>
														<tr>
															<td>FaucetHub</td>
															<td>$10.00</td>
														</tr>
														<tr>
															<td>Payoneer</td>
															<td>$20.00</td>
														</tr>
														<tr>
															<td>Custom Withdrawal Method</td>
															<td>$3.00</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="form-group textarea ">
											<label for="withdrawal-account">Withdrawal Account</label>
											<textarea name="withdrawal_account" class="form-control" id="withdrawal-account" rows="5">demo@mightyscripts.com</textarea>
										</div>
										<div class="help-block">
											<p>- For PayPal, Payza, Skrill and Perfect Money add your email.</p>
											<p>- For Bitcoin add your wallet address.</p>
											<p>- For Web Money add your purse.</p>
											<p>- For Payeer add account, e-mail or phone number.</p>
											<p>- For bank transfer add your account holder name, Bank Name, City/Town, Country, Account number, SWIFT, IBAN and Account currency</p>
										</div>
										<button class="btn btn-primary btn-lg" type="submit">Submit</button>
										<div style="display:none;">
											<input type="hidden" name="_Token[fields]" value="5d52e34f24ef46fb7050a0f1b884130f83c541da%3Aid">
											<input type="hidden" name="_Token[unlocked]" value="adcopy_challenge%7Cadcopy_response%7Cg-recaptcha-response">
										</div>
									</form>
								</div>
							</div>
						</section>
					</div>
					<!--/ row 2-->
				</section>
			</section>

			@include('_includes.nav.SettingAside')

		</section>
	</section>
</section>
@endsection
