<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                </div>
                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-stat">
                                <i class="fa fa-search"></i> Statistics
                            </button>
                        </div>
                        <input type="text" id="input-tahun" name="input1-group2" class="form-control">
                    </div>
                </div>
            </div>
            <canvas id="bar-chart-grouped" width="700" height="340"></canvas>
        </div>
    </div>
</div>

<script type="text/javascript">
    <?php
    include APPPATH . "modules/statisticsDashboard/ajax/statisticsDashboardAnnual.js";
    ?>
</script>