<link href="<?php echo base_url(); ?>assets/theme/css/modules/articleDashboard.css" rel="stylesheet">
<script type="text/javascript">
  <?php
include APPPATH . "modules/articleDashboard/ajax/article.js";
?>
</script>

<div class="animated">
  <div class="card">
    <div id="editable" class="card-body">

      <button id="sort" class="btn btn-primary mb-1 fa fa-sort"> Sort</button>
      <button id="add" class="btn btn-primary mb-1 fa fa-plus" data-toggle="modal" data-target="#Activity-GroupModal">
        Add </button>
      <button id="delete" value="del" class="btn btn-danger mb-1 fa fa-trash-o"> Del</button>
      <button style="visibility:hidden" id="cancel" onclick="cancel()" value="del" class="btn btn-success mb-1 fa fa-undo"> Cancel</button>
    </div>
  </div>


  <div class="modal fade" id="Activity-GroupModal" tabindex="-1" role="dialog" aria-labelledby="MediumModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="MediumModalLabel">Add Group Activity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="card-header">
          </div>
          <div class="card-body card-block">

            <!-- Form add activity -->
            <form id="activity-form" action="#" method="post" class="" enctype="multipart/form-data">

              <input type="hidden" name="Id_Label" value="<?php echo $id; ?>">

              <div class="form-group">
                <label for="nf-title" class=" form-control-label">Title</label>
                <input type="text" id="nf-name" name="Title" placeholder="Enter Title.." class="form-control">
              </div>

              <div class="form-group">
                <label for="nf-content">Content</label>
                <textarea class="form-control" rows="4" cols="50" name="Content" form="activity-form"></textarea>
              </div>

              <div class="form-group"><label for="nf-date" class=" form-control-label">Date</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                  <input class="form-control" type="date" id="nf-date" name="Date">
                </div>
              </div>

              <div class="form-group">
                    <label id="image-label" for="nf-image" class=" form-control-label">Image</label>
                  <input class="form-control-file" type="file" id="nf-image" name="Image" accept="image/png, image/jpeg">
              </div>

            </form>

          </div>
          <div class="card-footer">
            <button onclick="resetForm()" type="reset" class="btn btn-danger btn-sm">
              <i class="fa fa-ban"></i> Clear
            </button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary submit-activity">Confirm</button>
        </div>
      </div>
    </div>
  </div>

</div>


<div class="card">
  <div class="card-header">
    <strong class="card-title">Activity</strong>
  </div>
  <div class="table-stats order-table ov-h">
    <table class="table ">
      <thead>
        <tr>
          <th class="serial">Date</th>
          <th>Title</th>
          <th>Content</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <?php
                $query=$this->Model_lib->SelectQuery("SELECT * FROM activities WHERE ID_LABLE = $id");

                foreach ($query->result() as $row) {
                  echo '
                  <tr>
                    <td class="serial">'.$row->DATE.'</td>
                    <td> <span class="name">'.$row->TITLE.'</span> </td>
                    <td> <span>'.$row->CONTENT.'</span> </td>
                    <td><span>'.$row->ID_IMAGE.'</span></td>
                  </tr>
                  ';

                }
             ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  function resetForm() {
    document.getElementById("activity-form").reset();
  }
</script>
