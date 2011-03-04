<?php 
/**
 * This file implements the tweetboard functionality for {@link http://b2evolution.net/}.
 *
 * @copyright (c)2011 by ~cXc~ / gWorldz - {@link http://twitter.com/gWorldz}.
 *
 * @license GNU General Public License 2 (GPL) - http://www.opensource.org/licenses/gpl-license.php
 *
 * @package plugins
 *
 * @author ~cXc~
 *
 * @version _tweetboard.plugin.php, v 0.01 2011/02/01 01:01:01
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

/**
 * Tweetboard Plugin
 *
 * This plugin allows you to add Tweetboard to your site by inserting the necessary code just before
 * the closing </body> tag.
 *
 */
class tweetboard_plugin extends Plugin 
{
	var $apply_rendering = 'never';
	var $author = '~cXc~ gWorldz';
	var $code = 'evo_tweetboard';
	var $group = 'micro-social';
	var $help_url = 'http://twitter.com/gWorldz';
	var $name = 'Tweetboard Plugin';
	var $long_desc = 'This plugin allows you to add Tweetboard micro-forum to your site by inserting the necessary code just before the closing &lt;/body&gt; tag.';
	var $short_desc = 'Adds Tweetboard to your blog pages.';
	var $number_of_installs = 1;
	var $priority = 99;
	var $sub_group = '';
	var $version = '0.01';

	var $extra_info = '';

	function PluginInit( & $params ) 
	{
		$this->name = $this->T_('Tweetboard Plugin');
		$this->short_desc = $this->T_('Adds Tweetboard to your blog pages.');
		$this->long_desc = $this->T_('This plugin allows you to add Tweetboard micro-forum to your site by inserting the necessary code just before the closing &lt;/body&gt; tag.');
	}

	function GetDefaultSettings( & $params ) 
	{
		$DefSet = array(
			'tweetboard_user' => array(
				'label' => $this->T_('Twitter Username'),
				'size' => '25',
				'type' => 'text',
				'note' => $this->T_(''),
				),
			'tweetboard_style' => array(
				'label' => $this->T_('Style Overrides'),
				'type' => 'textarea',
				'note' => $this->T_(''),
				),
			);
		return $DefSet;
	}

	function SkinEndHtmlBody()
	{
		$tweetboard_user 	= $this->Settings->get( 'tweetboard_user' );
		$tweetboard_style 	= $this->Settings->get( 'tweetboard_style' );
		
		if(!empty($tweetboard_style))
		{
			echo '
<style type="text/css"> 
	'.$tweetboard_style.'
</style>
			';
		}
		
		if(!empty($tweetboard_user))
		{
			echo '
				<script type="text/javascript"> 
					var _tbdef = {user: \''.$tweetboard_user.'\'};
					(function(){
					var d = document;var tbjs = d.createElement(\'script\'); tbjs.type = \'text/javascript\';
					tbjs.async = true; tbjs.src = \'http://tweetboard.com/tb.js\'; var tbel = d.getElementsByTagName(\'head\')[0];
					if(!tbel) tbel = d.getElementsByTagName(\'head\')[0]; tbel.appendChild(tbjs);
					})();
				</script>
			';
		}
	}

	/**
	 * @version 0.01: initial plugin
	 * @01.02.2011
	 * @author ~cXc~ / gWorldz
	 */

}
?>