<link href="<?php echo base_url(); ?>assets/theme/css/modules/galleryDashboard.css" rel="stylesheet">
<script type="text/javascript">
    <?php
     include APPPATH . "modules/ArticleDashboard/ajax/article.js";
    ?>
</script>

<div class="animated">
    <div class="card">
        <div class="card-body">
            <button id="sort" class="btn btn-primary mb-1 fa fa-sort"> Sort</button>
            <button id="add" type="button" class="btn btn-primary mb-1 fa fa-plus" data-toggle="modal" data-target="#largeModal">
                Add
            </button>
        </div>
    </div>
    
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Large Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra.
                        The plains zebra
                        and the mountain zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole
                        species of subgenus
                        Dolichohippus. The latter resembles an ass, to which it is closely related, while the former
                        two are more
                        horse-like. All three belong to the genus Equus, along with other living equids.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="ti-server text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Activities</div>
                            <div class="stat-text">Total: 765</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>