<?php 
/**
 * This file implements the wibiya plugin for {@link http://b2evolution.net/}.
 *
 * @copyright (c)2011 by ~cXc~ gWorldz - {@link http://gWorldz.com/}.
 *
 * @license GNU General Public License 2 (GPL) - http://www.opensource.org/licenses/gpl-license.php
 *
 * @package plugins
 *
 * @author ~cXc~ gWorldz
 *
 * @version $Id:  $
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

/**
Wibar Plugin *
 * This plugin allows you to add the Wibiya Toolbar by inserting the code before the closing </body> tag of your skin.
 *
 */
class wibar_plugin extends Plugin 
{
	var $apply_rendering = 'never';
	var $author = '~cXc~ gWorldz';
	var $code = 'evo_wibar';
	var $group = 'micro-social';
	var $help_url = 'http://gWorldz.com';
	var $name = 'Wibar Plugin';
	var $long_desc = 'This plugin allows you to add the Wibiya Toolbar by inserting the code before the closing &lt;/body&gt; tag of your skin.';
	var $short_desc = 'Adds the Wibiya Toolbar to your site.';
	var $number_of_installs = 1;
	var $priority = 99;
	var $sub_group = '';
	var $version = '0.01';

	var $extra_info = '';

	function PluginInit( & $params ) 
	{
		$this->name = $this->T_('Wibar Plugin');
		$this->short_desc = $this->T_('Adds the Wibiya Toolbar to your site.');
		$this->long_desc = $this->T_('This plugin allows you to add the Wibiya Toolbar by inserting the code before the closing &lt;/body&gt; tag of your skin.');
	}

	function GetDefaultSettings( & $params ) 
	{
		$DefSet = array(
			'wibiya_id' => array(
				'label' => $this->T_('Wibiya ID'),
				'type' => 'text',
				'size' => '10',
				'note' => $this->T_('Ex: 255733, Enter the 6 character code without the zero; looks like this, enter the part in [] without the [] ...Loader_[255733].js'),
				),
			'script_url' => array(
				'label' => $this->T_('Script Url'),
				'type' => 'textarea',
				'note' => $this->T_('Ex: http://cdn.wibiya.com/Toolbars/dir_0255/Toolbar_255733/Loader_255733.js || Enter the script url from the install code.'),
				),
			/* ~cXc~ for future use
			'full_code' => array(
				'label' => $this->T_('Full Code'),
				'type' => 'textarea',
				'note' => $this->T_('Ex: &lt;script src="http://cdn.wibiya.com/Toolbars/dir_0255/Toolbar_255733/Loader_255733.js" type="text/javascript"&gt;&lt;/script&gt;&lt;noscript&gt;&lt;a href="http://www.wibiya.com/"&gt;Web Toolbar by Wibiya&lt;/a&gt;&lt;/noscript&gt;  || Enter the full code given to you.'),
				),*/
			);
		return $DefSet;
	}
	
	
	

	function SkinEndHtmlBody()
	{
		$wibiya_id = $this->Settings->get( 'wibiya_id' );
		$first3 = substr($wibiya_id, 0, 3);
		$script_url = $this->Settings->get( 'script_url' );
		
		if(empty($script_url) && !empty($wibiya_id))
		{
			echo '<script src="http://cdn.wibiya.com/Toolbars/dir_0'.$first3.'/Toolbar_'.$wibiya_id.'/Loader_'.$wibiya_id.'.js" type="text/javascript"></script><noscript><!--<a href="http://www.wibiya.com/">Web Toolbar by Wibiya</a>--></noscript>';
		}
		if(empty($wibiya_id) && !empty($script_url))
		{
			echo '<script src="'.$script_url.'" type="text/javascript"></script><noscript><!--<a href="http://www.wibiya.com/">Web Toolbar by Wibiya</a>--></noscript>';
		}
		if(!empty($wibiya_id) && !empty($script_url))
		{
			echo '<script src="'.$script_url.'" type="text/javascript"></script><noscript><!--<a href="http://www.wibiya.com/">Web Toolbar by Wibiya</a>--></noscript>';
		}
	}
	
	

	/**
	 * @version 0.01: initial plugin
	 * @01.12.2010
	 * @author ~cXc~ gWorldz
	 */

} ?>
