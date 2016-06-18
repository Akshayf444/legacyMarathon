<style>

    .leftpad{
        padding-left: 0;
    }
</style>
<?php
$attribute = array('id' => 'valid');
echo form_open('User/update_chemist?id=' . $row->chemist_id, $attribute);
?>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <input type="hidden" class="form-control" value="<?php echo $row->id ?>" name="chemist_id"  />
        <input type="hidden" class="form-control" value="<?php echo $row->data_id ?>" name="chemist_id1"  />
        <input type="hidden" class="form-control" value="<?php echo $row->chemist_id ?>" name="chemist_id"  />
        <div class="form-group">
            <input type="text" class="form-control" value="<?php echo $row->No_of_Chemist_Met ?>" name="No_of_Chemist_Met" placeholder="No Of Chemist Met" />
        </div>
        <div class="form-group">
            <label>RXS Of ASTHALIN MDI</label>
            <input type="number" class="form-control" value="<?php echo $row->ASTHALIN_MDI ?>" name="ASTHALIN_MDI" placeholder="RXS Of ASTHALIN MDI" /> </div>
        <div class="form-group">
            <label>RXS Of ASTHALIN DPI</label>
            <input type="number" class="form-control" value="<?php echo $row->ASTHALIN_DPI ?>" name="ASTHALIN_DPI" placeholder="RXS Of ASTHALIN_DPI"/> </div>
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
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-7">
                    Name Of Chemist Met
                    <input type="text" class="form-control" value="<?php echo $row->Legendary_Chemist_Met; ?>" name="Legendary_Chemist_Met" placeholder="Name of Legendary Chemist Met"/> 
                </div>  
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-5 leftpad">
                    Mobile No
                    <input type="number" class="form-control" value="<?php echo $row->Mobile_no; ?>" name="Mobile_no" placeholder="Mobile No" /> 
                </div>
            </div>
        </div> <br>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-7">
                    <input type="text" class="form-control" value="<?php echo $row->Legendary_Chemist_Met1; ?>" name="Legendary_Chemist_Met1" placeholder="Name of Legendary Chemist Met"/> 
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-5 leftpad">
                    <input type="number" class="form-control" value="<?php echo $row->Mobile_no1; ?>" name="Mobile_no1" placeholder="Mobile No" /> 
                </div>
            </div> 
        </div> <br>
        <div class="row"> 
            <div class="form-group">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-7"> 
                    <input type="text" class="form-control" value="<?php echo $row->Legendary_Chemist_Met2; ?>" name="Legendary_Chemist_Met2" placeholder="Name of Legendary Chemist Met"/> 
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-5 leftpad">
                    <input type="number" class="form-control" value="<?php echo $row->Mobile_no2; ?>" name="Mobile_no2" placeholder="Mobile No" /> 
                </div>
            </div>
        </div> <br>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-7">
                    <input type="text" class="form-control" value="<?php echo $row->Legendary_Chemist_Met3; ?>" name="Legendary_Chemist_Met3" placeholder="Name of Legendary Chemist Met"/> 
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-5 leftpad">
                    <input type="number" class="form-control" value="<?php echo $row->Mobile_no3; ?>" name="Mobile_no3" placeholder="Mobile No" />
                </div>
            </div> 
        </div> <br>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-7">
                    <input type="text" class="form-control" value="<?php echo $row->Legendary_Chemist_Met4; ?>" name="Legendary_Chemist_Met4" placeholder="Name of Legendary Chemist Met"/>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-5 leftpad">
                    <input type="number" class="form-control" value="<?php echo $row->Mobile_no4; ?>" name="Mobile_no4" placeholder="Mobile No" />
                </div>

            </div>
        </div>
        <br>


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