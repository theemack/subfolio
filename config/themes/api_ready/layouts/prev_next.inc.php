<div id="navigation">
	<span class="parent_dir">
		<?php echo SubfolioFiles::parent_link('Parent Directory'); ?>
  </span>

  <?php if (!SubfolioFiles::is_root()) { ?>
	<span class="prev_next">		
		<?php echo SubfolioFiles::previous_link_or_span('Previous', 'Previous Directory', 'previous', 'faded'); ?>
		<?php echo SubfolioFiles::next_link_or_span('Next', 'Next Directory', 'next', 'faded'); ?>
	</span>
  <?php } ?>  
</div>