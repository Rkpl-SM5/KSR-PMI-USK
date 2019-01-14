<div class="ui-typography">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title" v-if="headerText"><?php $date = new DateTime($data->DATE);
                                                                echo $date->format('D, d-M-Y'); ?></strong>
                </div>
                <div class="card-body">
                    <div class="typo-headers" style="text-align: center;">
                        <h1 class="pb-2 display-4" style="margin-top: 30px;margin-bottom: 60px;">  <?php echo $data->TITLE ?></h1>

                    </div>
                    <div style="text-align: center;">
                        <img src="<?php echo base_url() . "Data/images/" . $data->ID_IMAGE ?>">
                    </div>

                    <div class="typo-articles" style="margin: 60px auto auto auto;width:95%">
                        <p style="color: #000000;font-size:14pt;text-align: justify;">
                            <?php echo $data->CONTENT ?>
                        </p>
                    </div>           
                </div>
            </div>
        </div>
    </div>
</div>