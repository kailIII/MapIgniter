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
 * @link		http://mapigniter.com/
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------
?><h2>Administration</h2>
<h3>Activity</h3>
<?php foreach ($graphs as $entity => &$attributes) { ?>
<p>
    <img src="<?=$attributes['image_url']?>" />
</p>
<?php } ?>