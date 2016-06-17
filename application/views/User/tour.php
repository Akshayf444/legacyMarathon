<style>
    .content-wrapper{
        min-height: 775px;
    }   
    .leftpad{
        padding-left: 0px;
    }
</style>
<?php
$attribute = array('id' => 'valid');
echo form_open('User/tour', $attribute);
?>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

        <div class="row">

            <div class="form-group">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    No Of Taxi Tour
                    <input type="text" class="form-control" value="" name="Taxi_Tour" placeholder="No of Taxi Tour " /></div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 leftpad">
                    Location
                    <input type="text" class="form-control" value="" name="Location_taxi" placeholder="Location" /></div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 leftpad">
                    Chemist Count
                    <input type="text" class="form-control" value="" name="chemist_taxi" placeholder="Chemist Count" />

                </div>
            </div>

        </div><br>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    No Of Bike Tour
                    <input type="text" class="form-control" value="" name="bike_tour" placeholder="No of Bike Tour " /></div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 leftpad">
                    Location
                    <input type="text" class="form-control" value="" name="Location_bike" placeholder="Location" /></div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 leftpad">
                    Chemist Count
                    <input type="text" class="form-control" value="" name="chemist_bike" placeholder="Chemist Count" /> </div> 
            </div>
        </div><br>

        <div class="form-group">
            <label>POB Of  ASTHALIN MDI</label>
            <input type="number" class="form-control" value="" name="ASTHALIN_MDI" placeholder="POB Of ASTHALIN MDI" /> </div>
        <div class="form-group">
            <label>POB Of ASTHALIN DPI</label>
            <input type="text" class="form-control" value="" name="ASTHALIN_DPI" placeholder="POB Of ASTHALIN DPI"/> </div>
        <div class="form-group">
            <label>POB Of AEROCORT FORTE ROTACAPS</label>
            <input type="text"  class="form-control" name="AEROCORT_FORTE_ROTACAPS" placeholder="POB Of AEROCORT FORTE ROTACAPS" >
        </div>	    
        <div class="form-group">
            <label>POB  Of AEROCORT ROTACAPS</label>
            <input type="text"  class="form-control" name="AEROCORT_ROTACAPS" required="" placeholder="POB Of AEROCORT ROTACAPS" >
        </div>	
        <div class="form-group">
            <label>POB Of AEROCORT MDI</label>
            <input type="text"  class="form-control" name="AEROCORT_MDI" placeholder="POB Of AEROCORT MDI" >
        </div>	
        <div class="form-group">
            <label>POB  Of Other</label>
            <input type="text"  class="form-control" name="Other" placeholder="POB Of Other" >
        </div>	
        <button class="btn btn-block btn-success " type="submit">Save</button>
    </div>
</div>
</form>


<script src="<?php echo asset_url() ?>js/formValidation.min.js" type="text/javascript"></script>
<script src="<?php echo asset_url() ?>js/bootstrap.min.js" type="text/javascript"></script>


