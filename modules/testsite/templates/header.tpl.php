<div class="logo">
<a class="header_heading" <?php _lh($link); ?> <?php _ib($logo, ['height' => 200, ]); ?>>&nbsp;</a>

</div>


<div class="header_menu">
	<?php foreach($items as $item): ?>
		<a class="header_menu_item <?= !empty($item['link']['cms_page_id']) && $item['link']['cms_page_id'] == $page['cms_page_id'] ? ' header_menu_item_active ' : '' ?>>"
			<?php _lh($item['link']); ?>>

				<?= $item['text'] ?>

		
		</a>
	<?php endforeach ?>
</div>
