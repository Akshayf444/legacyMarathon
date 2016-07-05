   <?php
            $attributes = array('method' => 'GET');
            echo form_open('User/viewPdf', $attributes);
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
<?php if ($this->session->userdata('Designation') == 'TM') { ?>
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <input type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-primary pull-right" value="Upload PDF">

        </div>
    </div>
    <br/>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Image Upload</h4>
                </div> 
                <?php
                $attribute = array('enctype' => 'multipart/form-data', 'name' => 'form1', 'id' => 'form1');
                echo form_open('User/pdf', $attribute);
                ?>
                <div class="modal-body">
                    <h5 style="color: red"></h5>

                    <div class="form_group">
                        Choose your file: <br /> 
                        <input name="file" type="file" id="file" class="form-control" />
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="save"  name="submit" class="btn btn-primary">Save</button>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-bordered panel">
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <?php
            if (!empty($response)) {
                foreach ($response as $row) :
                    ?>
                    <tr>
                        <td><?php echo $row->title; ?></td>
                        <td><a href="<?php echo site_url('User/viewPdf/' . $row->pdf_id); ?>" class="btn btn-info btn-xs pull-right">View</a></td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </table>
    </div>
</div>