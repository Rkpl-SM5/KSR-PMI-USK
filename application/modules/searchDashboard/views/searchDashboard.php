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
                            <div class="col col-md-8 centered-content">
                                <div class="input-group">
                                    <input type="text" id="input1-group2" name="input1-group2" placeholder="Golongan Darah"
                                        class="form-control">
                                    <div class="input-group-btn">
                                        <div class="btn-group">
                                            <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" class="dropdown-toggle btn btn-primary"></button>
                                            <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                                <button type="button" tabindex="0" class="dropdown-item">Golongan Darah</button>
                                                <button type="button" tabindex="0" class="dropdown-item">Tempat Tinggal</button>
                                                <button type="button" tabindex="0" class="dropdown-item">Tahun</button>
                                                <button type="button" tabindex="0" class="dropdown-item">Nama</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group-addon add-search"><i class="fa fa-plus"></i></div>
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




