<style type="text/css">
	* {
		font-size: 10px; 
	}
	table tbody tr td, table thead tr th{
		border-collapse: collapse;
		padding: 5px;
	}
	table thead tr th {
		background: #858585;
		color: #fff;
	}
</style>
<page>

<p><h2><?= $title; ?> PDF</h2></p>
	<table style="width: 1000px; border-collapse: collapse;" border="1">
		<thead>
			<tr>
				<?php if($title=='barang'){
				?>
					<th>Barcode</th>

				<?php
				}

				?> 
			<?php foreach ($fields as $field): ?>
				<th><?= ucwords(str_replace(['_', '-'], ' ', $field)); ?></th>
			<?php endforeach; ?>

			
			</tr>
		</thead>
		<tbody>
			<?php foreach($results as $row): ?>
			<tr>
				<?php if($title=='barang'){
				?>
					<td> 
						<?php
                              if (!empty($row->kode_inventaris)){

                              ?>

						<img src="<?= BASE_ASSET; ?>/barcode/barcode.php?codetype=Code39&size=40&text=<?php echo $row->kode_inventaris?>&print=true"/>

						 <?php
                                }
                              ?>

					</td>

				<?php

						}



				?> 
				<?php foreach ($fields as $field){ ?>
					<td><?= $row->{$field}; ?></td>
				<?php } ?>
				
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<code></code>

  <page_footer>
    [[page_cu]]/[[page_nb]]
  </page_footer>
</page>
