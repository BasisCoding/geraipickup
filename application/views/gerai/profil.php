<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>DATA PROFIL</h3>
                                    </div>                                    
                                </div>
                                <div class="panel-body">
                                    
                                    <form id="form-update-gerai" enctype="multipart/form-data" class="" method="POST">
                                        <div class="block">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input class="form-control" type="text" name="username_update" readonly=""></input>
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" type="password" name="password_update"></input>
                                                </div>

                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" type="text" name="email_update" readonly=""></input>
                                                </div>

                                                <div class="form-group">
                                                    <label>Telepon</label>
                                                    <input class="form-control" type="text" name="telepon_update"></input>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nama Pemilik</label>
                                                    <input class="form-control" type="text" name="nama_lengkap_update"></input>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Gerai</label>
                                                    <input class="form-control" type="text" name="nama_gerai_update"></input>
                                                </div>

                                                <div class="form-group">
                                                    <label>HP</label>
                                                    <input class="form-control" type="text" name="hp_update"></input>
                                                </div>

                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input class="form-control" type="text" name="alamat_update"></input>
                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Provinsi</label>
                                                    <select class="provinsi form-control" name="prov_update"></select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Kota</label>
                                                    <select class="kota form-control" name="kota_update"></select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Kecamatan</label>
                                                    <select class="kecamatan form-control" name="kec_update"></select>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="block">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Koordinat</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="text" name="lat_update" id="lat" class="form-control" readonly="" placeholder="latitude">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" name="long_update" id="long" class="form-control" readonly="" placeholder="longitude">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block">
                                            <div class="panel-body panel-body-map">
                                                <div id="googleMap" style="width: 100%; height: 300px;"></div>
                                            </div>
                                        </div>

                                        <div class="pull-right">
                                            <button type="button" id="btn-update-gerai" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
