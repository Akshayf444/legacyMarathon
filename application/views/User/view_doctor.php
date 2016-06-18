<div class="row">
    <div class="col-xs-12 ">
        <div class="panel">
            <?php
            $attributes = array('method' => 'GET');
            echo form_open('User/view_doctor', $attributes);
            ?>
            <?php if ($this->session->userdata('Designation') == 'BM'
                    || $this->session->userdata('Designation') == 'SM' 
                    || $this->session->userdata('Designation') == 'ADMIN') { ?>
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
                    <th>Doctor Name</th>
                    <th>Head Quarters</th>
                    <th>Speciality</th>
                    <th>RXS Of ASTHALIN MDI</th>
                    <th>RXS Of ASTHALIN DP</th>
                    <th>RXS Of AEROCORT FORTE ROTACAPS</th>
                    <th>RXS Of AEROCORT ROTACAPS</th>
                    <th>RXS Of AEROCORT_MDI</th>
                    <th>Other</th>
                    <th>Part Of Fun</th> 

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
                            <td data-title="Doctor Name"><?php echo $row->Doctor_Name; ?></td>
                            <td data-title="Head Quarters"><?php echo $row->hq; ?></td>
                            <td data-title="Speciality"><?php echo $row->spl; ?></td>  
                            <td data-title="RXS Of ASTHALIN MDI"><?php echo $row->ASTHALIN_MDI; ?> </td> 
                            <td data-title="RXS Of ASTHALIN DPI"><?php echo $row->ASTHALIN_DPI; ?></td>  
                            <td data-title="RXS Of AEROCORT FORTE ROTACAPS"><?php echo $row->AEROCORT_FORTE_ROTACAPS; ?></td> 
                            <td data-title="RXS Of AEROCORT ROTACAPS"><?php echo $row->AEROCORT_ROTACAPS; ?></td> 
                            <td data-title="RXS Of AEROCORT MDI"><?php echo $row->AEROCORT_MDI; ?></td>
                            <td data-title="Other"><?php echo $row->Other; ?></td>  
                            <td data-title="Part Of Fun"><?php echo $row->part_of_fun; ?></td>



                            <td>  
                                <?php if ($this->session->userdata('Designation') == 'TM') { ?>
                                    <a class="fa fa-trash-o btn-danger btn-xs" class=""  onclick="deletedoc('<?php echo site_url('User/youngdoc_del?id=') . $row->doctor_id; ?>')"></a> 
                                    <a class="fa fa-pencil btn-success btn-xs" onclick="window.location = '<?php echo site_url('User/update_doc?id=') . $row->doctor_id; ?>';"></a>                               
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