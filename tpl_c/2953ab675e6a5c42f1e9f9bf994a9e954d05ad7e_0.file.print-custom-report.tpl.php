<?php
/* Smarty version 3.1.30, created on 2020-09-12 03:48:56
  from "C:\xampp5\htdocs\ulemc\tpl\Reports\print-custom-report.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f5c2908184645_84608139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2953ab675e6a5c42f1e9f9bf994a9e954d05ad7e' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\ulemc\\tpl\\Reports\\print-custom-report.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f5c2908184645_84608139 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!DOCTYPE HTML>
<html lang="<?php echo $_smarty_tpl->tpl_vars['HtmlLang']->value;?>
" dir="<?php echo $_smarty_tpl->tpl_vars['HtmlTextDirection']->value;?>
">
<head>
	<title><?php if ($_smarty_tpl->tpl_vars['TitleKey']->value != '') {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>$_smarty_tpl->tpl_vars['TitleKey']->value,'args'=>$_smarty_tpl->tpl_vars['TitleArgs']->value),$_smarty_tpl);
} else {
echo $_smarty_tpl->tpl_vars['Title']->value;
}?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['Charset']->value;?>
"/>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery-2.1.1.min.js"),$_smarty_tpl);?>

</head>
<body>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Created'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>Date::Now(),'key'=>'general_datetime'),$_smarty_tpl);?>

<table width="100%" border="1">
	<tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Definition']->value->GetColumnHeaders(), 'column', false, NULL, 'columnIterator', array (
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_columnIterator']->value['index']++;
?>
            <?php if ($_smarty_tpl->tpl_vars['ReportCsvColumnView']->value->ShouldShowCol($_smarty_tpl->tpl_vars['column']->value,(isset($_smarty_tpl->tpl_vars['__smarty_foreach_columnIterator']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_columnIterator']->value['index'] : null))) {?>
			<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "columnTitle", null, null);
if ($_smarty_tpl->tpl_vars['column']->value->HasTitle()) {
echo $_smarty_tpl->tpl_vars['column']->value->Title();
} else {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>$_smarty_tpl->tpl_vars['column']->value->TitleKey()),$_smarty_tpl);
}
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

			<th data-columnTitle="<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'columnTitle');?>
">
				<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'columnTitle');?>

			</th>
            <?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Report']->value->GetData()->Rows(), 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
		<tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Definition']->value->GetRow($_smarty_tpl->tpl_vars['row']->value), 'data', false, NULL, 'dataIterator', array (
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_dataIterator']->value['index']++;
?>
                <?php if ($_smarty_tpl->tpl_vars['ReportCsvColumnView']->value->ShouldShowCell((isset($_smarty_tpl->tpl_vars['__smarty_foreach_dataIterator']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_dataIterator']->value['index'] : null))) {?>
				<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value->Value(), ENT_QUOTES, 'UTF-8', true);?>
&nbsp;</td>
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
<?php echo $_smarty_tpl->tpl_vars['Report']->value->ResultCount();?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Rows'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['Definition']->value->GetTotal() != '') {?>
	| <?php echo $_smarty_tpl->tpl_vars['Definition']->value->GetTotal();?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Total'),$_smarty_tpl);?>

<?php }?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reports/common.js"),$_smarty_tpl);?>


<?php echo '<script'; ?>
 type="text/javascript">
	var common = new ReportsCommon(
			{
				scriptUrl: '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
'
			}
	);
	common.init();
	window.print();
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
