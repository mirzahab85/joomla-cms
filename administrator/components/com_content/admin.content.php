<?php

/**
 * @version		$Id$
 * @package		Joomla.Administrator
 * @subpackage	Content
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

require_once(JPATH_COMPONENT.DS.'controller.php');
require_once(JPATH_COMPONENT.DS.'helper.php');
require_once (JApplicationHelper::getPath('admin_html'));

// Set the helper directory
JHtml::addIncludePath(JPATH_COMPONENT.DS.'helper');

$controller = new ContentController();
$task = JRequest::getCmd('task');
switch (strtolower($task))
{
	case 'element':
	case 'wizard':
		$controller->execute($task);
		$controller->redirect();
		break;

	case 'add'  :
	case 'new'  :
		ContentController::editContent(false);
		break;

	case 'edit' :
		ContentController::editContent(true);
		break;

	case 'go2menu' :
	case 'go2menuitem' :
	case 'resethits' :
	case 'menulink' :
	case 'apply' :
	case 'save' :
		ContentController::saveContent();
		break;

	case 'remove' :
		ContentController::removeContent();
		break;

	case 'publish' :
		ContentController::changeContent(1);
		break;

	case 'unpublish' :
		ContentController::changeContent(0);
		break;

	case 'toggle_frontpage' :
		ContentController::toggleFrontPage();
		break;

	case 'archive' :
		ContentController::changeContent(-1);
		break;

	case 'unarchive' :
		ContentController::changeContent(0);
		break;

	case 'cancel' :
		ContentController::cancelContent();
		break;

	case 'orderup' :
		ContentController::orderContent(-1);
		break;

	case 'orderdown' :
		ContentController::orderContent(1);
		break;

	//case 'showarchive' :
	//	JContentController::viewArchive();
	//	break;

	case 'movesect' :
		ContentController::moveSection();
		break;

	case 'movesectsave' :
		ContentController::moveSectionSave();
		break;

	case 'copy' :
		ContentController::copyItem();
		break;

	case 'copysave' :
		ContentController::copyItemSave();
		break;

	case 'accesspublic' :
		ContentController::accessMenu(0);
		break;

	case 'accessregistered' :
		ContentController::accessMenu(1);
		break;

	case 'accessspecial' :
		ContentController::accessMenu(2);
		break;

	case 'saveorder' :
		ContentController::saveOrder();
		break;

	case 'preview' :
		ContentController::previewContent();
		break;

	case 'ins_pagebreak' :
		ContentController::insertPagebreak();
		break;

	default :
		ContentController::viewContent();
		break;
}