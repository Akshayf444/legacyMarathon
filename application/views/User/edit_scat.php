<?php
$attribute = array('id' => 'valid');
echo form_open('User/update_scat?id=' . $row->Scat_id, $attribute);
?>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <input type="hidden" class="form-control" value="<?php echo $row->Scat_id ?>" name="Scat_id"  />
        <div class="form-group">
            <label>No of SCAT</label>
            <input type="number" class="form-control" value="<?php echo $row->No_of_SCAT ?>" name="No_of_SCAT" placeholder="No of SCAT" />
        </div>    
        <div class="form-group">
            <label>No of Attendee</label>
            <input type="number" class="form-control" value="<?php echo $row->No_of_Attendee ?>" name="No_of_Attendee" placeholder="No of Attendee"/> </div>
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
<script>
    $('document').ready(function () {
        $('#valid').formValidation({
            icon: {
            },
            fields: {
                No_of_SCAT: {
                    validators: {
                        notEmpty: {
                            message: 'No of SCAT  is required'
                        }
                    }
                },
                No_of_Attendee: {
                    validators: {
                        notEmpty: {
                            message: 'No of Attendee is required'
                        }
                    }
                },
            }

        });
    });
</script>