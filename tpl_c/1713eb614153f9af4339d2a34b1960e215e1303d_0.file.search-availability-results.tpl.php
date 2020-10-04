<?php
/* Smarty version 3.1.30, created on 2020-09-24 06:12:07
  from "C:\xampp6\htdocs\emcscheduler\tpl\SearchAvailability\search-availability-results.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f6c1c9735fdb0_27107324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1713eb614153f9af4339d2a34b1960e215e1303d' => 
    array (
      0 => 'C:\\xampp6\\htdocs\\emcscheduler\\tpl\\SearchAvailability\\search-availability-results.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6c1c9735fdb0_27107324 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Openings']->value, 'opening');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['opening']->value) {
?>
    <div class="opening"
         data-resourceid="<?php echo $_smarty_tpl->tpl_vars['opening']->value->Resource()->Id;?>
"
         data-startdate="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['opening']->value->Start(),'key'=>'system_datetime'),$_smarty_tpl);?>
"
         data-enddate="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['opening']->value->End(),'key'=>'system_datetime'),$_smarty_tpl);?>
">
        <div class="resourceName" data-resourceId="<?php echo $_smarty_tpl->tpl_vars['opening']->value->Resource()->Id;?>
" <?php if ($_smarty_tpl->tpl_vars['opening']->value->Resource()->HasColor()) {?>style="background-color: <?php echo $_smarty_tpl->tpl_vars['opening']->value->Resource()->Color;?>
;color:<?php echo $_smarty_tpl->tpl_vars['opening']->value->Resource()->TextColor;?>
;"<?php }?>>
            <?php echo $_smarty_tpl->tpl_vars['opening']->value->Resource()->Name;?>

        </div>
        <?php $_smarty_tpl->_assignInScope('key', 'short_reservation_date');
?>
        <?php if ($_smarty_tpl->tpl_vars['opening']->value->SameDate()) {?>
            <?php $_smarty_tpl->_assignInScope('key', 'period_time');
?>
        <?php }?>
        <div class="dates">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['opening']->value->Start(),'key'=>'res_popup'),$_smarty_tpl);?>
 -
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['opening']->value->End(),'key'=>$_smarty_tpl->tpl_vars['key']->value),$_smarty_tpl);?>

        </div>
    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


<?php if (count($_smarty_tpl->tpl_vars['Openings']->value) == 0) {?>
    <div class="alert alert-warning">
        <i class="fa fa-frown-o"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoAvailableMatchingTimes'),$_smarty_tpl);?>

    </div>
<?php }
}
}
