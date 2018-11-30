<?php
class UserPrivilegeCustomizationPlugin extends Omeka_Plugin_AbstractPlugin
{
	protected $_hooks = array('define_acl');

    function hookDefineAcl($args)
    {
        $acl = $args['acl'];

        $indexResource = new Zend_Acl_Resource('SimplePages_Index');
        $pageResource = new Zend_Acl_Resource('SimplePages_Page');
        $acl->add($indexResource);
        $acl->add($pageResource);

        $acl->allow(array('super', 'admin'), array('SimplePages_Index', 'SimplePages_Page'));
        $acl->allow(null, 'SimplePages_Page', 'show');
        $acl->deny(null, 'SimplePages_Page', 'show-unpublished');
    }
}