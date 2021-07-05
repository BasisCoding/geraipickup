<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Laporan Per Gerai</h3>

                                    <div class="btn-group pull-right">

                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'json',escape:'false'});"><img src='<?= base_url('assets/img/icons/json.png') ?>' width="24"/> JSON</a></li>
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='<?= base_url('assets/img/icons/json.png') ?>' width="24"/> JSON (ignoreColumn)</a></li>
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'json',escape:'true'});"><img src='<?= base_url('assets/img/icons/json.png') ?>' width="24"/> JSON (with Escape)</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'xml',escape:'false'});"><img src='<?= base_url('assets/img/icons/xml.png') ?>' width="24"/> XML</a></li>
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'sql'});"><img src='<?= base_url('assets/img/icons/sql.png') ?>' width="24"/> SQL</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'csv',escape:'false'});"><img src='<?= base_url('assets/img/icons/csv.png') ?>' width="24"/> CSV</a></li>
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'txt',escape:'false'});"><img src='<?= base_url('assets/img/icons/txt.png') ?>' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'excel',escape:'false'});"><img src='<?= base_url('assets/img/icons/xls.png') ?>' width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'doc',escape:'false'});"><img src='<?= base_url('assets/img/icons/word.png') ?>' width="24"/> Word</a></li>
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'powerpoint',escape:'false'});"><img src='<?= base_url('assets/img/icons/ppt.png') ?>' width="24"/> PowerPoint</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'png',escape:'false'});"><img src='<?= base_url('assets/img/icons/png.png') ?>' width="24"/> PNG</a></li>
                                            <li><a href="#" onClick ="$('#table-data').tableExport({type:'pdf',escape:'false'});"><img src='<?= base_url('assets/img/icons/pdf.png') ?>' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                     
                                </div>                              
                                <div class="block">
                                    <div class="form-inline mr-2">
                                        <input type="date" name="start_date" class="form-control" placeholder="Dari">
                                        <input type="date" name="end_date" class="form-control" placeholder="Sampai">
                                        <button type="button" id="btn-filter" class="btn btn-sm btn-primary">Filter</button>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped datatable" id="table-data">
                                            <thead>
                                                <tr>
                                                    <th>Kode Pickup</th>
                                                    <th>Nama Gerai</th>
                                                    <th>Tanggal</th>
                                                    <th>Jenis</th>
                                                    <th>Jumlah</th>
                                                    <th>Status</th>
                                                    <th>Kurir</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-data-laporan"></tbody>
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