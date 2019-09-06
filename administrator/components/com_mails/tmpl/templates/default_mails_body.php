<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_mails
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

HTMLHelper::_('formbehavior.chosen');

?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <label for="email"><?php echo Text::_('COM_MAILS_EMAIL'); ?></label>
            <input type="text" id="email" name="jform_email"
                   placeholder="<?php echo JText::_('COM_MAILS_EMAIL_PLACEHOLDER') ?>" class="form-control col-md-3"
                   required onkeypress="if(event.which === 13) {Joomla.submitbutton('template.sendTestMail');}">
            <p><?php echo Text::_('COM_MAILS_EMAIL_NODE'); ?></p>

        </div>
        <div class="col-6">
            <label for="templates"><?php echo Text::_('COM_MAILS_TEMPLATES'); ?></label>
            <select id="templates" name="templates[templates_id]" class="custom-select">
                <optgroup label="<?php echo Text::_('COM_MAILS_TEMPLATE_NAME'); ?>">
					<?php
					foreach ($this->items as $item)
					{
						$template_id = $item->template_id;
						$langConst   = strtoupper(explode(".", $template_id)[0]);
						$subIDN      = explode("_", explode(".", $template_id)[1]);
						$subID       = "";

						foreach ($subIDN as $sub)
						{
							$subID .= ucfirst($sub) . " ";
						}

						echo '<option value="' . $template_id . '">' . Text::_($langConst) . ": " . $subID . '</option>';
					}
					?>
                </optgroup>
            </select>
        </div>
    </div>
</div>
