<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_mails
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

?>
<button type="button" class="btn btn-danger" data-dismiss="modal">
	<?php echo Text::_('JCANCEL'); ?>
</button>
<button type="submit" id='mails-submit-button-id' class="btn btn-success"
        onclick='Joomla.submitbutton("template.sendTestMail")'>
	<?php echo Text::_('COM_MAILS_SEND_TEST_MAIL'); ?>
</button>
