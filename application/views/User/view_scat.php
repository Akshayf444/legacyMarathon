
<div class="row">
           <div class="col-xs-12 ">
        <div class="panel">
            <?php
            $attributes = array('method' => 'GET');
            echo form_open('User/view_scat', $attributes);
            ?>
            <?php if ($this->session->userdata('Designation') == 'BM' || $this->session->userdata('Designation') == 'SM' ) { ?>
            <?php echo isset($bmlist) ? $bmlist : ''; ?>
                <?php echo isset($tmlist) ? $tmlist : ''; ?>
                
                <button type="submit" class="btn btn-primary">Fetch</button>
                <?php
            }
            ?>
            <a download="Doctor<?php echo date('dM g-i-a');?>.xls" class="btn btn-success pull" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheeting');"><i class="fa fa-arrow-circle-o-right"></i> Export</a>
            </form>
        </div>
    </div>

    <div class="col-lg-12 table-responsive" >
        <table class="table table-bordered table-hover panel" id="datatable">
            <thead>
                <tr>
                    <th>Sr.</th>

                    <th>Name of HQ</th>

                    <th>No of Attendee</th>
                    <th>RXS Of ASTHALIN MDI</th>
                    <th>POB Of ASTHALIN DP</th>
                    <th>POB Of AEROCORT FORTE ROTACAPS</th>
                    <th>POB Of AEROCORT ROTACAPS</th>
                    <th>POB Of AEROCORT_MDI</th>
                    <th>Other</th>


                    <?php if ($this->session->userdata('Designation') == 'TM') { ?>
                        <th>Action</th> <?php } ?>

                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                if (!empty($show)) {
                    foreach ($show as $row) :
                        ?><tr>  
                            <td data-title="Sr"><?php echo $count++; ?></td>

                            <td data-title="Name of HQ"><?php echo $row->No_of_SCAT; ?></td>

                            <td data-title="No of Attendee"><?php echo $row->No_of_Attendee; ?></td>
                            <td data-title="POB Of ASTHALIN MDI"><?php echo $row->ASTHALIN_MDI; ?> </td> 
                            <td data-title="POB Of ASTHALIN DPI"><?php echo $row->ASTHALIN_DPI; ?></td>  
                            <td data-title="POB Of AEROCORT FORTE ROTACAPS"><?php echo $row->AEROCORT_FORTE_ROTACAPS; ?></td> 
                            <td data-title="POB Of AEROCORT ROTACAPS"><?php echo $row->AEROCORT_ROTACAPS; ?></td> 
                            <td data-title="POB Of AEROCORT MDI"><?php echo $row->AEROCORT_MDI; ?></td>
                            <td data-title="Other"><?php echo $row->Other; ?></td>  



                            <td>  
                                <?php if ($this->session->userdata('Designation') == 'TM') { ?>
                                    <a class="fa fa-trash-o btn-danger btn-xs" class=""  onclick="deletedoc('<?php echo site_url('User/scat_del?id=') . $row->Scat_id; ?>')"></a> 
                                    <a class="fa fa-pencil btn-success btn-xs" onclick="window.location = '<?php echo site_url('User/update_scat?id=') . $row->Scat_id; ?>';"></a>                               
                                <?php } ?>
                            </td>

                        </tr>
                        <?php
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>



</div>
<script>
    function deletedoc(url) {
        var r = confirm("Are you sure you want to delete");
        if (r == true)
        {
            window.location = url;

        }
        else
        {
            return false;
        }
    }

</script>