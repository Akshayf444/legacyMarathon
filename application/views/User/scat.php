<style>
    .content-wrapper{
        min-height: 775px;
    }    
</style>
<?php
$attribute = array('id' => 'valid');
echo form_open('User/SCAT', $attribute);
?>
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <div class="form-group">
        <input type="text" class="form-control" value="" name="No_of_SCAT" placeholder="No of SCAT" />
    </div>
    
    <div class="form-group">
        <input type="text" class="form-control" value="" name="No_of_Attendee" placeholder="No of Attendee"/> </div>
    
    
    <div class="form-group">
        <input type="number" class="form-control" value="" name="ASTHALIN_MDI" placeholder="POB Of ASTHALIN_MDI" /> </div>
    <div class="form-group">
        <input type="text" class="form-control" value="" name="ASTHALIN_DPI" placeholder=" POB Of ASTHALIN_DPI"/> </div>
    <div class="form-group">
        <input type="text"  class="form-control" name="AEROCORT_FORTE_ROTACAPS" placeholder="POB Of AEROCORT_FORTE_ROTACAPS" >
    </div>	    
    <div class="form-group">
        <input type="text"  class="form-control" name="AEROCORT_ROTACAPS" required="" placeholder="POB Of  AEROCORT_ROTACAPS" >
    </div>	
    <div class="form-group">
        <input type="text"  class="form-control" name="AEROCORT_MDI" placeholder="POB Of  AEROCORT_MDI" >
    </div>	
    <div class="form-group">
        <input type="text"  class="form-control" name="Other" placeholder="POB Of  Other" >
    </div>	
    
    
    
    
    
    <button class="btn btn-block btn-success " type="submit">Save</button>
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

