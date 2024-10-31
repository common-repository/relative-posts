<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
    <input 
        class='widefat'
        id="<?php echo $this->get_field_id('title');?>"
        name="<?php echo $this->get_field_name('title');?>"
        value="<?php echo (isset($title) && !$title=='') ? esc_attr($title) : "You Also Might Like..."; ?>" 
    />
</p>
<p>
    <label for="<?php echo $this->get_field_id('max_number'); ?>">Max Number Of Posts: </label>
    <input 
        class='widefat'
        id="<?php echo $this->get_field_id('max_number');?>"
        name="<?php echo $this->get_field_name('max_number');?>"
        value="<?php echo (isset($max_number) && !$max_number=='' ) ? esc_attr($max_number) : '5'; ?>" 
    />
</p>
<p> 
    <label for="<?php echo $this->get_field_id('thumb_check');?>">Use Thumbnails:</label>
    <input id="<?php echo $this->get_field_id('thumb_check');?>" 
        name="<?php echo $this->get_field_name('thumb_check');?>" type='checkbox' 
        value="1"
        <?php echo ($thumb_check=="1") ?'checked="checked"' : '' ; ?>
    /> 
</p>
<p>
    <label for="<?php echo $this->get_field_id('title_check');?>">Post Title Length:</label>
    <input id="<?php echo $this->get_field_id('title_check');?>" 
        name="<?php echo $this->get_field_name('title_check');?>" type='checkbox' 
        value="1"
        <?php echo ($title_check=="1") ?'checked="checked"' : '' ;?>
    /> 
    <input 
        class='widefat'
        id="<?php echo $this->get_field_id('title_length');?>"
        name="<?php echo $this->get_field_name('title_length');?>"
        value="<?php echo (isset($title_length) && !$title_length=='' ) ? esc_attr($title_length) : '50'; ?>"
    />
</p>