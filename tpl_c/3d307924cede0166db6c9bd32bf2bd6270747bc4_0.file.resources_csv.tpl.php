<?php
/* Smarty version 3.1.30, created on 2020-08-19 05:31:22
  from "C:\xampp2\htdocs\ulemc\tpl\Admin\Resources\resources_csv.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f3c9d0a230823_94714039',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d307924cede0166db6c9bd32bf2bd6270747bc4' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemc\\tpl\\Admin\\Resources\\resources_csv.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3c9d0a230823_94714039 (Smarty_Internal_Template $_smarty_tpl) {
?>
"<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Name'),$_smarty_tpl);?>
","<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Status'),$_smarty_tpl);?>
","<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Schedule'),$_smarty_tpl);?>
","<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceType'),$_smarty_tpl);?>
","<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SortOrder'),$_smarty_tpl);?>
","<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Location'),$_smarty_tpl);?>
","<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Contact'),$_smarty_tpl);?>
","<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Description'),$_smarty_tpl);?>
","<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Notes'),$_smarty_tpl);?>
","<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceAdministrator'),$_smarty_tpl);?>
"
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Resources']->value, 'resource');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
"<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['resource']->value->GetName());?>
","<?php if ($_smarty_tpl->tpl_vars['resource']->value->IsAvailable()) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Available'),$_smarty_tpl);
} elseif ($_smarty_tpl->tpl_vars['resource']->value->IsUnavailable()) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Unavailable'),$_smarty_tpl);
} else {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Hidden'),$_smarty_tpl);
}?>","<?php echo $_smarty_tpl->tpl_vars['Schedules']->value[$_smarty_tpl->tpl_vars['resource']->value->GetScheduleId()];?>
","<?php if ($_smarty_tpl->tpl_vars['resource']->value->HasResourceType()) {
echo preg_replace("%(?<!\\\\)'%", "\'",($_smarty_tpl->tpl_vars['ResourceTypes']->value[$_smarty_tpl->tpl_vars['resource']->value->GetResourceTypeId()]->Name()));
}?>",<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resource']->value->GetSortOrder())===null||$tmp==='' ? "0" : $tmp);?>
,"<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['resource']->value->GetLocation());?>
","<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['resource']->value->GetContact());?>
","<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['resource']->value->GetDescription());?>
","<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['resource']->value->GetNotes());?>
","<?php echo preg_replace("%(?<!\\\\)'%", "\'",($_smarty_tpl->tpl_vars['GroupLookup']->value[$_smarty_tpl->tpl_vars['resource']->value->GetAdminGroupId()]->Name));?>
"
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>



<?php }
}
