<style>
    .content-wrapper{
        min-height: 775px;
    }    
</style>
<?php
$attribute = array('id' => 'valid');
echo form_open('User/addchemist', $attribute);
?>
<div class="col-lg-16 col-sm-16 col-md-16 col-xs-16">
    <div class="form-group">
        <label>No Of Chemist Met</label>
        <input type="text" class="form-control" value="" name="No_of_Chemist_Met" placeholder="No Of Chemist Met" />
    </div>




    <div class="form-group">
        <label>RXS Of ASTHALIN_MDI</label>
        <input type="number" class="form-control" value="" name="ASTHALIN_MDI" placeholder=" POB Of ASTHALIN_MDI" /> </div>
    <div class="form-group">
        <label>RXS Of ASTHALIN_DPI</label>
        <input type="text" class="form-control" value="" name="ASTHALIN_DPI" placeholder="POB Of ASTHALIN_DPI"/> </div>
    <div class="form-group">
        <label>RXS Of AEROCORT_FORTE_ROTACAPS</label>
        <input type="text"  class="form-control" name="AEROCORT_FORTE_ROTACAPS" placeholder="POB Of AEROCORT_FORTE_ROTACAPS" >
    </div>	    
    <div class="form-group">
        <label>RXS Of AEROCORT_ROTACAPS</label>
        <input type="text"  class="form-control" name="AEROCORT_ROTACAPS" required="" placeholder="POB Of AEROCORT_ROTACAPS" >
    </div>	
    <div class="form-group">
         <label>RXS Of AEROCORT_MDI</label>
        <input type="text"  class="form-control" name="AEROCORT_MDI" placeholder=" POB Of AEROCORT_MDI" >
    </div>	
    <div class="form-group">
         <label>RXS Of Other</label>
        <input type="text"  class="form-control" name="Other" placeholder="POB Of Other" >
    </div>	
    <div class="row">
        <div class="form-group">
             
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
<label>Name of Legendary Chemist Met</label>
                <input type="text" class="form-control" value="" name="Legendary_Chemist_Met" placeholder="Name of Legendary Chemist Met"/> 
            </div>  
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                  <label>Mobile No</label>
                <input type="number" class="form-control" value="" name="Mobile_no" placeholder="Mobile No" /> 

            </div>
        </div> </div> <br>
        <div class="row">
            <div class="form-group">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
 <label>Name of Legendary Chemist Met</label>
                <input type="text" class="form-control" value="" name="Legendary_Chemist_Met1" placeholder="Name of Legendary Chemist Met"/> 
            </div>
             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                   <label>Mobile No</label>
                 <input type="number" class="form-control" value="" name="Mobile_no1" placeholder="Mobile No" /> 

            </div> 
            </div></div> <br>
            <div class="row"> 
                <div class="form-group">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6"> 
 <label>Name of Legendary Chemist Met</label>
                    <input type="text" class="form-control" value="" name="Legendary_Chemist_Met2" placeholder="Name of Legendary Chemist Met"/> 
                </div>
             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                   <label>Mobile No</label>
                 <input type="number" class="form-control" value="" name="Mobile_no2" placeholder="Mobile No" /> 
             </div> </div></div> <br>
                <div class="row">
                    <div class="form-group">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                         <label>Name of Legendary Chemist Met</label>
                        <input type="text" class="form-control" value="" name="Legendary_Chemist_Met3" placeholder="Name of Legendary Chemist Met"/> 
                    </div>
             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                   <label>Mobile No</label>
                 <input type="number" class="form-control" value="" name="Mobile_no3" placeholder="Mobile No" />

                        
                    </div>
             
                </div> 
                </div> <br>
        <div class="row">
            <div class="form-group">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
 <label>Name of Legendary Chemist Met</label>
                <input type="text" class="form-control" value="" name="Legendary_Chemist_Met4" placeholder="Name of Legendary Chemist Met"/>
            </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
              <label>Mobile No</label>
            <input type="number" class="form-control" value="" name="Mobile_no4" placeholder="Mobile No" />

            </div></div>
    </div> <br>
    
    <div class="form-group">
        


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

