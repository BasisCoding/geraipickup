<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Data Kurir</h3>
                                        <span>Kurir yang bekerja dengan kami.</span>
                                    </div>                                    
                                     <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><button class="btn btn-default" data-toggle="modal" data-target="#modal_add_kurir"><span class="fa fa-plus"></span> Tambah</button></li>
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>                                  
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped datatable" id="table-kurir">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>HP</th>
                                                    <th>Wilayah</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-daftar-kurir"></tbody>
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

        <div class="modal" id="modal_add_kurir" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead">Tambah Data Kurir</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-add-kurir" enctype="multipart/form-data" class="" method="POST">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>HP</label>
                                        <input type="number" name="hp" class="form-control">
                                    </div>

                                </div>
                                
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control" required="">
                                    </div>
                                    
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
                            
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="btn-save-kurir">Save</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>

        <div class="modal" id="modal_update_kurir" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead">Update Data Kurir</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-update-kurir" enctype="multipart/form-data" class="" method="POST">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username_update" class="form-control" required="" readonly="">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email_update" class="form-control" required="" readonly="">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap_update" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>HP</label>
                                        <input type="number" name="hp_update" class="form-control">
                                    </div>

                                </div>
                                
                                <div class="col-md-6">
                                    
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
                            
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="btn-update-kurir">Save</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>