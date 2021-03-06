<div class="row">
    <div class="col-xs-12 ">
        <div class="panel">
            <?php
            $attributes = array('method' => 'GET');
            echo form_open('User/view_tour', $attributes);
            ?>
            <?php if ($this->session->userdata('Designation') == 'BM' || $this->session->userdata('Designation') == 'SM'|| strtoupper($this->session->userdata('Designation')) == 'ADMIN' ) { ?>
                <?php echo isset($smlist) ? $smlist : ''; ?>
                <?php echo isset($bmlist) ? $bmlist : ''; ?>
                <?php echo isset($tmlist) ? $tmlist : ''; ?>
                <?php echo isset($zone) ? $zone : ''; ?>
                <?php echo isset($region) ? $region : ''; ?>
                <button type="submit" class="btn btn-primary">Fetch</button>
                <?php
            }
            ?>
            <a download="Doctor<?php echo date('dM g-i-a'); ?>.xls" class="btn btn-success pull" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheeting');"><i class="fa fa-arrow-circle-o-right"></i> Export</a>
            </form>
        </div>
    </div>

    <div class="col-lg-12 table-responsive" >
        <table class="table table-bordered table-hover panel" id="datatable">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>No of Taxi Tour</th>
                    <th>Location</th>
                    <th>Chemist Count</th>
                    <th>No of Bike Tour</th>
                    <th>Location</th>
                    <th>Chemist Count</th>
                    <th>POB Of ASTHALIN MDI</th>
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
                            <td data-title="No of Taxi Tour"><?php echo $row->Taxi_Tour; ?></td>
                            <td data-title="Location"><?php echo $row->Location_taxi; ?></td>
                            <td data-title="Chemist Count"><?php echo $row->chemist_taxi; ?></td>  
                            <td data-title="No of Taxi Tour"><?php echo $row->bike_tour; ?></td>
                            <td data-title="Location"><?php echo $row->Location_bike; ?></td>
                            <td data-title="Chemist Count"><?php echo $row->chemist_bike; ?></td>
                            <td data-title="POB Of ASTHALIN MDI"><?php echo $row->ASTHALIN_MDI; ?> </td> 
                            <td data-title="POB Of ASTHALIN DPI"><?php echo $row->ASTHALIN_DPI; ?></td>  
                            <td data-title="POB Of AEROCORT FORTE ROTACAPS"><?php echo $row->AEROCORT_FORTE_ROTACAPS; ?></td> 
                            <td data-title="POB Of AEROCORT ROTACAPS"><?php echo $row->AEROCORT_ROTACAPS; ?></td> 
                            <td data-title="POB Of AEROCORT MDI"><?php echo $row->AEROCORT_MDI; ?></td>
                            <td data-title="Other"><?php echo $row->Other; ?></td>  




                            <td>  
                                <?php if ($this->session->userdata('Designation') == 'TM') { ?>
                                    <a class="fa fa-trash-o btn-danger btn-xs" class=""  onclick="deletedoc('<?php echo site_url('User/tour_del?id=') . $row->tour_id; ?>')"></a> 
                                    <a class="fa fa-pencil btn-success btn-xs" onclick="window.location = '<?php echo site_url('User/update_tour?id=') . $row->tour_id; ?>';"></a>                               
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