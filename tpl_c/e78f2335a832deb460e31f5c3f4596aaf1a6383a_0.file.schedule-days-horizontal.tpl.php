<?php
/* Smarty version 3.1.30, created on 2020-09-08 13:51:45
  from "C:\xampp5\htdocs\ulemc\tpl\Schedule\schedule-days-horizontal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f577051de2c92_99581303',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e78f2335a832deb460e31f5c3f4596aaf1a6383a' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\ulemc\\tpl\\Schedule\\schedule-days-horizontal.tpl',
      1 => 1595992198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Schedule/schedule.tpl' => 1,
  ),
),false)) {
function content_5f577051de2c92_99581303 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10702728785f577051de19f5_16665554', "reservations");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8173424095f577051de2911_35340838', "scripts-before");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:Schedule/schedule.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "reservations"} */
class Block_10702728785f577051de19f5_16665554 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php $_smarty_tpl->_assignInScope('TodaysDate', Date::Now());
?>
		<table class="reservations" border="1" cellpadding="0" style="width:auto;">
			<tr>
				<td rowspan="2">&nbsp;</td>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BoundDates']->value, 'date');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['date']->value) {
?>
					<?php $_smarty_tpl->_assignInScope('class', '');
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
						<?php $_smarty_tpl->_assignInScope('class', "today");
?>
					<?php }?>
					<td class="resdate <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"
						colspan="<?php echo count($_smarty_tpl->tpl_vars['periods']->value[$_smarty_tpl->tpl_vars['ts']->value]);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>"schedule_daily"),$_smarty_tpl);?>
</td>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</tr>
			<tr>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BoundDates']->value, 'date');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['date']->value) {
?>
					<?php $_smarty_tpl->_assignInScope('ts', $_smarty_tpl->tpl_vars['date']->value->Timestamp());
?>
					<?php $_smarty_tpl->_assignInScope('datePeriods', $_smarty_tpl->tpl_vars['periods']->value[$_smarty_tpl->tpl_vars['ts']->value]);
?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datePeriods']->value, 'period');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['period']->value) {
?>
						<td class="reslabel" colspan="<?php echo $_smarty_tpl->tpl_vars['period']->value->Span();?>
"><?php echo $_smarty_tpl->tpl_vars['period']->value->Label($_smarty_tpl->tpl_vars['date']->value);?>
</td>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
$_smarty_tpl->_assignInScope('href', $_prefixVariable1."?rid=".((string)$_smarty_tpl->tpl_vars['resource']->value->Id)."&sid=".((string)$_smarty_tpl->tpl_vars['ScheduleId']->value));
?>
				<tr class="slots">
					<td class="resourcename" <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="background-color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetColor();?>
 !important"<?php }?>>
						<?php if ($_smarty_tpl->tpl_vars['resource']->value->CanAccess) {?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" resourceId="<?php echo $_smarty_tpl->tpl_vars['resource']->value->Id;?>
"
							   class="resourceNameSelector" <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
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
							<span resourceId="<?php echo $_smarty_tpl->tpl_vars['resourceId']->value;?>
" resourceId="<?php echo $_smarty_tpl->tpl_vars['resourceId']->value;?>
" class="resourceNameSelector" <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
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
						<?php $_smarty_tpl->_assignInScope('slots', $_smarty_tpl->tpl_vars['DailyLayout']->value->GetLayout($_smarty_tpl->tpl_vars['date']->value,$_smarty_tpl->tpl_vars['resourceId']->value));
?>
						<?php ob_start();
echo Pages::RESERVATION;
$_prefixVariable2=ob_get_clean();
ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>'url'),$_smarty_tpl);
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('href', $_prefixVariable2."?rid=".((string)$_smarty_tpl->tpl_vars['resource']->value->Id)."&sid=".((string)$_smarty_tpl->tpl_vars['ScheduleId']->value)."&rd=".$_prefixVariable3);
?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slots']->value, 'slot');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['slot']->value) {
?>
							<?php $_smarty_tpl->_assignInScope('slotRef', ((string)$_smarty_tpl->tpl_vars['slot']->value->BeginDate()->Format('YmdHis')).((string)$_smarty_tpl->tpl_vars['resourceId']->value));
?>
							<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displaySlot', array('Slot'=>$_smarty_tpl->tpl_vars['slot']->value,'Href'=>((string)$_smarty_tpl->tpl_vars['href']->value),'AccessAllowed'=>$_smarty_tpl->tpl_vars['resource']->value->CanAccess,'SlotRef'=>$_smarty_tpl->tpl_vars['slotRef']->value,'ResourceId'=>$_smarty_tpl->tpl_vars['resourceId']->value), true);?>

						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
<?php
}
}
/* {/block "reservations"} */
/* {block "scripts-before"} */
class Block_8173424095f577051de2911_35340838 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "scripts-before"} */
}
