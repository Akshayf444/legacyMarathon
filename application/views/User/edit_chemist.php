<?php
$attribute = array('id' => 'valid');
echo form_open('User/update_chemist?id=' . $row->chemist_id, $attribute);
?>
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <input type="hidden" class="form-control" value="<?php echo $row->chemist_id?>" name="chemist_id"  />
        
<div class="form-group">
        <input type="text" class="form-control" value="<?php echo $row->No_of_Chemist_Met?>" name="No_of_Chemist_Met" placeholder="No Of Chemist Met" />
    </div>


    
       
    <div class="form-group">
        <input type="number" class="form-control" value="<?php echo $row->ASTHALIN_MDI ?>" name="ASTHALIN_MDI" placeholder="RXS Of ASTHALIN_MDI" /> </div>
    <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $row->ASTHALIN_DPI ?>" name="ASTHALIN_DPI" placeholder="RXS Of ASTHALIN_DPI"/> </div>
    <div class="form-group">
        <input type="text"  class="form-control" name="AEROCORT_FORTE_ROTACAPS" value="<?php echo $row->AEROCORT_FORTE_ROTACAPS ?>" placeholder="RXS Of AEROCORT_FORTE_ROTACAPS" >
    </div>	    
    <div class="form-group">
        <input type="text"  class="form-control" name="AEROCORT_ROTACAPS" value="<?php echo $row->AEROCORT_ROTACAPS ?>"required="" placeholder="RXS Of AEROCORT_ROTACAPS" >
    </div>	
    <div class="form-group">
        <input type="text"  class="form-control" name="AEROCORT_MDI" value="<?php echo $row->AEROCORT_MDI; ?>" placeholder="RXS Of AEROCORT_MDI" >
    </div>	
    <div class="form-group">
        <input type="text"  class="form-control" name="Other" value="<?php echo $row->Other; ?>" placeholder=" RXS Of Other" >
    </div>	
    
    
    
    <button class="btn btn-block btn-success " type="submit">Update</button>
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
                No_of_Chemist_Met: {
                    validators: {
                        notEmpty: {
                            message: 'The No of ChemistMet  is required'
                        }
                    }
                },
                Legendary_Chemist_Met: {
                    validators: {
                        notEmpty: {
                            message: 'Legendary Chemist Met is required'
                        }
                    }
                },
                Mobile_no: {
                    validators: {
                        notEmpty: {
                            message: 'Mobile No is required'
                        }
                    }
                },
            }

        });
    });
</script>

