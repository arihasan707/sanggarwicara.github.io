        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row" style="display: block;">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Inbox</h2>

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
                                            <strong>Berhasil</strong> <?php echo $this->session->flashdata('sukses'); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="card-box table-responsive">


                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="10px">No.</th>
                                                    <th width="100px">Tanggal & Waktu</th>
                                                    <th width="100px">Nama</th>
                                                    <th width="100px">Email</th>
                                                    <th width="50px">Kontak</th>
                                                    <th width="400px">Pesan</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                foreach ($data->result_array() as $i) :
                                                    $no++;
                                                    $id = $i['inbox_id'];
                                                    $tanggal = $i['inbox_tanggal'];
                                                    $nama = $i['inbox_nama'];
                                                    $email = $i['inbox_email'];
                                                    $kontak = $i['inbox_kontak'];
                                                    $pesan = $i['inbox_pesan'];
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $tanggal; ?></td>
                                                        <td><?php echo $nama; ?></td>
                                                        <td><?php echo $email; ?></td>
                                                        <td><?php echo $kontak; ?></td>
                                                        <td><?php echo $pesan; ?></td>
                                                        <td class="text-center">
                                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span class="fa fa-trash"></span></a>
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
        <!-- /page content -->