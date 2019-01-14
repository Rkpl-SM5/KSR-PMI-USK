<link href="<?php echo base_url(); ?>assets/theme/css/modules/galleryDashboard.css" rel="stylesheet">
<script type="text/javascript">
  <?php
    include APPPATH . "modules/articleDashboard/ajax/article.js";
    ?>
</script>

<div class="animated">
  <div class="card">
    <div id="editable" class="card-body">

        <!-- <button id="sort" class="btn btn-primary mb-1 fa fa-sort"> Sort</button> -->
        <button id="add" class="btn btn-primary mb-1 fa fa-plus" data-toggle="modal" data-target="#Activity-GroupModal">
        Add </button>
        <button id="delete" value="del" class="btn btn-danger mb-1 fa fa-trash-o"> Del</button>
        <button style="visibility:hidden" id="cancel" onclick="cancel()" value="del" class="btn btn-success mb-1 fa fa-undo"> Cancel</button>
    </div>
  </div>

  <div class="modal fade" id="Activity-GroupModal" tabindex="-1" role="dialog" aria-labelledby="MediumModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
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
            <form id="activity-group-form" action="#" method="post" class="">
              <div class="form-group"><label for="nf-name" class=" form-control-label">Name</label><input type="text" id="nf-name" name="Label" placeholder="Enter Name Group.." class="form-control"></div>

              <div class="form-group"><label for="nf-date" class=" form-control-label">Date</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <input class="form-control" type="date" id="nf-date" name="Make">
              </div>
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
          <button type="button" class="btn btn-primary confirm">Confirm</button>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row" id="activity-content">

</div>

<script>
  function resetForm() {
    document.getElementById("activity-group-form").reset();
  }
</script>
