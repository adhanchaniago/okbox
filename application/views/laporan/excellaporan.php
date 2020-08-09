<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
<tr>
	<th colspan="13"> Data Laporan</th>
</tr>
<tr>
 <th>NO</th>
 <th>TANGGAL RESI</th>
 <th>NO RESI</th>
 <th>NIK PENGIRIM</th>
 <th>NAMA PENGIRIM</th>
 <th>ALAMAT PENGIRIM</th>
 <th>TLP PENGIRIM</th>
 <th>EMAIL PENGIRIM</th>
 <th>NIK PENERIMA</th>
 <th>NAMA PENERIMA</th>
 <th>ALAMAT PENERIMA</th>
 <th>TLP PENERIMA</th>
 <th>EMAIL PENERIMA</th>
 <th>ASAL</th>
 <th>TUJUAN</th>
 <th>JUMLAH BARANG</th>
 <th>JENIS BARANG</th>
 <th>JENIS KIRIMAN</th>
 <th>JENIS MUATAN</th>
 <th>BERAT</th>
 <th>BERAT VOLUME</th>
 <th>HARGA/KG</th>
 <th>BIAYA KIRIM</th>
 <th>BIAYA PACKING</th>
 <th>ASURANSI</th>
 <th>PPN</th>
 <th>TOTAL</th>
 <th>Keterangan</th>
 </tr>
</thead>
<tbody>
<?php $i=1; foreach($excel as $excel) { 
	?>
<tr>
 <td><?php echo $i ?></td>
 <td><?php echo date('d-m-Y', strtotime($excel->tgl_transaksi)) ?></td>
 <td><?php echo $excel->noresi ?></td>
 <td><?php echo ' '.$excel->nikpengirim; ?></td>
 <td><?php echo $excel->namapengirim; ?></td>
 <td><?php echo $excel->alamatpengirim; ?></td>
 <td><?php echo $excel->tlppengirim; ?></td>
 <td><?php echo $excel->emailpengirim; ?></td>
 <td><?php echo ' '.$excel->nikpenerima; ?></td>
 <td><?php echo $excel->namapenerima; ?></td>
 <td><?php echo $excel->alamatpenerima; ?></td>
 <td><?php echo $excel->tlppenerima; ?></td>
 <td><?php echo $excel->emailpenerima; ?></td>
 <td><?php echo $excel->asal; ?></td>
 <td><?php echo $excel->tujuan; ?></td>
 <td><?php echo $excel->jumlahbarang; ?></td>
 <td><?php echo $excel->jenisbarang; ?></td>
 <td><?php echo $excel->jeniskiriman; ?></td>
 <td><?php echo $excel->jenismuatan; ?></td>
 <td><?php echo $excel->berat; ?></td>
 <td><?php echo $excel->beratvolume; ?></td>
 <td><?php echo 'Rp. '.number_format($excel->harga); ?></td>
 <td><?php echo 'Rp. '.number_format($excel->subharga); ?></td>
 <td><?php echo 'Rp. '.number_format($excel->biayapacking); ?></td>
 <td><?php echo 'Rp. '.number_format($excel->asuransi); ?></td>
 <td><?php echo 'Rp. '.number_format($excel->ppn); ?></td>
 <td><?php echo 'Rp. '.number_format($excel->total); ?></td>
 </tr>
<?php $i++; } ?>
</tbody>
</table>