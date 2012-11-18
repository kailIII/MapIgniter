<?php

/**
 * MapIgniter
 *
 * An open source GeoCMS application
 *
 * @package		MapIgniter
 * @author		Marco Afonso
 * @copyright	Copyright (c) 2012, Marco Afonso
 * @license		dual license, one of two: Apache v2 or GPL
 * @link		http://marcoafonso.com/miwiki/doku.php
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------
// Dirty way to get block slot.
$slots = $layout->ownLslot;
foreach ($slots as $item) {
    $blocks = $item->sharedLblock;
    if (!empty($blocks)) :
        foreach ($blocks as $tblock) {
            if ($tblock->id == $block->id) $slot_id = $item->id;
        }
    endif;
}
?>
<h2>Configure layout block</h2>
<? if (empty($block)) : ?>
<p>The block does not exists!</p>
<? else : ?>
    <form method="post" action="<?=base_url()?>admin/adminlayouts/saveblock/<?=$layout->id?>/<?=$block->id?>">
        <label>Name</label>
        <input type="text" name="name" value="<?=$block->name?>" />
        <label>Slot</label>
        <select name="slot_id">
            <? foreach ($slots as $item) { ?>
            <option value="<?=$item->id?>"<?=$item->id == $slot_id ? 'selected="selected"' : ''?>><?=$item->name?></option>
            <? } ?>
        </select>
        <label>Module</label>
        <p><?=$block->module->name?></p>
        <? if ($module_items) : ?>
        <label>Instance</label>
        <select id="module_item" name="module_item">
            <? foreach ($module_items as $item) { 
                $itemname = empty($item->name) ? $item->title : $item->name;
                ?>
            <option value="<?=$item->id?>" <?=$item->id == $block->item ? 'selected="selected"' : ''?>><?=$itemname?></option>
            <? } ?>
        </select>
        <? endif ?>
        <label>Adicional configuration (json)</label>
        <textarea name="config" rows="6" cols="80"><?=$block->config?></textarea>
        <input type="hidden" name="old_slot_id" value="<?=$slot_id?>" />
        <input type="hidden" name="module_id" value="<?=$block->module->id?>" />
        <button type="submit">Save</button>
    </form>
<? endif; ?>
<a href="<?=base_url()?>admin/adminlayouts/edit/<?=$layout->id?>#editblocks">Back to layout</a>