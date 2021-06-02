<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Data Pickup</h3>
                                        <span>Data pickup yang sudah tersedia.</span>
                                    </div>                                    
                                     <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>                                  
                                        <li><a href="#" span class="fa fa-expand"></span></a></li>                                  
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="table-responsive">
                                        <div class="form-group col-md-2">
                                            <label>Filter Status</label>
                                            <select class="form-control" id="filter-status">
                                                <option value="">Semua Status</option>
                                                <option value="0">Belum Pickup</option>
                                                <option value="1">Proses Pickup</option>
                                                <option value="2">Proses Validasi</option>
                                                <option value="3">Selesai</option>
                                            </select>
                                        </div>
                                        <table class="table table-bordered table-striped datatable" id="table-pickup">
                                            <thead>
                                                <tr>
                                                    <th>Kode Pickup</th>
                                                    <th>Nama Gerai</th>
                                                    <th>Nama Kurir</th>
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