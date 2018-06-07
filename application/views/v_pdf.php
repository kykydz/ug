<?php foreach($data_po->result_array() as $row):?>
<div style="width: 100%; height: 50px; border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
    <div style="float: left; width: 50%;">
        <h1 style="margin-top: 5px; text-align: center; margin-bottom: 0;">Delivery Notes</h1>
    </div>
    <!-- <div style="float: left; width: 15%"></div> -->

</div>
<div style="clear: both;"></div>
<div style="width: 50%; float: left; border-top: 1px solid #000; border-left: 1px solid #000; height: 20px;">
    <p style="margin: 0; padding: 0;">From :</p>
</div>
<div style="width: 50%; float: right; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; height: 20px;">
    <p style="margin: 0; padding: 0;">To :</p>
</div>
<div style="clear: both;">

</div>
<div style="width: 50%; float: left; border-bottom: 1px solid #000; border-top: 1px solid #000; border-left: 1px solid #000; height: 120px;">
    <p style="margin: 0;"><?= $row['nama_vendor']?></p>
    <p style="margin: 0;"><?= $row['alamat_vendor']?></p>

</div>
<div style="width: 50%; float: right; border: 1px solid #000; height: 120px; ">
  <p style="margin: 0;"><?= $row['nama_perusahaan']?></p>
  <p style="margin: 0;"><?= $row['alamat_penagihan']?></p>
</div>
<div style="clear: both;"></div>
<div style="width: 33,333%; height: 20px; float: left; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
    <p style="margin: 0; padding: 0; text-align: center;">PO Number</p>
</div>
<div style="width: 33,333%; height: 20px; float: left; border-bottom: 1px solid #000; border-right: 1px solid #000;">
    <p style="margin: 0; padding: 0; text-align: center">PO Date</p>
</div>
<div style="width: 33,333%; height: 20px; float: left; border-bottom: 1px solid #000; border-right: 1px solid #000;">
    <p style="margin: 0; padding: 0; text-align: center">Delivered to :</p>
</div>
<div style="clear: both;"></div>
<div style="width: 33,333%; height: 20px; float: left; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
    <p style="margin: 0; padding: 0; text-align: center">
      <?= $row['nomor_po']?>
    </p>
</div>
<div style="width: 33,333%; height: 20px; float: left; border-bottom: 1px solid #000; border-right: 1px solid #000;">
    <p style="margin: 0; padding: 0; text-align: center">
        <?= $row['created_at'] ?>
    </p>
</div>
<div style="width: 33,333%; height: 20px; float: left; border-bottom: 1px solid #000; border-right: 1px solid #000;">
    <p style="margin: 0; padding: 0; text-align: center">
      <?= $row['nama_perusahaan']?>
    </p>
</div>
<div style="clear: both;"></div>
<br>
<table style="width: 100%;" border="1">
    <tr>
        <td>No</td>
        <td>Description</td>
        <td>Qty</td>
        <td>Unit Price (Rp)</td>
        <td>Amount (Rp)</td>
    </tr>
      <?php foreach($data_barang as $br):
        $no=1;
        ?>
    <tr align="right">
        <td><?=$no++?></td>
        <td><?php echo $br->nama_barang?></td>
        <td><?php echo $br->jumlah_barang?></td>
        <td><?php echo number_format($br->harga_satuan)?></td>
        <td><?php echo number_format($br->total)?></td>
    </tr>
  <?php endforeach?>
  <tr align="right">
      <td colspan="4">Total Price</td>
      <td><?php echo number_format($total_harga)?></td>
  </tr>


</table>
<div style="clear: both;"></div>
<div style="width: 50%; float: left;">

</div>
<div style="width: 50%; float: right;">
    <p>Tangerang, <?= $row['deadline_pengiriman'] ?></p>
    <p style="margin-top: 60px; margin-bottom: 0;">Alfonsus Bram R.N</p>
    <p style="margin: 0;"><b>Director</b></p>
    <p style="margin: 0;">PT Awan Integrasi Sandidata</p>
</div>
<div style="bottom: 0; position: absolute; width: 100%;">
    <p style="margin: 0;"><b>PT Awan Integrasi Sandidata</b></p>
    <p style="margin: 0;"><b>Head Office :</b> KEBAYORAN SQUARE BUSINESS PARK - Blok KQ/A-16 Bintaro Jaya Sektor 7</p>
    <p style="margin: 0;">JL.Boulevard Bintaro Jaya, Kota Tangerang Selatan, Banten 15224</p>
    <p style="margin: 0;"><b style="color: green;">Call Center.</b> +6221 2939 3999</p>
</div>
<?php endforeach ?>
