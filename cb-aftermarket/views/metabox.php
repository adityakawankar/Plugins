<div class="cb-aftermarket-meta-box">
	<input type="hidden" name="<?php echo $this->token; ?>[metabox]" value="1" />
	
	<label>
		<div><strong>Date</strong></div>
		<input type="text" class="widefat" name="<?php echo $this->token; ?>[date]" value="<?php echo $date; ?>"/>
	</label>
	<p class="help">Variable Name: <tt>date</tt></p>

	<label>
		<div><strong>location</strong></div>
		<input type="text" class="widefat" name="<?php echo $this->token; ?>[location]" value="<?php echo $location; ?>"/>
	</label>
	<p class="help">Variable Name: <tt>location</tt></p>

	<label>
		<div><strong>URL</strong></div>
		<input type="text" class="widefat" name="<?php echo $this->token; ?>[url]" value="<?php echo $url; ?>"/>
	</label>
	<p class="help">Variable Name: <tt>url</tt></p>

	<label>
		<div><strong>Other</strong></div>
		<input type="text" class="widefat" name="<?php echo $this->token; ?>[other]" value="<?php echo $other; ?>"/>
	</label>
	<p class="help">Variable Name: <tt>other</tt></p>
</div>