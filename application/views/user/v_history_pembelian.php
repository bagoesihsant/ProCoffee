<div id="all">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- breadcrumb-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">History pembelian</li>
                        </ol>
                    </nav>
                </div>
                <div id="basket" class="col-lg-12">
                    <?= $this->session->flashdata('message_va'); ?>
                    <div class="box">
                        <form method="post" action="checkout1.html">
                            <h1>History</h1>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kode Transaksi</th>
                                            <th>Waktu Transaksi</th>
                                            <th>Virtual Akun</th>
                                            <th>Status Pembayaran</th>
                                            <th>Total</th>
                                            <!-- <th colspan="2">Aksi</th> -->
                                            <th colspan="2">Dapatkan Virtual Akun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($row as $data) : ?>
                                            <tr>
                                                <td><?= $data->kode_transaksi ?></td>
                                                <td>
                                                    <?= $data->waktu_transaksi; ?>
                                                </td>
                                                <td>
                                                    <?php if (!$data->virtual_akun) : ?>
                                                        <p class="badge bg-danger">Belum ada Virtual Akun</p>
                                                    <?php else : ?>
                                                        <?= $data->virtual_akun ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($data->status_code == 201) : ?>
                                                        <p class="badge bg-warning">Pending</p>
                                                    <?php elseif ($data->status_code == 200) : ?>
                                                        <p class="badge bg-success">Success</p>
                                                    <?php elseif (!$data->status_code) : ?>
                                                        <p class="badge bg-danger">belum dapat Virtual akun</p>
                                                    <?php else : ?>
                                                        <p class="badge bg-danger">belum dapat Virtual akun</p>
                                                    <?php endif; ?>
                                                </td>
                                                <td>Rp. <?= $data->total_harga; ?></td>
                                                <!-- <td><a href="#"><i class="fa fa-trash-o"></i></a></td> -->
                                                <td colspan="2" class="text-center">
                                                    <?php if (!$data->virtual_akun) : ?>
                                                        <a class="btn btn-warning" href="<?= base_url('User/History/ambilnomorvirtual/' . $data->kode_transaksi) ?>">Ambil Virtual Account</a>
                                                    <?php else : ?>
                                                        <a class="btn btn-primary disabled">Virtual account aktif</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive-->
                        </form>
                    </div>
                    <!-- /.box-->
                </div>
                <!-- /.col-lg-9-->

                <!-- /.col-md-3-->
            </div>
        </div>
    </div>