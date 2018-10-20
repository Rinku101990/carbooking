<?php
if(isset($_POST["triptype"])){
    // Capture selected country
    $triptype = $_POST["triptype"];
	if($triptype==='Delhi'){
	
															echo '<div class="col-sm-12"  id="piclocation">
                                                                    <div class="form-group has-icon has-label">
                                                                        <label for="formSearchUpLocation3">Picking Up Location</label>
                                                                        <select name="" class="form-control" id="">
																		<option value="">Select City</option>
																		<option value="">Delhi</option>
																		</select>
                                                                        <span class="form-control-icon"><i class="fa fa-location-arrow"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12"  id="droplocation">
                                                                    <div class="form-group has-icon has-label">
                                                                        <label for="formSearchOffLocation3">Picking Off Location</label>
                                                                         <select name="" class="form-control" id="">
																		<option value="">Select City</option>
																		<option value="">Delhi</option>
																		</select>
                                                                        <span class="form-control-icon"><i class="fa fa-location-arrow"></i></span>
                                                                    </div>
                                                                </div>';
   
<?php }else{
	echo '<div class="col-sm-12"  id="piclocation">
                                                                    <div class="form-group has-icon has-label">
                                                                        <label for="formSearchUpLocation3">Picking Up Location</label>
                                                                        <select name="" class="form-control" id="">
																		<option value="">Select City</option>
																		<option value="">Delhi</option>
																		</select>
                                                                        <span class="form-control-icon"><i class="fa fa-location-arrow"></i></span>
                                                                    </div>
                                                                </div>';
} }
   
   
   
    if($country !== 'Select'){
        echo "<label>City:</label>";
        echo "<select>";
        foreach($countryArr[$country] as $value){
            echo "<option>". $value . "</option>";
        }
        echo "</select>";
    } 

?>