<style>
    .content-wrapper{
        min-height: 775px;
    }    
</style>
<?php
$attribute = array('id' => 'valid');
echo form_open('User/addDoctor', $attribute);
?>
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <div class="form-group">
         <label>Doctor Name</label>
        <input type="text" class="form-control" value="" name="Doctor_Name" placeholder="Doctor Name" />
    </div>
    <div class="form-group">
        <label>Head Quarters</label>
        <input type="text" class="form-control" value="" name="hq" placeholder="Head Quarters" /> </div>
    <div class="form-group">
        <label>Speciality</label>
        <input type="text" class="form-control" value="" name="spl" placeholder="Speciality"/> </div>
    <div class="form-group">
        <label>RXS Of ASTHALIN_MDI</label>
        <input type="number" class="form-control" value="" name="ASTHALIN_MDI" placeholder="RXS Of ASTHALIN_MDI" /> </div>
    <div class="form-group">
        <label>RXS Of ASTHALIN_DPI</label>
        <input type="text" class="form-control" value="" name="ASTHALIN_DPI" placeholder="RXS Of ASTHALIN_DPI"/> </div>
    <div class="form-group">
        <label>RXS Of AEROCORT_FORTE_ROTACAPS</label>
        <input type="text"  class="form-control" name="AEROCORT_FORTE_ROTACAPS" placeholder="RXS Of AEROCORT_FORTE_ROTACAPS" >
    </div>	    
    <div class="form-group">
         <label>RXS Of AEROCORT_ROTACAPS</label>
        <input type="text"  class="form-control" name="AEROCORT_ROTACAPS" required="" placeholder="RXS Of AEROCORT_ROTACAPS" >
    </div>	
    <div class="form-group">
         <label>RXS Of AEROCORT_MDI</label>
        <input type="text"  class="form-control" name="AEROCORT_MDI" placeholder="RXS Of AEROCORT_MDI" >
    </div>	
    <div class="form-group">
        <label>RXS Of Other</label>
        <input type="text"  class="form-control" name="Other" placeholder=" RXS Of Other" >
    </div>	
    
    
    <div class="form-group">
        <label> Part Of Fun </label> <input type="radio" name="part_of_fun" value="Yes" />Yes
        <input type="radio" name="part_of_fun" value="No" /> No
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
                Doctor_Name: {
                    validators: {
                        notEmpty: {
                            message: 'The Doctor_Name  is required'
                        }
                    }
                },
               hq: {
                    validators: {
                        notEmpty: {
                            message: 'The MSL_Code is required'
                        }
                    }
                },
                spl: {
                    validators: {
                        notEmpty: {
                            message: 'The  Address is required'
                        }
                    }
                },
                
               part_of_fun: {
                    validators: {
                        notEmpty: {
                            message: 'Part Of Fun is required'
                        }
                    }
                },
            }

        });
    });
</script>

