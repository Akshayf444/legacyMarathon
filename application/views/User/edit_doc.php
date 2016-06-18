<?php
$attribute = array('id' => 'valid');
echo form_open('User/update_doc?id=' . $row->doctor_id, $attribute);
?>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group"> 
            <input type="hidden" class="form-control" value="<?php echo $row->doctor_id ?>" name="DoctorId"  />
            <label>Doctor Name</label>
            <input type="text" class="form-control" value="<?php echo $row->Doctor_Name; ?>" name="Doctor_Name" placeholder="Doctor Name" />
        </div>
        <div class="form-group">
            <label>Head Quarters</label>
            <input type="text" class="form-control" value="<?php echo $row->hq; ?>" name="hq" placeholder="Head Quarters" /> </div>
        <div class="form-group">
            <label>Speciality</label>
            <input type="text" class="form-control" value="<?php echo $row->spl ?>" name="spl" placeholder="Speciality"/> </div>
        <div class="form-group">
            <label>RXS Of ASTHALIN MDI</label>
            <input type="number" class="form-control" value="<?php echo $row->ASTHALIN_MDI ?>" name="ASTHALIN_MDI" placeholder="RXS Of ASTHALIN MDI" /> </div>
        <div class="form-group">
            <label>RXS Of ASTHALIN DPI</label>
            <input type="number" class="form-control" value="<?php echo $row->ASTHALIN_DPI ?>" name="ASTHALIN_DPI" placeholder="RXS Of ASTHALIN DPI"/> </div>
        <div class="form-group">
            <label>RXS Of AEROCORT FORTE ROTACAPS</label>
            <input type="number"  class="form-control" name="AEROCORT_FORTE_ROTACAPS" value="<?php echo $row->AEROCORT_FORTE_ROTACAPS ?>" placeholder="RXS Of AEROCORT FORTE ROTACAPS" >
        </div>	    
        <div class="form-group">
            <label>RXS Of AEROCORT ROTACAPS</label>
            <input type="number"  class="form-control" name="AEROCORT_ROTACAPS" value="<?php echo $row->AEROCORT_ROTACAPS ?>"required="" placeholder="RXS Of AEROCORT ROTACAPS" >
        </div>	
        <div class="form-group">
            <label>RXS Of AEROCORT MDI</label>
            <input type="number"  class="form-control" name="AEROCORT_MDI" value="<?php echo $row->AEROCORT_MDI; ?>" placeholder="RXS Of AEROCORT MDI" >
        </div>	
        <div class="form-group">
            <label>RXS Of Other</label>
            <input type="number"  class="form-control" name="Other" value="<?php echo $row->Other; ?>" placeholder=" RXS Of Other" >
        </div>	

        <div class="form-group">
            Part Of Fun: <input type="radio" name="part_of_fun" value="Yes" /<?php
            if ($row->part_of_fun == 'Yes') {
                echo "checked";
            }
            ?>>  YES
            <input type="radio" name="part_of_fun" value="No"  <?php
            if ($row->part_of_fun == 'No') {
                echo "checked";
            }
            ?>  >No
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


