<?php
/* Smarty version 3.1.30, created on 2020-06-13 16:36:42
  from "C:\xampp2\htdocs\ulemcscheduler\tpl\Admin\Reservations\manage_reservation_colors.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ee4e47a32ef72_37590698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '757900371c732cf13bf5cdc00ea8bce579ecd34f' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemcscheduler\\tpl\\Admin\\Reservations\\manage_reservation_colors.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:javascript-includes.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5ee4e47a32ef72_37590698 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once 'C:\\xampp2\\htdocs\\ulemcscheduler\\lib\\external\\Smarty\\plugins\\function.cycle.php';
?>


<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div id="page-manage-reservation-colors" class="admin-page">

    <div class="default-box col-xs-12 col-sm-8 col-sm-offset-2">
        <h1><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationColors'),$_smarty_tpl);?>
</h1>

        <form class="form-inline" role="form">
            <div class="form-group">
                <label for="attributeOption"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Attribute'),$_smarty_tpl);?>
</label>
                <select class="form-control" id="attributeOption">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Attributes']->value, 'attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['attribute']->value->Id();?>
"><?php echo $_smarty_tpl->tpl_vars['attribute']->value->Label();?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </select>

                <button type="button" class="btn btn-success" id="addRuleButton">
                    <i class="fa fa-plus"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddRule'),$_smarty_tpl);?>

                </button>
            </div>
        </form>

        <div class="clearfix">&nbsp;</div>

        <table class="table" id="reservationTable">
            <thead>
            <tr>
                <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Attribute'),$_smarty_tpl);?>
</th>
                <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RequiredValue'),$_smarty_tpl);?>
</th>
                <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Color'),$_smarty_tpl);?>
</th>
                <th class="action"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Rules']->value, 'rule');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rule']->value) {
?>
                <?php smarty_function_cycle(array('values'=>'row0,row1','assign'=>'rowCss'),$_smarty_tpl);?>

                <tr class="<?php echo $_smarty_tpl->tpl_vars['rowCss']->value;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['rule']->value->AttributeName;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['rule']->value->RequiredValue;?>
</td>
                    <td style="background-color:<?php echo $_smarty_tpl->tpl_vars['rule']->value->Color;?>
">&nbsp;</td>
                    <td class="action">
                        <a href="#" class="update delete" ruleId="<?php echo $_smarty_tpl->tpl_vars['rule']->value->Id;?>
"><span
                                    class="fa fa-trash icon remove fa-1x"></span></a>
                    </td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addDialog" tabindex="-1" role="dialog"
         aria-labelledby="addDialogLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="addForm" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>
?action=add" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="addDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddReservationColorRule'),$_smarty_tpl);?>
</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationCustomRuleAdd'),$_smarty_tpl);?>


                        <div id='attributeFillIn' class='inline-block'></div>
                        <div id="color" class="inline-block">
                            <label for="reservationColor" class="no-show">Reservation Color</label>
                            <input type="color" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"RESERVATION_COLOR"),$_smarty_tpl);?>
 class="form-control required"
                                   id="reservationColor" maxlength="6"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['add_button'][0][0]->AddButton(array(),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog"
         aria-labelledby="deleteDialogLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteForm" action="<?php echo $_SERVER['SCRIPT_NAME'];?>
?action=delete" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="deleteDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DeleteWarning'),$_smarty_tpl);?>

                        </div>
                        <input type="hidden" id="deleteRuleId" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESERVATION_COLOR_RULE_ID'),$_smarty_tpl);?>
 />
                    </div>
                    <div class="modal-footer">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['delete_button'][0][0]->DeleteButton(array(),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Attributes']->value, 'attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
?>
        <div id="attribute<?php echo $_smarty_tpl->tpl_vars['attribute']->value->Id();?>
"
             class="hidden"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"AttributeControl",'attribute'=>$_smarty_tpl->tpl_vars['attribute']->value,'searchmode'=>true),$_smarty_tpl);?>
</div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>


</div>

<?php $_smarty_tpl->_subTemplateRender("file:javascript-includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery.form-3.09.min.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-form-submit.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"admin/reservation-colors.js"),$_smarty_tpl);?>


<?php echo '<script'; ?>
 type="text/javascript">
    $('document').ready(function () {
        var mgmt = new ReservationColorManagement();
        mgmt.init();
    });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
