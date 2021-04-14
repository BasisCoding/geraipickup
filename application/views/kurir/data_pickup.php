<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Data Pickup</h3>
                                        <span>Pickup yang sesuai dengan zona anda.</span>
                                    </div>                                    
                                     <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>                                  
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped datatable" id="table-pickup">
                                            <thead>
                                                <tr>
                                                    <th>Kode Pickup</th>
                                                    <th>Nama Gerai</th>
                                                    <th>Tanggal Pickup</th>
                                                    <th>Jenis Paket</th>
                                                    <th>Jumlah Paket</th>
                                                    <th>Alamat</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-daftar-pickup"></tbody>
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

        <div class="modal" id="modal_pickup" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead">Siap Pickup</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-pickup" enctype="multipart/form-data" class="" method="POST">

                            <div class="form-group">
                                <label>Kode Pickup</label>
                                <input type="text" name="kode_pickup" class="form-control" required="" readonly="">
                            </div>

                            <div class="form-group">
                                <label>Nama Gerai</label>
                                <input type="text" name="nama_gerai" class="form-control" required="" readonly="">
                            </div>

                            <div class="form-group">
                                <label>Waktu Pickup</label>
                                <input type="datetime-local" name="tgl_pickup" class="form-control">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="btn-pickup">Save</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>

        <!-- <div class="modal" id="modal_update_kurir" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead">Update Data Kurir</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-update-pickup" enctype="multipart/form-data" class="" method="POST">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode Pickup</label>
                                        <input type="text" name="kode_pickup_update" class="form-control" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Paket</label>
                                        <select class="form-control" name="jenis_paket_update">
                                            <option value="ONS">ONS (1 Hari Sampai)</option>
                                            <option value="REG">REG (2-3 Hari Sampai)</option>
                                            <option value="ECO">ECO (4-5 Hari Sampai)</option>
                                            <option value="TRC">TRC (7 Hari Sampai)</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah Paket</label>
                                        <input type="number" name="jumlah_paket_update" class="form-control">
                                    </div>

                                </div>
                               
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="btn-update-pickup">Save</button>
                    </div>
                        </form>
                </div>
            </div>
        </div> -->