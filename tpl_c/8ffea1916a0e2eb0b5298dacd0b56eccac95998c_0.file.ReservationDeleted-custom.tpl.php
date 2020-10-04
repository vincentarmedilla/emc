<?php
/* Smarty version 3.1.30, created on 2020-06-07 17:09:35
  from "C:\xampp2\htdocs\ulemcscheduler\lang\en_us\ReservationDeleted-custom.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5edd032f629fc7_66813065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ffea1916a0e2eb0b5298dacd0b56eccac95998c' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemcscheduler\\lang\\en_us\\ReservationDeleted-custom.tpl',
      1 => 1590243415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edd032f629fc7_66813065 (Smarty_Internal_Template $_smarty_tpl) {
?>

Reservation Details:
<br/>
<br/>

User: <?php echo $_smarty_tpl->tpl_vars['UserName']->value;?>
<br/>
Starting: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['StartDate']->value,'key'=>'reservation_email'),$_smarty_tpl);?>
<br/>
Ending: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['EndDate']->value,'key'=>'reservation_email'),$_smarty_tpl);?>
<br/>
<?php if (count($_smarty_tpl->tpl_vars['ResourceNames']->value) > 1) {?>
    Resources:
    <br/>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ResourceNames']->value, 'resourceName');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resourceName']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['resourceName']->value;?>

        <br/>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php } else { ?>
    Resource: <?php echo $_smarty_tpl->tpl_vars['ResourceName']->value;?>

    <br/>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['ResourceImage']->value) {?>
    <div class="resource-image"><img src="<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ResourceImage']->value;?>
"/></div>
<?php }?>

Title: <?php echo $_smarty_tpl->tpl_vars['Title']->value;?>
<br/>
Description: <?php echo nl2br($_smarty_tpl->tpl_vars['Description']->value);?>
<br/>
Delete Reason: <?php echo nl2br($_smarty_tpl->tpl_vars['DeleteReason']->value);?>
<br/>

<?php if (count($_smarty_tpl->tpl_vars['RepeatRanges']->value) > 0) {?>
    <br/>
    The following dates have been removed:
    <br/>
<?php }?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RepeatRanges']->value, 'date', false, NULL, 'dates', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['date']->value) {
?>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value->GetBegin()),$_smarty_tpl);?>

    <?php if (!$_smarty_tpl->tpl_vars['date']->value->IsSameDate()) {?> - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value->GetEnd()),$_smarty_tpl);
}?>
    <br/>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


<?php if (count($_smarty_tpl->tpl_vars['Accessories']->value) > 0) {?>
    <br/>
    Accessories:
    <br/>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Accessories']->value, 'accessory');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['accessory']->value) {
?>
        (<?php echo $_smarty_tpl->tpl_vars['accessory']->value->QuantityReserved;?>
) <?php echo $_smarty_tpl->tpl_vars['accessory']->value->Name;?>

        <br/>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }?>
Client Name: <?php echo $_smarty_tpl->tpl_vars['ClientName']->value;?>
 <br/>
Order No. / Project No. <?php echo $_smarty_tpl->tpl_vars['OrderNo']->value;?>
 <br/>
Request No. / Project No. <?php echo $_smarty_tpl->tpl_vars['RequestNo']->value;?>
 <br/>
Client On Site: <?php echo $_smarty_tpl->tpl_vars['ClientOnSite']->value;?>
 <br/>
Sample On Site: <?php echo $_smarty_tpl->tpl_vars['SampleOnSite']->value;?>
 <br/>

<br/>
<a href="<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
">Login to UL Scheduler</a><?php }
}
