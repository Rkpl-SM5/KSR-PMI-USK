<!-- <link href="<?php echo base_url(); ?>assets/theme/css/modules/galleryDashboard.css" rel="stylesheet"> -->
<script type="text/javascript">
    <?php
    include APPPATH . "modules/donorDashboard/ajax/donor.js";
    ?>
</script>
<div class="row">
    <div class="col-lg-8 centered-content">
        <div class="card">
            <div class="card-header">
                <strong>Donor</strong>
            </div>
            <div class="card-body card-block">
                <form id="form-donor" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-btn">
                                </div>
                                <input type="text" name="nama" placeholder="Nama" class="form-control">
                            </div>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-btn">
                                </div>
                                <input type="text" name="kontak" placeholder="Kontak" class="form-control">
                            </div>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-btn">
                                </div>
                                <input type="text" name="alamat" placeholder="Alamat" class="form-control">
                            </div>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-btn">
                                </div>
								<select name="jenisKelamin" class="form-control">
									<option disabled selected value>Jenis Kelamin</option>
									<option value="L">Laki-Laki</option>
									<option value="P">Perempuan</option>
								</select>
                            </div>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-btn">
                                </div>
                                <input type="text" name="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-btn">
                                </div>
                                <input type="text" name="kegiatan" placeholder="Kegiatan" class="form-control">
								<input type="date" name="tanggal" placeholder="Tgl_kegiatan" class="form-control">
                            </div>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-btn">
                                </div>
								<select name="golonganDarah" class="form-control">
									<option disabled selected value>Golongan Darah</option>
									<option value="O-">O-</option>
									<option value="O+">O+</option>
									<option value="A-">A-</option>
									<option value="A+">A+</option>
									<option value="B-">B-</option>
									<option value="B+">B+</option>
									<option value="AB-">AB-</option>
									<option value="AB+">AB+</option>
								</select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <div class="btn-group">
									<input type="button" class="btn btn-success btn-block btn-donor" name="card-header" value="Donor" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
