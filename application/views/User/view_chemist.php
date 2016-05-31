<div class="row">
    <div class="col-lg-12 table-responsive" >
        <table class="table table-bordered table-hover panel" id="datatable">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>No Of Chemist Met</th>
                    <th>POB Of ASTHALIN MDI</th>
                    <th>POB Of ASTHALIN DP</th>
                    <th>POB Of AEROCORT FORTE ROTACAPS</th>
                    <th>POB Of AEROCORT ROTACAPS</th>
                    <th>POBOf AEROCORT_MDI</th>
                    <th>Other</th>
                    <th>Mobile No</th>
                    <th>Name of Legendary Chemist Met</th>


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
                            <td data-title="No Of Chemist Met"><?php echo $row->No_of_Chemist_Met; ?></td>
                            <td data-title="POB Of ASTHALIN MDI"><?php echo $row->ASTHALIN_MDI; ?> </td> 
                            <td data-title="POB Of ASTHALIN DPI"><?php echo $row->ASTHALIN_DPI; ?></td>  
                            <td data-title="POB Of AEROCORT FORTE ROTACAPS"><?php echo $row->AEROCORT_FORTE_ROTACAPS; ?></td> 
                            <td data-title="POB Of AEROCORT ROTACAPS"><?php echo $row->AEROCORT_ROTACAPS; ?></td> 
                            <td data-title="POB Of AEROCORT MDI"><?php echo $row->AEROCORT_MDI; ?></td>
                            <td data-title="Other"><?php echo $row->Other; ?></td>  
                            <td data-title="Mobile No"><?php echo $row->Mobile_no; ?></td>
                            <td data-title="Name of Legendary Chemist Met"><?php echo $row->Legendary_Chemist_Met; ?></td>


                            <td>  
                                <?php if ($this->session->userdata('Designation') == 'TM') { ?>
                                    <a class="fa fa-trash-o btn-danger btn-xs" class=""  onclick="deletedoc('<?php echo site_url('User/chemist_del?id=') . $row->chemist_id; ?>')"></a> 
                                    <a class="fa fa-pencil btn-success btn-xs" onclick="window.location = '<?php echo site_url('User/update_chemist?id=') . $row->chemist_id; ?>';"></a>                               
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