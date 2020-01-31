<section class="content-header">
    <h1>
        <?=$title;?>
    </h1>
</section>

<section class="content">
    <div class="box">
        <div style="padding:5px;">
            <a href="<?=base_url('gaji');?>" class="btn btn-primary btn-xs btn-flat"><i class="fa fa-chevron-left"></i>
                Kembali</a>
        </div>
        <div class="row" style="padding:10px;">
            <div class="col-sm-3 col-xs-6">
                Nomor Induk Pegawai
                <address>
                    <strong><?=$detail->nip;?></strong>
                </address>
                Nama Lengkap
                <address>
                    <strong><?=$detail->nama;?></strong>
                </address>
            </div>
            <div class="col-sm-3 col-xs-6">
                Jenis Kelamin
                <address>
                    <strong><?=$detail->jk;?></strong>
                </address>
                Agama
                <address>
                    <strong><?=$detail->agama;?></strong>
                </address>
            </div>
            <div class="col-sm-3 col-xs-6">
                Nomor Telepon
                <address>
                    <strong><?=$detail->telp;?></strong>
                </address>
                Golongan
                <address>
                    <strong><?=$detail->golongan;?></strong>
                </address>
            </div>
            <div class="col-sm-3 col-xs-6">
                Tanggal Bayar
                <address>
                    <strong><?=$detail->tanggal;?></strong>
                </address>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th style="width:35%">Gaji Pokok</th>
                    <td style="width:4%">: Rp. </td>
                    <td style="width:10%;text-align:right;"><?=money($detail->gaji_pokok);?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Potongan</th>
                    <td>: Rp. </td>
                    <td style="text-align:right;"><?=money($detail->potongan);?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Tunjangan</th>
                    <td>: Rp. </td>
                    <td style="text-align:right;"><?=money($detail->tunjangan);?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Lembur (<?=$detail->jam_lembur;?> Jam)</th>
                    <td>: Rp. </td>
                    <td style="text-align:right;"><?=money($detail->jam_lembur*$detail->uang_lembur);?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Gaji Bersih</th>
                    <td>: Rp. </td>
                    <td style="text-align:right;font-weight:bold;"><?=money($detail->gaji_bersih);?></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</section>
