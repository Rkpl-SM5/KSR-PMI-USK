<link href="<?php echo base_url(); ?>assets/theme/css/modules/home.css" rel="stylesheet">
<script type="text/javascript">
    <?php
    include APPPATH . "modules/Home/ajax/home.js";
    ?>
</script>



<div class="row" style="margin-top: 430px;">
    <button id="contact" class="btn btn-danger"><i class="fa fa-phone"></i> Hubungi Kami</button>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body centered-content">

                <h1>KSR PMI</h1>
                <h1>UNIVERITAS SYIAH KUALA</h1>

                <h3>Pada dasarnya susah menemukan kata-kata yang bagus</h3>
                <h3>menemukan kata-kata yang bagus</h3>
                <h3>kata-kata yang bagus</h3>

            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h3>Statistics</h3>

            </div>
        </div>
    </div>

    <div class="col-lg-8" style="left: 23%;">
        <div class="row">
            <div class="col-lg-5">
                <div class="card text-white bg-flat-color-6">
                    <div class="card-body">
                        <div class="card-left pt-1 float-left">
                            <h3 class="mb-0 fw-r">
                                <span class="count float-left"><?php echo $all->total; ?></span>
                                <span><nbsp>Pendonor</span>
                            </h3>
                            <p class="text-light mt-1 m-0">Sepanjang KRS Berdiri</p>
                        </div>
                        <div class="card-right float-right text-right">
                            <div id="flotBar1" class="flotBar1" style="padding: 0px; position: relative;"><canvas class="flot-base"
                                    width="76" height="75" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 76px; height: 75px;"></canvas><canvas
                                    class="flot-overlay" width="76" height="75" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 76px; height: 75px;"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card text-white bg-flat-color-6">
                    <div class="card-body">
                        <div class="card-left pt-1 float-left">
                            <h3 class="mb-0 fw-r">
                                <span class="count float-left"><?php echo $year->total; ?></span>
                                <span>Pendonor</span>
                            </h3>
                            <p class="text-light mt-1 m-0">Pada Tahun <?php echo " " . (date("Y")) ?></p>
                        </div>
                        <div class="card-right float-right text-right">
                            <div id="flotBar1" class="flotBar1" style="padding: 0px; position: relative;"><canvas class="flot-base"
                                    width="76" height="75" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 76px; height: 75px;"></canvas><canvas
                                    class="flot-overlay" width="76" height="75" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 76px; height: 75px;"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
