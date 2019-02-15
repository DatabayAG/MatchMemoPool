<?php

include_once("./Services/Repository/classes/class.ilRepositoryObjectPlugin.php");
 
/**
* MatchMemoPool repository object plugin
*
* @author Helmut Schottmüller <ilias@aurealis.de>
* @version $Id$
*
*/
class ilMatchMemoPoolPlugin extends ilRepositoryObjectPlugin
{
	function getPluginName()
	{
		return "MatchMemoPool";
	}

	protected function uninstallCustom()
	{
		global $DIC;

		$ilDB = $DIC->database();

		if($ilDB->tableExists('rep_robj_xmpl_object'))
		{
			$ilDB->dropTable('rep_robj_xmpl_object');
		}

		if($ilDB->tableExists('rep_robj_xmpl_pair'))
		{
			$ilDB->dropTable('rep_robj_xmpl_pair');
		}
		if($ilDB->sequenceExists('rep_robj_xmpl_pair'))
		{
			$ilDB->dropSequence('rep_robj_xmpl_pair');
		}
	}
}
?>
