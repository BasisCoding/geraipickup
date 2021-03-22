<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Data Gerai</h3>
                                        <span>Gerai Yang Bekerja Sama Dengan Kami</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><button class="btn btn-default" data-toggle="modal" data-target="#modal_add_gerai"><span class="fa fa-plus"></span> Tambah</button></li>
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>                                  
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped datatable" id="table-gerai">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Nama Gerai</th>
                                                    <th>Nama Pemilik</th>
                                                    <th>Email</th>
                                                    <th>HP</th>
                                                    <th>Alamat</th>
                                                    <th>Lokasi</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-daftar-gerai"></tbody>
                                        </table>
                                    </div>
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

        <div class="modal" id="modal_add_gerai" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead">Tambah Data Gerai</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-add-gerai" enctype="multipart/form-data" class="" method="POST">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Gerai</label>
                                        <input type="text" name="nama_gerai" class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>Nama Pemilik</label>
                                        <input type="text" name="nama_pemilik" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>HP</label>
                                        <input type="number" name="hp" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="number" name="telepon" class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select class="provinsi form-control" name="prov"></select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kota</label>
                                        <select class="kota form-control" name="kota"></select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select class="kecamatan form-control" name="kec"></select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Koordinat</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="lat" id="lat" class="form-control" readonly="" placeholder="latitude">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="long" id="long" class="form-control" readonly="" placeholder="longitude">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="panel-body panel-body-map">
                                    <div id="googleMap" style="width: 100%; height: 300px;"></div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="btn-save-gerai">Save</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>

        <div class="modal" id="modal_update_gerai" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead">Update Data Gerai</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-update-gerai" enctype="multipart/form-data" class="" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username_update" class="form-control" readonly="">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email_update" class="form-control" readonly="">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Gerai</label>
                                        <input type="text" name="nama_gerai_update" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label>Nama Pemilik</label>
                                        <input type="text" name="nama_pemilik_update" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>HP</label>
                                        <input type="number" name="hp_update" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="number" name="telepon_update" class="form-control">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat_update" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Koordinat</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="lat_update" id="lat_update" class="form-control" readonly="" placeholder="latitude">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="long_update" id="long_update" class="form-control" readonly="" placeholder="longitude">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="panel-body panel-body-map">
                                    <div id="googleMap_update" style="width: 100%; height: 300px;"></div>
                                </div>
                                
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="btn-update-gerai">Update</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>