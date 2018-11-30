<?php
class UserPrivilegeCustomizationPlugin extends Omeka_Plugin_AbstractPlugin
{
	protected $_hooks = array('define_acl');

    function hookDefineAcl($args)
    {
				$acl = $args['acl'];

				// Modify default Contributor privileges to allow Contributors to make items public.
				$acl->allow('contributor', 'Items', array('add', 'tag', 'batch-edit', 'batch-edit-save', 'change-type', 'delete-confirm', 'editSelf', 'deleteSelf', 'showSelfNotPublic', 'makePublic'));
    }
}