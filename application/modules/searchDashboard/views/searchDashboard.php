<link href="<?php echo base_url(); ?>assets/theme/css/modules/search.css" rel="stylesheet">

<div id="search-content" class="row">
    <script type="text/javascript">
        <?php
        include APPPATH . "modules/searchDashboard/ajax/search.js";
        ?>
    </script>
    <div class="col-lg-12">
        <div class="feed-box text-center">
            <section class="card">
                <div class="card-body">
                    <form id="form-search" class="form-horizontal" onkeypress="return event.keyCode != 13">
                        <div class="row form-group">
                            <div id="search-input-add" class="col col-md-8 centered-content">
                                <div class="input-group spaceBefore-30">
                                    <input type="text" name="search" placeholder="Golongan Darah" class="form-control form-data" data-kolom="GOLONGAN_DARAH">
                                    <div class="input-group-btn ">
                                        <div class="btn-group">
                                            <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" class="dropdown-toggle btn btn-primary"></button>
                                            <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                                <button onclick="setVal('GOLONGAN_DARAH',this);" type="button" tabindex="0" class="dropdown-item">Golongan Darah</button>
                                                <button onclick="setVal('ALAMAT',this);" type="button" tabindex="0" class="dropdown-item">Tempat Tinggal</button>
                                                <button onclick="setVal('TANGGAL',this);" type="button" tabindex="0" class="dropdown-item">Tahun</button>
                                                <button onclick="setVal('NAMA',this);" type="button" tabindex="0" class="dropdown-item">Nama</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="btn-input" class="input-group-addon add-search"  onclick="addInput(this)"><i class="fa fa-plus"></i></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-search">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>




