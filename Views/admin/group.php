<?php
if ($_SESSION['username'] != 'admin') {
    header("Location: ./?controller=login&action=index");
}
?>

<body data-background-color="dark">
    <div class="wrapper">
        <?php require_once "./Views/admin/templates/main-header.php" ?>
        <!-- Sidebar -->
        <?php require_once "./Views/admin/templates/sidebar.php" ?>
        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Users</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="./?controller=dashboard&action=index">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Users</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="./?controller=user&action=index">List Users</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                    <div class="col-md-4" data-select2-id="184">
											<div class="form-group" data-select2-id="183">
												<label>Multiple States</label>
												<div class="select2-input select2-warning" data-select2-id="182">
													<select id="multiple-states" name="multiple2[]" class="form-control select2-hidden-accessible" multiple="" data-select2-id="multiple-states" tabindex="-1" aria-hidden="true">
														<option value="" data-select2-id="185">&nbsp;</option>
														<optgroup label="Alaskan/Hawaiian Time Zone" data-select2-id="186">
															<option value="AK" data-select2-id="187">Alaska</option>
															<option value="HI" data-select2-id="188">Hawaii</option>
														</optgroup>
														<optgroup label="Pacific Time Zone" data-select2-id="189">
															<option value="CA" data-select2-id="190">California</option>
															<option value="NV" data-select2-id="191">Nevada</option>
															<option value="OR" data-select2-id="192">Oregon</option>
															<option value="WA" data-select2-id="193">Washington</option>
														</optgroup>
														<optgroup label="Mountain Time Zone" data-select2-id="194">
															<option value="AZ" data-select2-id="195">Arizona</option>
															<option value="CO" data-select2-id="196">Colorado</option>
															<option value="ID" data-select2-id="197">Idaho</option>
															<option value="MT" data-select2-id="198">Montana</option>
															<option value="NE" data-select2-id="199">Nebraska</option>
															<option value="NM" data-select2-id="200">New Mexico</option>
															<option value="ND" data-select2-id="201">North Dakota</option>
															<option value="UT" data-select2-id="202">Utah</option>
															<option value="WY" data-select2-id="203">Wyoming</option>
														</optgroup>
														<optgroup label="Central Time Zone" data-select2-id="204">
															<option value="AL" data-select2-id="205">Alabama</option>
															<option value="AR" data-select2-id="206">Arkansas</option>
															<option value="IL" data-select2-id="207">Illinois</option>
															<option value="IA" data-select2-id="208">Iowa</option>
															<option value="KS" data-select2-id="209">Kansas</option>
															<option value="KY" data-select2-id="210">Kentucky</option>
															<option value="LA" data-select2-id="211">Louisiana</option>
															<option value="MN" data-select2-id="212">Minnesota</option>
															<option value="MS" data-select2-id="213">Mississippi</option>
															<option value="MO" data-select2-id="214">Missouri</option>
															<option value="OK" data-select2-id="215">Oklahoma</option>
															<option value="SD" data-select2-id="216">South Dakota</option>
															<option value="TX" data-select2-id="217">Texas</option>
															<option value="TN" data-select2-id="218">Tennessee</option>
															<option value="WI" data-select2-id="219">Wisconsin</option>
														</optgroup>
														<optgroup label="Eastern Time Zone" data-select2-id="220">
															<option value="CT" data-select2-id="221">Connecticut</option>
															<option value="DE" data-select2-id="222">Delaware</option>
															<option value="FL" data-select2-id="223">Florida</option>
															<option value="GA" data-select2-id="224">Georgia</option>
															<option value="IN" data-select2-id="225">Indiana</option>
															<option value="ME" data-select2-id="226">Maine</option>
															<option value="MD" data-select2-id="227">Maryland</option>
															<option value="MA" data-select2-id="228">Massachusetts</option>
															<option value="MI" data-select2-id="229">Michigan</option>
															<option value="NH" data-select2-id="230">New Hampshire</option>
															<option value="NJ" data-select2-id="231">New Jersey</option>
															<option value="NY" data-select2-id="232">New York</option>
															<option value="NC" data-select2-id="233">North Carolina</option>
															<option value="OH" data-select2-id="234">Ohio</option>
															<option value="PA" data-select2-id="235">Pennsylvania</option>
															<option value="RI" data-select2-id="236">Rhode Island</option>
															<option value="SC" data-select2-id="237">South Carolina</option>
															<option value="VT" data-select2-id="238">Vermont</option>
															<option value="VA" data-select2-id="239">Virginia</option>
															<option value="WV" data-select2-id="240">West Virginia</option>
														</optgroup>
													</select><span class="select2 select2-container select2-container--bootstrap select2-container--below select2-container--focus" dir="ltr" data-select2-id="4" style="width: 476.328px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
												</div>
											</div>
										</div>
                    </div>
                </div>
            </div>
        <?php require_once "./Views/admin/templates/main-footer.php" ?>
        </div>
        <script>

		$('#datetime').datetimepicker({
			format: 'MM/DD/YYYY H:mm',
		});
		$('#datepicker').datetimepicker({
			format: 'MM/DD/YYYY',
		});
		$('#timepicker').datetimepicker({
			format: 'h:mm A', 
		});

		$('#basic').select2({
			theme: "bootstrap"
		});

		$('#multiple').select2({
			theme: "bootstrap"
		});

		$('#multiple-states').select2({
			theme: "bootstrap"
		});

		$('#tagsinput').tagsinput({
			tagClass: 'badge-info'
		});

		$( function() {
			$( "#slider" ).slider({
				range: "min",
				max: 100,
				value: 40,
			});
			$( "#slider-range" ).slider({
				range: true,
				min: 0,
				max: 500,
				values: [ 75, 300 ]
			});
		} );
	</script>
    </div>