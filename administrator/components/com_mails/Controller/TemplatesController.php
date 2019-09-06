<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_mails
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Actionlogs\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\AdminController;
use Joomla\CMS\Router\Route;
use Joomla\Component\Mails\Administrator\Model\TemplatesModel;

/**
 * Mails controller class.
 *
 * @since  __DEPLOY_VERSION__
 */
class TemplatesController extends AdminController
{
	/**
	 * Method to send a test email
	 *
	 * @return void
	 *
	 * @since  __DEPLOY_VERSION__
	 */
	public function sendTestMail(): void
	{
		$emails   = $this->input->get('jform_email', null, 'string');
		$template = $this->input->get('templates', null, 'string');
		$language = $this->app->getIdentity()->getParam('language', $this->app->get('language'));
		$message  = Text::_('COM_MAILS_MESSAGE_EMAIL_SEND');
		$type     = '';
		/** @var TemplatesModel $model */
		$model = $this->getModel();

		try
		{
			$model->sendTestMail($emails, $template, $language);
		}
		catch (\Exception $exception)
		{
			$message = $exception->getMessage();
			$type    = 'error';
		}

		$this->setRedirect(Route::_('index.php?option=com_mails&view=templates'), $message, $type);
	}
}
