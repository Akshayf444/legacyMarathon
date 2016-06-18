<style>
    .leftpad{
        padding-left: 0px;
    }
</style>
<?php
$attribute = array('id' => 'valid');
echo form_open('User/update_tour?id=' . $row->tour_id, $attribute);
?>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <input type="hidden" class="form-control" value="<?php echo $row->tour_id ?>" name="tour_id"  />

        <div class="row">
            <div class="form-group">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <label>No of Taxi Tour</label>
                    <input type="number" class="form-control" value="<?php echo $row->Taxi_Tour ?>" name="Taxi_Tour" placeholder="No of Taxi Tour " /></div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 leftpad">
                    <input type="text" class="form-control" value="<?php echo $row->Location_taxi ?>" name="Location_taxi" placeholder="Location" /></div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 leftpad">
                    <input type="number" class="form-control" value="<?php echo $row->chemist_taxi ?>" name="chemist_taxi" placeholder="Chemist Count" />
                </div>
            </div>
        </div><br>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <label>No of Bike Tour</label>
                    <input type="number" class="form-control" value="<?php echo $row->bike_tour ?>" name="bike_tour" placeholder="No of Bike Tour " /></div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 leftpad">
                    <input type="text" class="form-control" value="<?php echo $row->Location_bike ?>" name="Location_bike" placeholder="Location" /></div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 leftpad">
                    <input type="number" class="form-control" value="<?php echo $row->chemist_bike ?>" name="chemist_bike" placeholder="Chemist Count" /> </div> 
            </div>
        </div><br>
        <div class="form-group">
            <label>POB Of ASTHALIN MDI</label>
            <input type="number" class="form-control" value="<?php echo $row->ASTHALIN_MDI ?>" name="ASTHALIN_MDI" placeholder="POB Of  ASTHALIN MDI" /> </div>
        <div class="form-group">
            <label>POB Of ASTHALIN DPI</label>
            <input type="number" class="form-control" value="<?php echo $row->ASTHALIN_DPI ?>" name="ASTHALIN_DPI" placeholder="POB Of ASTHALIN DPI"/> </div>
        <div class="form-group">
            <label>POB Of AEROCORT FORTE ROTACAPS</label>
            <input type="number"  class="form-control" name="AEROCORT_FORTE_ROTACAPS" value="<?php echo $row->AEROCORT_FORTE_ROTACAPS ?>" placeholder="POB Of AEROCORT FORTE ROTACAPS" >
        </div>	    
        <div class="form-group">
            <label>POB Of AEROCORT ROTACAPS</label>
            <input type="number"  class="form-control" name="AEROCORT_ROTACAPS" value="<?php echo $row->AEROCORT_ROTACAPS ?>"required="" placeholder="POB Of AEROCORT ROTACAPS" >
        </div>	
        <div class="form-group">
            <label>POB Of AEROCORT MDI</label>
            <input type="number"  class="form-control" name="AEROCORT_MDI" value="<?php echo $row->AEROCORT_MDI; ?>" placeholder="POB Of AEROCORT MDI" >
        </div>	
        <div class="form-group">
            <label>POB Of Other</label>
            <input type="number"  class="form-control" name="Other" value="<?php echo $row->Other; ?>" placeholder="POB Of Other" >
        </div>	



        <button class="btn btn-block btn-success " type="submit">Update</button>
    </div>
</div>
</form>


<script src="<?php echo asset_url() ?>js/formValidation.min.js" type="text/javascript"></script>
<script src="<?php echo asset_url() ?>js/bootstrap.min.js" type="text/javascript"></script>
