<?php
/* Smarty version 3.1.30, created on 2020-08-19 07:36:13
  from "C:\xampp2\htdocs\ulemc\tpl\Schedule\schedule-week-condensed.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f3cba4d074a01_52394998',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dde8b61db504f6a3c68f0d3e0219ae571df3bc26' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemc\\tpl\\Schedule\\schedule-week-condensed.tpl',
      1 => 1596405905,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Schedule/schedule.tpl' => 1,
  ),
),false)) {
function content_5f3cba4d074a01_52394998 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'displayGeneralReservedCondensed' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\dde8b61db504f6a3c68f0d3e0219ae571df3bc26_0.file.schedule-week-condensed.tpl.php',
    'uid' => 'dde8b61db504f6a3c68f0d3e0219ae571df3bc26',
    'call_name' => 'smarty_template_function_displayGeneralReservedCondensed_713618345f3cba4cf36da5_89657868',
  ),
  'displayAdminReservedCondensed' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\dde8b61db504f6a3c68f0d3e0219ae571df3bc26_0.file.schedule-week-condensed.tpl.php',
    'uid' => 'dde8b61db504f6a3c68f0d3e0219ae571df3bc26',
    'call_name' => 'smarty_template_function_displayAdminReservedCondensed_713618345f3cba4cf36da5_89657868',
  ),
  'displayMyReservedCondensed' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\dde8b61db504f6a3c68f0d3e0219ae571df3bc26_0.file.schedule-week-condensed.tpl.php',
    'uid' => 'dde8b61db504f6a3c68f0d3e0219ae571df3bc26',
    'call_name' => 'smarty_template_function_displayMyReservedCondensed_713618345f3cba4cf36da5_89657868',
  ),
  'displayMyParticipatingCondensed' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\dde8b61db504f6a3c68f0d3e0219ae571df3bc26_0.file.schedule-week-condensed.tpl.php',
    'uid' => 'dde8b61db504f6a3c68f0d3e0219ae571df3bc26',
    'call_name' => 'smarty_template_function_displayMyParticipatingCondensed_713618345f3cba4cf36da5_89657868',
  ),
  'displayReservedCondensed' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\dde8b61db504f6a3c68f0d3e0219ae571df3bc26_0.file.schedule-week-condensed.tpl.php',
    'uid' => 'dde8b61db504f6a3c68f0d3e0219ae571df3bc26',
    'call_name' => 'smarty_template_function_displayReservedCondensed_713618345f3cba4cf36da5_89657868',
  ),
  'displayPastTimeCondensed' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\dde8b61db504f6a3c68f0d3e0219ae571df3bc26_0.file.schedule-week-condensed.tpl.php',
    'uid' => 'dde8b61db504f6a3c68f0d3e0219ae571df3bc26',
    'call_name' => 'smarty_template_function_displayPastTimeCondensed_713618345f3cba4cf36da5_89657868',
  ),
  'displayReservableCondensed' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\dde8b61db504f6a3c68f0d3e0219ae571df3bc26_0.file.schedule-week-condensed.tpl.php',
    'uid' => 'dde8b61db504f6a3c68f0d3e0219ae571df3bc26',
    'call_name' => 'smarty_template_function_displayReservableCondensed_713618345f3cba4cf36da5_89657868',
  ),
  'displayRestrictedCondensed' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\dde8b61db504f6a3c68f0d3e0219ae571df3bc26_0.file.schedule-week-condensed.tpl.php',
    'uid' => 'dde8b61db504f6a3c68f0d3e0219ae571df3bc26',
    'call_name' => 'smarty_template_function_displayRestrictedCondensed_713618345f3cba4cf36da5_89657868',
  ),
  'displayUnreservableCondensed' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\dde8b61db504f6a3c68f0d3e0219ae571df3bc26_0.file.schedule-week-condensed.tpl.php',
    'uid' => 'dde8b61db504f6a3c68f0d3e0219ae571df3bc26',
    'call_name' => 'smarty_template_function_displayUnreservableCondensed_713618345f3cba4cf36da5_89657868',
  ),
  'displaySlotCondensed' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\dde8b61db504f6a3c68f0d3e0219ae571df3bc26_0.file.schedule-week-condensed.tpl.php',
    'uid' => 'dde8b61db504f6a3c68f0d3e0219ae571df3bc26',
    'call_name' => 'smarty_template_function_displaySlotCondensed_713618345f3cba4cf36da5_89657868',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2330299665f3cba4d01e743_29743837', "legend");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14141439435f3cba4d0724a3_40967113', "reservations");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18365876045f3cba4d0745e6_42228951', "scripts");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:Schedule/schedule.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "legend"} */
class Block_2330299665f3cba4d01e743_29743837 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "legend"} */
/* smarty_template_function_displayGeneralReservedCondensed_713618345f3cba4cf36da5_89657868 */
if (!function_exists('smarty_template_function_displayGeneralReservedCondensed_713618345f3cba4cf36da5_89657868')) {
function smarty_template_function_displayGeneralReservedCondensed_713618345f3cba4cf36da5_89657868($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
        <?php if ($_smarty_tpl->tpl_vars['Slot']->value->IsPending()) {?>
            <?php $_smarty_tpl->_assignInScope('class', 'pending');
?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['Slot']->value->HasCustomColor()) {?>
            <?php $_smarty_tpl->_assignInScope('color', (((((('style="background-color:').($_smarty_tpl->tpl_vars['Slot']->value->Color())).(' !important;color:')).($_smarty_tpl->tpl_vars['Slot']->value->TextColor())).(' !important;border-color:')).($_smarty_tpl->tpl_vars['Slot']->value->BorderColor())).(' !important;"'));
?>
        <?php }?>
        <div class="reserved <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['OwnershipClass']->value;?>
 clickres"
             resid="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
" <?php echo $_smarty_tpl->tpl_vars['color']->value;?>

             id="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
|<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Date()->Format('Ymd');?>
">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['Slot']->value->BeginDate(),'key'=>'period_time'),$_smarty_tpl);?>
 - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['Slot']->value->EndDate(),'key'=>'period_time'),$_smarty_tpl);?>

            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escapequotes'][0][0]->EscapeQuotes($_smarty_tpl->tpl_vars['Slot']->value->Label($_smarty_tpl->tpl_vars['SlotLabelFactory']->value));?>
 </div>
    <?php
}}
/*/ smarty_template_function_displayGeneralReservedCondensed_713618345f3cba4cf36da5_89657868 */
/* smarty_template_function_displayAdminReservedCondensed_713618345f3cba4cf36da5_89657868 */
if (!function_exists('smarty_template_function_displayAdminReservedCondensed_713618345f3cba4cf36da5_89657868')) {
function smarty_template_function_displayAdminReservedCondensed_713618345f3cba4cf36da5_89657868($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReservedCondensed', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'OwnershipClass'=>'admin'), true);?>

    <?php
}}
/*/ smarty_template_function_displayAdminReservedCondensed_713618345f3cba4cf36da5_89657868 */
/* smarty_template_function_displayMyReservedCondensed_713618345f3cba4cf36da5_89657868 */
if (!function_exists('smarty_template_function_displayMyReservedCondensed_713618345f3cba4cf36da5_89657868')) {
function smarty_template_function_displayMyReservedCondensed_713618345f3cba4cf36da5_89657868($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReservedCondensed', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'OwnershipClass'=>'mine'), true);?>

    <?php
}}
/*/ smarty_template_function_displayMyReservedCondensed_713618345f3cba4cf36da5_89657868 */
/* smarty_template_function_displayMyParticipatingCondensed_713618345f3cba4cf36da5_89657868 */
if (!function_exists('smarty_template_function_displayMyParticipatingCondensed_713618345f3cba4cf36da5_89657868')) {
function smarty_template_function_displayMyParticipatingCondensed_713618345f3cba4cf36da5_89657868($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReservedCondensed', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'OwnershipClass'=>'participating'), true);?>

    <?php
}}
/*/ smarty_template_function_displayMyParticipatingCondensed_713618345f3cba4cf36da5_89657868 */
/* smarty_template_function_displayReservedCondensed_713618345f3cba4cf36da5_89657868 */
if (!function_exists('smarty_template_function_displayReservedCondensed_713618345f3cba4cf36da5_89657868')) {
function smarty_template_function_displayReservedCondensed_713618345f3cba4cf36da5_89657868($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReservedCondensed', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'OwnershipClass'=>''), true);?>

    <?php
}}
/*/ smarty_template_function_displayReservedCondensed_713618345f3cba4cf36da5_89657868 */
/* smarty_template_function_displayPastTimeCondensed_713618345f3cba4cf36da5_89657868 */
if (!function_exists('smarty_template_function_displayPastTimeCondensed_713618345f3cba4cf36da5_89657868')) {
function smarty_template_function_displayPastTimeCondensed_713618345f3cba4cf36da5_89657868($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <?php
}}
/*/ smarty_template_function_displayPastTimeCondensed_713618345f3cba4cf36da5_89657868 */
/* smarty_template_function_displayReservableCondensed_713618345f3cba4cf36da5_89657868 */
if (!function_exists('smarty_template_function_displayReservableCondensed_713618345f3cba4cf36da5_89657868')) {
function smarty_template_function_displayReservableCondensed_713618345f3cba4cf36da5_89657868($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <?php
}}
/*/ smarty_template_function_displayReservableCondensed_713618345f3cba4cf36da5_89657868 */
/* smarty_template_function_displayRestrictedCondensed_713618345f3cba4cf36da5_89657868 */
if (!function_exists('smarty_template_function_displayRestrictedCondensed_713618345f3cba4cf36da5_89657868')) {
function smarty_template_function_displayRestrictedCondensed_713618345f3cba4cf36da5_89657868($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <?php
}}
/*/ smarty_template_function_displayRestrictedCondensed_713618345f3cba4cf36da5_89657868 */
/* smarty_template_function_displayUnreservableCondensed_713618345f3cba4cf36da5_89657868 */
if (!function_exists('smarty_template_function_displayUnreservableCondensed_713618345f3cba4cf36da5_89657868')) {
function smarty_template_function_displayUnreservableCondensed_713618345f3cba4cf36da5_89657868($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
        <div class="unreservable"
             resid="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
" <?php echo $_smarty_tpl->tpl_vars['color']->value;?>

             id="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
|<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Date()->Format('Ymd');?>
">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['Slot']->value->BeginDate(),'key'=>'period_time'),$_smarty_tpl);?>
 - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['Slot']->value->EndDate(),'key'=>'period_time'),$_smarty_tpl);?>

            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escapequotes'][0][0]->EscapeQuotes($_smarty_tpl->tpl_vars['Slot']->value->Label($_smarty_tpl->tpl_vars['SlotLabelFactory']->value));?>
</div>
    <?php
}}
/*/ smarty_template_function_displayUnreservableCondensed_713618345f3cba4cf36da5_89657868 */
/* smarty_template_function_displaySlotCondensed_713618345f3cba4cf36da5_89657868 */
if (!function_exists('smarty_template_function_displaySlotCondensed_713618345f3cba4cf36da5_89657868')) {
function smarty_template_function_displaySlotCondensed_713618345f3cba4cf36da5_89657868($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, $_smarty_tpl->tpl_vars['DisplaySlotFactory']->value->GetFunction($_smarty_tpl->tpl_vars['Slot']->value,$_smarty_tpl->tpl_vars['AccessAllowed']->value,'Condensed'), array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value), true);?>

    <?php
}}
/*/ smarty_template_function_displaySlotCondensed_713618345f3cba4cf36da5_89657868 */
/* {block "reservations"} */
class Block_14141439435f3cba4d0724a3_40967113 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    

    

    

    

    

    

    

    

    

    

    <?php $_smarty_tpl->_assignInScope('TodaysDate', Date::Now());
?>
    <?php $_smarty_tpl->_assignInScope('columnWidth', (1/(count($_smarty_tpl->tpl_vars['BoundDates']->value)+1))*100);
?>
    <div id="reservations">
        <table class="reservations condensed" border="1" cellpadding="0" style="width:100%;">
            <tr>
                <td style="width:<?php echo $_smarty_tpl->tpl_vars['columnWidth']->value;?>
%">&nbsp;</td>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BoundDates']->value, 'date');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['date']->value) {
?>
                    <?php $_smarty_tpl->_assignInScope('class', '');
?>
                    <?php $_smarty_tpl->_assignInScope('tdclass', '');
?>
                    <?php $_smarty_tpl->_assignInScope('ts', $_smarty_tpl->tpl_vars['date']->value->Timestamp());
?>
                    <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['periods']) ? $_smarty_tpl->tpl_vars['periods']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['ts']->value] = $_smarty_tpl->tpl_vars['DailyLayout']->value->GetPeriods($_smarty_tpl->tpl_vars['date']->value);
$_smarty_tpl->_assignInScope('periods', $_tmp_array);
?>
                    <?php if (count($_smarty_tpl->tpl_vars['periods']->value[$_smarty_tpl->tpl_vars['ts']->value]) == 0) {
continue 1;
}?>
                    <?php if ($_smarty_tpl->tpl_vars['date']->value->DateEquals($_smarty_tpl->tpl_vars['TodaysDate']->value)) {?>
                        <?php $_smarty_tpl->_assignInScope('tdclass', "today");
?>
                    <?php }?>
                    <td class="resdate-custom resdate <?php echo $_smarty_tpl->tpl_vars['tdclass']->value;?>
"
                        style="width:<?php echo $_smarty_tpl->tpl_vars['columnWidth']->value;?>
%"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>"schedule_daily"),$_smarty_tpl);?>
</td>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tr>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Resources']->value, 'resource', false, NULL, 'resource_loop', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
                <?php $_smarty_tpl->_assignInScope('resourceId', $_smarty_tpl->tpl_vars['resource']->value->Id);
?>
                <?php ob_start();
echo Pages::RESERVATION;
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('href', $_prefixVariable1."?rid=".((string)$_smarty_tpl->tpl_vars['resourceId']->value)."&sid=".((string)$_smarty_tpl->tpl_vars['ScheduleId']->value));
?>
                <tr class="slots">
                    <td class="resourcename"
                        <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="background-color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetColor();?>
 !important"<?php }?>>
                        <?php if ($_smarty_tpl->tpl_vars['resource']->value->CanAccess) {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" resourceId="<?php echo $_smarty_tpl->tpl_vars['resourceId']->value;?>
" class="resourceNameSelector"
                               <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
 !important"<?php }?>><?php $_smarty_tpl->_assignInScope('rname', explode(" ",$_smarty_tpl->tpl_vars['resource']->value->Name));
echo $_smarty_tpl->tpl_vars['rname']->value[1];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[2];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[3];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[4];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[5];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[6];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[7];?>
</a>
                        <?php } else { ?>
                            <span resourceId="<?php echo $_smarty_tpl->tpl_vars['resource']->value->Id;?>
" resourceId="<?php echo $_smarty_tpl->tpl_vars['resource']->value->Id;?>
" class="resourceNameSelector"
                                  <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
 !important"<?php }?>><?php $_smarty_tpl->_assignInScope('rname', explode(" ",$_smarty_tpl->tpl_vars['resource']->value->Name));
echo $_smarty_tpl->tpl_vars['rname']->value[1];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[2];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[3];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[4];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[5];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[6];?>
 <?php echo $_smarty_tpl->tpl_vars['rname']->value[7];?>
</span>
                        <?php }?>
                    </td>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BoundDates']->value, 'date');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['date']->value) {
?>
                        <?php $_smarty_tpl->_assignInScope('ts', $_smarty_tpl->tpl_vars['date']->value->Timestamp());
?>
                        <?php if (count($_smarty_tpl->tpl_vars['periods']->value[$_smarty_tpl->tpl_vars['ts']->value]) == 0) {
continue 1;
}?>
                        <?php $_smarty_tpl->_assignInScope('resourceId', $_smarty_tpl->tpl_vars['resource']->value->Id);
?>
                        <?php ob_start();
echo Pages::RESERVATION;
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('href', $_prefixVariable2."?rid=".((string)$_smarty_tpl->tpl_vars['resourceId']->value)."&sid=".((string)$_smarty_tpl->tpl_vars['ScheduleId']->value));
?>
                        <?php $_smarty_tpl->_assignInScope('slots', $_smarty_tpl->tpl_vars['DailyLayout']->value->GetLayout($_smarty_tpl->tpl_vars['date']->value,$_smarty_tpl->tpl_vars['resourceId']->value));
?>
                        <?php $_smarty_tpl->_assignInScope('summary', $_smarty_tpl->tpl_vars['DailyLayout']->value->GetSummary($_smarty_tpl->tpl_vars['date']->value,$_smarty_tpl->tpl_vars['resourceId']->value));
?>
                        <?php if ($_smarty_tpl->tpl_vars['summary']->value->NumberOfItems() > 0) {?>
                            <td style="vertical-align: top;" class="reservable clickres"
                                ref="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
&rd=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>'url'),$_smarty_tpl);?>
" data-href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
"
                                data-start="<?php echo rawurlencode($_smarty_tpl->tpl_vars['date']->value->Format('Y-m-d H:i:s'));?>
"
                                data-end="<?php echo rawurlencode($_smarty_tpl->tpl_vars['date']->value->Format('Y-m-d H:i:s'));?>
">
                                <div class="reservable clickres" ref="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
&rd=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>'url'),$_smarty_tpl);?>
"
                                     data-href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" data-start="<?php echo rawurlencode($_smarty_tpl->tpl_vars['date']->value->Format('Y-m-d H:i:s'));?>
"
                                     data-end="<?php echo rawurlencode($_smarty_tpl->tpl_vars['date']->value->Format('Y-m-d H:i:s'));?>
">
                                    <i class="fa fa-plus-circle"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CreateReservation'),$_smarty_tpl);?>

                                    <input type="hidden" class="href" value="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
"/>
                                </div>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slots']->value, 'slot');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['slot']->value) {
?>
                                    <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displaySlotCondensed', array('Slot'=>$_smarty_tpl->tpl_vars['slot']->value,'Href'=>((string)$_smarty_tpl->tpl_vars['href']->value),'AccessAllowed'=>$_smarty_tpl->tpl_vars['resource']->value->CanAccess), true);?>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </td>
                        <?php } else { ?>
                            <?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>'url'),$_smarty_tpl);
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('href', ((string)$_smarty_tpl->tpl_vars['CreateReservationPage']->value)."?rid=".((string)$_smarty_tpl->tpl_vars['resource']->value->Id)."&sid=".((string)$_smarty_tpl->tpl_vars['ScheduleId']->value)."&rd=".$_prefixVariable3);
?>
                            <td style="vertical-align: top;" class="reservable clickres"
                                ref="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
&rd=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>'url'),$_smarty_tpl);?>
" data-href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
"
                                data-start="<?php echo rawurlencode($_smarty_tpl->tpl_vars['date']->value->Format('Y-m-d H:i:s'));?>
"
                                data-end="<?php echo rawurlencode($_smarty_tpl->tpl_vars['date']->value->Format('Y-m-d H:i:s'));?>
">

                                <div class="reservable clickres" ref="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
&rd=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>'url'),$_smarty_tpl);?>
"
                                     data-href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" data-start="<?php echo rawurlencode($_smarty_tpl->tpl_vars['date']->value->Format('Y-m-d H:i:s'));?>
"
                                     data-end="<?php echo rawurlencode($_smarty_tpl->tpl_vars['date']->value->Format('Y-m-d H:i:s'));?>
">
                                    <i class="fa fa-plus-circle"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CreateReservation'),$_smarty_tpl);?>

                                    <input type="hidden" class="href" value="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
"/>
                                </div>
                            </td>
                        <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>
    </div>
<?php
}
}
/* {/block "reservations"} */
/* {block "scripts"} */
class Block_18365876045f3cba4d0745e6_42228951 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            var $td = $('td.reserved', $('#reservations'));
            $td.unbind('click');

            $td.click(function (e) {
                e.stopPropagation();
                var date = $(this).attr('date').split('-');
                var year = date[0];
                var month = date[1];
                var day = date[2];
                var resourceId = $(this).attr('resourceId');

                window.location = "<?php echo Pages::CALENDAR;?>
?<?php echo QueryStringKeys::CALENDAR_TYPE;?>
=day&<?php echo QueryStringKeys::RESOURCE_ID;?>
=" + resourceId + "&y=" + year + "&m=" + month + "&d=" + day;
            });
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "scripts"} */
}
