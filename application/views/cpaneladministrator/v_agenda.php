        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row" style="display: block;">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Agenda</h1> <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
                                <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if ($this->session->flashdata('alert')) { ?>
                                        <div class="alert alert-danger alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Gagal</strong> <?php echo $this->session->flashdata('alert'); ?>
                                        </div>
                                    <?php } ?>

                                    <?php if ($this->session->flashdata('sukses')) { ?>
                                        <div class="alert alert-success alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <span>Data Agenda Berhasil </span> <?php echo $this->session->flashdata('sukses'); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="card-box table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Agenda</th>
                                                    <th>Mulai-Selesai</th>
                                                    <th>Tempat</th>
                                                    <th>Waktu</th>
                                                    <th>Admin</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                foreach ($data->result_array() as $i) :
                                                    $no++;
                                                    $agenda_id = $i['agenda_id'];
                                                    $agenda_nama = $i['agenda_nama'];
                                                    $agenda_deskripsi = $i['agenda_deskripsi'];
                                                    $agenda_mulai = $i['agenda_mulai'];
                                                    $agenda_selesai = $i['agenda_selesai'];
                                                    $agenda_tempat = $i['agenda_tempat'];
                                                    $agenda_waktu = $i['agenda_waktu'];
                                                    $agenda_keterangan = $i['agenda_keterangan'];
                                                    $agenda_author = $i['agenda_author'];
                                                    $tanggal = $i['tanggal'];

                                                ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $tanggal; ?></td>
                                                        <td><?php echo $agenda_nama; ?></td>
                                                        <td><?php echo $agenda_mulai . ' s/d ' . $agenda_selesai; ?></td>
                                                        <td><?php echo $agenda_tempat; ?></td>
                                                        <td><?php echo $agenda_waktu; ?></td>
                                                        <td><?php echo $agenda_author; ?></td>
                                                        <td class="text-center">
                                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ModalEdit<?php echo $agenda_id; ?>">Ubah</a>
                                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $agenda_id; ?>"><span class="fa fa-trash"></span></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal tambah -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'cpaneladministrator/simpan_agenda' ?>" method="post">
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 pt-2 control-label">Nama Agenda</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xnama_agenda" class="form-control" id="inputUserName" placeholder="Nama Agenda" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 pt-2 control-label">Deskripsi</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" rows="6" name="xdeskripsi" placeholder="Deskripsi ..." required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 pt-3 control-label">Mulai</label>
                                <div class="col-sm-7 mt-2">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="xmulai" class="form-control pull-right datepicker3" required>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- Date range -->
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 mb-2 control-label">Selesai</label>
                                <div class="col-sm-7">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="xselesai" class="form-control pull-right datepicker4" required>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 pt-2 control-label">Tempat</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xtempat" class="form-control" id="inputUserName" placeholder="Tempat" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 pt-2 control-label">Waktu</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xwaktu" class="form-control" id="inputUserName" placeholder="Contoh: 10.30-11.00 WIB" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 pt-2 control-label">Keterangan</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" name="xketerangan" rows="2" placeholder="Keterangan ..."></textarea>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal edit -->
        <?php foreach ($data->result_array() as $i) :
            $agenda_id = $i['agenda_id'];
            $agenda_nama = $i['agenda_nama'];
            $agenda_deskripsi = $i['agenda_deskripsi'];
            $agenda_mulai = $i['agenda_mulai'];
            $agenda_selesai = $i['agenda_selesai'];
            $agenda_tempat = $i['agenda_tempat'];
            $agenda_waktu = $i['agenda_waktu'];
            $agenda_keterangan = $i['agenda_keterangan'];
            $agenda_author = $i['agenda_author'];
            $tangal = $i['tanggal'];
        ?>
            <div class="modal fade" id="ModalEdit<?php echo $agenda_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Agenda</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'cpaneladministrator/update_agenda' ?>" method="post">
                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 pt-2 control-label">Nama Agenda</label>
                                    <div class="col-sm-7">
                                        <input type="hidden" type="text" name="kode" value="<?php echo $agenda_id; ?>">
                                        <input type="text" name="xnama_agenda" class="form-control" value="<?php echo $agenda_nama; ?>" id="inputUserName" placeholder="Nama Agenda" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 pt-2 control-label">Deskripsi</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" rows="6" name="xdeskripsi" placeholder="Deskripsi ..." required><?php echo $agenda_deskripsi; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 pt-3 control-label">Mulai</label>
                                    <div class="col-sm-7 mt-2">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="xmulai" value="<?php echo $agenda_mulai; ?>" class="form-control pull-right datepicker3" required>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <!-- Date range -->
                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 mb-2 control-label">Selesai</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="xselesai" value="<?php echo $agenda_selesai; ?>" class="form-control pull-right datepicker4" required>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 pt-2 control-label">Tempat</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="xtempat" class="form-control" value="<?php echo $agenda_tempat; ?>" id="inputUserName" placeholder="Tempat" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 pt-2 control-label">Waktu</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="xwaktu" class="form-control" value="<?php echo $agenda_waktu; ?>" id="inputUserName" placeholder="Contoh: 10.30-11.00 WIB" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 pt-2 control-label">Keterangan</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" name="xketerangan" rows="2" placeholder="Keterangan ..."><?php echo $agenda_keterangan; ?></textarea>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-info btn-flat" id="simpan">Ubah</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        <!-- hapus agenda -->
        <?php foreach ($data->result_array() as $i) :
            $id = $i['agenda_id'];
            $agenda_nama = $i['agenda_nama'];
            $agenda_deskripsi = $i['agenda_deskripsi'];
            $agenda_mulai = $i['agenda_mulai'];
            $agenda_selesai = $i['agenda_selesai'];
            $agenda_tempat = $i['agenda_tempat'];
            $agenda_waktu = $i['agenda_waktu'];
            $agenda_keterangan = $i['agenda_keterangan'];
            $agenda_author = $i['agenda_author'];
            $tangal = $i['tanggal'];
        ?>
            <!--Modal Hapus Pengguna-->
            <div class="modal fade" id="ModalHapus<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Agenda</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'cpaneladministrator/hapus_agenda' ?>" method="post">
                                <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                                <p>Apakah Anda yakin mau menghapus <b> <?php echo $agenda_nama; ?></b> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger btn-flat" id="simpan">Hapus</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>