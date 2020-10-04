<?php
/* Smarty version 3.1.30, created on 2020-08-20 12:52:49
  from "C:\xampp2\htdocs\ulemc\tpl\Reservation\create.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f3e5601499f48_99999932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91b90b4bdc01e87403c946d499829070eeac9780' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ulemc\\tpl\\Reservation\\create.tpl',
      1 => 1597919733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:Reservation/participation.tpl' => 1,
    'file:Reservation/private-participation.tpl' => 1,
    'file:javascript-includes.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5f3e5601499f48_99999932 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'displayResource' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\ulemc\\tpl_c\\91b90b4bdc01e87403c946d499829070eeac9780_0.file.create.tpl.php',
    'uid' => '91b90b4bdc01e87403c946d499829070eeac9780',
    'call_name' => 'smarty_template_function_displayResource_10879576635f3e5601389403_32815504',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10195096665f3e56013b4273_68026188', "header");
?>



<style>
    .required-field:after {
        color: #d00;
        content: "*";
        position: absolute;
        margin-left: 3px;
        top: 4px;
    }
    select option:disabled{
        color:red;
    }
</style>

<style>
    .customAttribute {
        width: 475px;
    }
    
    .error {
        border:1px solid red;
    }
    
    .error_message {
         color:red;
    }

    .customAttribute .form-group input {
        width: 400px;
    }
    .customAttribute .checkbox {
    /*.customAttribute .checkbox {
        width: 900px;
    }*/

</style>
<?php echo '<script'; ?>
>
$(document).ready(function(){
	$(".error_message").hide();
    $(".nomail").hide();
});
<?php echo '</script'; ?>
>
<div id="page-reservation">
    <div id="reservation-box">
        <form id="form-reservation"  method="post" enctype="multipart/form-data" role="form">

            <div class="row">
                <div class="col-md-6 col-xs-12 col-top reservationHeader">
                    <label class="radio-inline"><h3><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12179531385f3e56013c50f7_98496626', 'reservationHeader');
?>
</h3></label>
                    <label class="radio-inline">
      					<input type="radio" id="status" name="status" value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value == '1') {?> checked <?php }?> <?php if ($_smarty_tpl->tpl_vars['status']->value == '1') {?> checked <?php } else { ?> checked <?php }?>>Temporary
    				</label>
    				<label class="radio-inline">
      					<input type="radio" id="status" name="status" value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value == '2') {?> checked <?php }?>>Confirmed
    				</label>
                </div>

                <div class="col-md-6 col-xs-12 col-top">
                    <div class="pull-right-sm">
                        <a href="#" id="btnViewAvailability"><i class="fa fa-calendar"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"ViewAvailability"),$_smarty_tpl);?>
</a>
                        <button type="button" class="btn btn-default" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['ReturnUrl']->value;?>
'">
                            <span class="hidden-xs"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Cancel'),$_smarty_tpl);?>
</span>
                            <span class="visible-xs"><i class="fa fa-arrow-circle-left"></i></span>
                        </button>
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20566797255f3e56013ca082_22367758', "submitButtons");
?>

                    </div>
                </div>
            </div>

            <div class="row">
                <?php $_smarty_tpl->_assignInScope('detailsCol', "col-xs-12");
?>
                <?php $_smarty_tpl->_assignInScope('participantCol', "col-xs-12");
?>

                <?php if ($_smarty_tpl->tpl_vars['ShowParticipation']->value && $_smarty_tpl->tpl_vars['AllowParticipation']->value && $_smarty_tpl->tpl_vars['ShowReservationDetails']->value) {?>
                    <?php $_smarty_tpl->_assignInScope('detailsCol', "col-xs-12 col-sm-6");
?>
                    <?php $_smarty_tpl->_assignInScope('participantCol', "col-xs-12 col-sm-6");
?>
                <?php }?>

                <div id="reservationDetails"
                     class="<?php echo $_smarty_tpl->tpl_vars['detailsCol']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['ShowParticipation']->value && $_smarty_tpl->tpl_vars['AllowParticipation']->value && $_smarty_tpl->tpl_vars['ShowReservationDetails']->value) {?>detailsBorder<?php }?>">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <?php if ($_smarty_tpl->tpl_vars['ShowUserDetails']->value && $_smarty_tpl->tpl_vars['ShowReservationDetails']->value) {?>
                                <a href="#" id="userName" data-userid="<?php echo $_smarty_tpl->tpl_vars['UserId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['ReservationUserName']->value;?>
</a>
                            <?php } else { ?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Private'),$_smarty_tpl);?>

                            <?php }?>
                            
                            
                                <a href="#" id="showChangeUsers" class="small-action"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Change'),$_smarty_tpl);?>
 <i
                                            class="fa fa-user"></i></a>
                                <div class="modal fade" id="changeUserDialog" tabindex="-1" role="dialog"
                                     aria-labelledby="usersModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;
                                                </button>
                                                <h4 class="modal-title"
                                                    id="usersModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ChangeUser'),$_smarty_tpl);?>
</h4>
                                            </div>
                                            <div class="modal-body scrollable-modal-content">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Cancel'),$_smarty_tpl);?>
</button>
                                                <button type="button"
                                                        class="btn btn-primary"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Done'),$_smarty_tpl);?>
</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                            <div id="availableCredits" <?php if (!$_smarty_tpl->tpl_vars['CreditsEnabled']->value) {?>style="display:none" }<?php }?>>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AvailableCredits'),$_smarty_tpl);?>

                                <span id="availableCreditsCount"><?php echo $_smarty_tpl->tpl_vars['CurrentUserCredits']->value;?>
</span> |
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CreditsRequired'),$_smarty_tpl);?>

                                <span id="requiredCreditsCount"><span class="fa fa-spin fa-spinner"></span></span>
                                <span id="creditCost"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12" id="changeUsers">
                        <div class="form-group">
                            <label for="changeUserAutocomplete" class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'User'),$_smarty_tpl);?>
</label>
<!--                             <input type="text" id="changeUserAutocomplete" -->
<!--                                    class="form-control inline-block user-search"/> -->
								<select id="users" class="form-control selectpicker" data-live-search="true">
					<option value="" selected disabled>Select User</option>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['admin_users']->value, 'i', false, 'myId', 'foo', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
						
						<option value="<?php echo $_smarty_tpl->tpl_vars['i']->value['fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['i']->value['lname'];?>
(<?php echo $_smarty_tpl->tpl_vars['i']->value['email'];?>
)=<?php echo $_smarty_tpl->tpl_vars['i']->value['user_id'];?>
">
							<?php echo $_smarty_tpl->tpl_vars['i']->value['fname'];?>
 - <?php echo $_smarty_tpl->tpl_vars['i']->value['email'];?>

						</option>
						
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</select>
				
				<input id="userId" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'USER_ID'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['UserId']->value;?>
"/>
<!--                             | -->
<!--                             <button id="promptForChangeUsers" type="button" class="btn inline"> -->
<!--                                 <i class="fa fa-users"></i> -->
<!--                                 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllUsers'),$_smarty_tpl);?>
 -->
<!--                             </button> -->
                        </div>
                    </div>

                    <div class="col-xs-12 reservationDates">
                        <div class="col-md-6 no-padding-left">
                            <div class="form-group no-margin-bottom">
                                <label for="BeginDate" class="reservationDate"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BeginDate'),$_smarty_tpl);?>
</label>
                                <input type="text" id="BeginDate"
                                       class="form-control input-sm inline-block dateinput<?php if ($_smarty_tpl->tpl_vars['LockPeriods']->value) {?> no-show<?php }?>"
                                       value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['StartDate']->value),$_smarty_tpl);?>
"/>
                                <input type="hidden" id="formattedBeginDate" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'BEGIN_DATE'),$_smarty_tpl);?>

                                       value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['StartDate']->value,'key'=>'system'),$_smarty_tpl);?>
"/>
                                <select id="BeginPeriod" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'BEGIN_PERIOD'),$_smarty_tpl);?>

                                        class="form-control input-sm inline-block timeinput<?php if ($_smarty_tpl->tpl_vars['LockPeriods']->value) {?> no-show<?php }?>"
                                        title="Begin time">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['StartPeriods']->value, 'period');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['period']->value) {
?>
                                        <?php if ($_smarty_tpl->tpl_vars['period']->value->IsReservable()) {?>
                                            <?php $_smarty_tpl->_assignInScope('selected', '');
?>
                                            <?php if ($_smarty_tpl->tpl_vars['period']->value == $_smarty_tpl->tpl_vars['SelectedStart']->value) {?>
                                                <?php $_smarty_tpl->_assignInScope('selected', ' selected="selected"');
?>
                                                <?php $_smarty_tpl->_assignInScope('startPeriod', $_smarty_tpl->tpl_vars['period']->value);
?>
                                            <?php }?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['period']->value->Begin();?>
"<?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
><?php echo $_smarty_tpl->tpl_vars['period']->value->Label();?>
</option>
                                        <?php }?>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                                <?php if ($_smarty_tpl->tpl_vars['LockPeriods']->value) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['StartDate']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['startPeriod']->value->Label();
}?>
                            </div>
                        </div>
                        <div class="col-md-6 no-padding-left">
                            <div class="form-group no-margin-bottom">
                                <label for="EndDate" class="reservationDate"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EndDate'),$_smarty_tpl);?>
</label>
                                <input type="text" id="EndDate"
                                       class="form-control input-sm inline-block dateinput<?php if ($_smarty_tpl->tpl_vars['LockPeriods']->value) {?> no-show<?php }?>"
                                       value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['EndDate']->value),$_smarty_tpl);?>
"/>
                                <input type="hidden" id="formattedEndDate" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'END_DATE'),$_smarty_tpl);?>

                                       value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['EndDate']->value,'key'=>'system'),$_smarty_tpl);?>
"/>
                                <select id="EndPeriod" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'END_PERIOD'),$_smarty_tpl);?>

                                        class="form-control  input-sm inline-block timeinput<?php if ($_smarty_tpl->tpl_vars['LockPeriods']->value) {?> no-show<?php }?>"
                                        title="End time">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['EndPeriods']->value, 'period', false, NULL, 'endPeriods', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['period']->value) {
?>
                                        <?php if ($_smarty_tpl->tpl_vars['period']->value->IsReservable()) {?>
                                            <?php $_smarty_tpl->_assignInScope('selected', '');
?>
                                            <?php if ($_smarty_tpl->tpl_vars['period']->value == $_smarty_tpl->tpl_vars['SelectedEnd']->value) {?>
                                                <?php $_smarty_tpl->_assignInScope('selected', ' selected="selected"');
?>
                                                <?php $_smarty_tpl->_assignInScope('endPeriod', $_smarty_tpl->tpl_vars['period']->value);
?>
                                            <?php }?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['period']->value->End();?>
"<?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
><?php echo $_smarty_tpl->tpl_vars['period']->value->LabelEnd();?>
</option>
                                        <?php }?>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                                <?php if ($_smarty_tpl->tpl_vars['LockPeriods']->value) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['EndDate']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['endPeriod']->value->LabelEnd();
}?>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 reservationLength">
                        <div class="form-group">
                            
                            <div class="durationText">
                                <span id="durationDays">0</span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'days'),$_smarty_tpl);?>

                                <span id="durationHours">0</span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'hours'),$_smarty_tpl);?>

                                <span id="durationMinutes">0</span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'minutes'),$_smarty_tpl);?>

                            </div>
                        </div>
                    </div>

                    <?php if (!$_smarty_tpl->tpl_vars['HideRecurrence']->value) {?>
                        <div class="col-xs-12">
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"RecurrenceControl",'RepeatTerminationDate'=>$_smarty_tpl->tpl_vars['RepeatTerminationDate']->value),$_smarty_tpl);?>

                        </div>
                    <?php }?>

                    <div class="col-xs-12 reservationResources" id="reservation-resources">
                        <div class="form-group">
                            <div class="pull-left">
                                

                                <div>
                                    <label>Physical <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Resources"),$_smarty_tpl);?>
</label>
                                    <?php if ($_smarty_tpl->tpl_vars['ShowAdditionalResources']->value) {?>
                                        <a id="btnAddResources" href="#"
                                           class="small-action" data-toggle="modal"
                                           data-target="#dialogResourceGroups"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Change'),$_smarty_tpl);?>
 <span
                                                    class="fa fa-plus-square"></span></a>
                                    <?php }?>
                                </div>



                                <div id="primaryResourceContainer" class="inline">
                                    <input type="hidden" id="scheduleId" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SCHEDULE_ID'),$_smarty_tpl);?>

                                           value="<?php echo $_smarty_tpl->tpl_vars['ScheduleId']->value;?>
"/>
                                    <input class="resourceId" type="hidden"
                                           id="primaryResourceId" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_ID'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
"/>
                                    <?php if (!empty($_GET['rn'])) {?>
                                    <div class="resourceName" id="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
" style="background-color:;color:">
                                        <span class="resourceDetails" data-resourceid="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
" resource-details-bound="1"><?php echo $_smarty_tpl->tpl_vars['ResourceName']->value;?>
</span>
                                    </div>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayResource', array('resource'=>$_smarty_tpl->tpl_vars['Resource']->value), true);?>

                                    <?php }?>
                                </div>

                                <div id="additionalResources">
                                    
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AvailableResources']->value, 'resource');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
                                        <?php if (is_array($_smarty_tpl->tpl_vars['AdditionalResourceIds']->value) && in_array($_smarty_tpl->tpl_vars['resource']->value->Id,$_smarty_tpl->tpl_vars['AdditionalResourceIds']->value)) {?>
                                            <input class="resourceId" type="hidden"
                                                   name="<?php echo FormKeys::ADDITIONAL_RESOURCES;?>
[]" value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->Id;?>
"/>
                                            <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayResource', array('resource'=>$_smarty_tpl->tpl_vars['resource']->value), true);?>

                                        <?php }?>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    
                                </div>
                            </div>
                            <div class="accessoriesDiv">
                                <?php if ($_smarty_tpl->tpl_vars['ShowReservationDetails']->value && count($_smarty_tpl->tpl_vars['AvailableAccessories']->value) > 0) {?>
                                    <label><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Accessories"),$_smarty_tpl);?>
</label>
                                    <a href="#" id="addAccessoriesPrompt"
                                       class="small-action" data-toggle="modal"
                                       data-target="#dialogAddAccessories"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Add'),$_smarty_tpl);?>
 <span
                                                class="fa fa-plus-square"></span></a>
                                    <div id="accessories"></div>
                                <?php }?>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 reservationTitle">
                        <div class="required form-group has-feedback">
                            <label class="required-field" for="reservationTitle"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"ReservationTitle"),$_smarty_tpl);?>
</label>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('name'=>"RESERVATION_TITLE",'class'=>"form-control",'value'=>"ReservationTitle",'id'=>"reservationTitle",'maxlength'=>"300",'data-validation'=>"required",'data-validation-length'=>"min4",'data-validation-error-msg'=>"Title is Required"),$_smarty_tpl);?>

                            <?php if ($_smarty_tpl->tpl_vars['TitleRequired']->value) {?>
                                <i class="glyphicon glyphicon-asterisk form-control-feedback"
                                   data-bv-icon-for="reservationTitle"></i>
                            <?php }?>
                        </div>
                    </div>

                    <div class="col-xs-12 reservationDescription">
                        <div class="form-group has-feedback">
                            <label for="reservationTitle">Description of booking</label>
                            <textarea id="description" name="<?php echo FormKeys::DESCRIPTION;?>
"
                                      class="form-control" data-validation-length="min4" data-validation-error-msg="Description is Required"
                                      <?php if ($_smarty_tpl->tpl_vars['DescriptionRequired']->value) {?>required="required"<?php }?>><?php echo $_smarty_tpl->tpl_vars['Description']->value;?>
</textarea>
                            <?php if ($_smarty_tpl->tpl_vars['DescriptionRequired']->value) {?>
                                <i class="glyphicon glyphicon-asterisk form-control-feedback"
                                   data-bv-icon-for="description"></i>
                            <?php }?>

                        </div>
                    </div>

                    <?php if (!empty($_smarty_tpl->tpl_vars['ReferenceNumber']->value)) {?>
                        
                    <?php }?>
                </div>

                <div class="<?php echo $_smarty_tpl->tpl_vars['participantCol']->value;?>
">
                    <?php if ($_smarty_tpl->tpl_vars['ShowParticipation']->value && $_smarty_tpl->tpl_vars['AllowParticipation']->value && $_smarty_tpl->tpl_vars['ShowReservationDetails']->value) {?>
                        <?php $_smarty_tpl->_subTemplateRender("file:Reservation/participation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <?php } else { ?>
                        <?php $_smarty_tpl->_subTemplateRender("file:Reservation/private-participation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <?php }?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 detailsBorder" id="reservationDetails">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label  for="reservationTitle">Client Name</label>
                            <input type="text" class="form-control" id="client" name="client"  data-validation-length="" required data-validation-error-msg="Client is Required" value="<?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
">

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="pwd">Order No. / Project No.</label>
                            <input type="text" class="form-control" id="projects" name="projects" value="<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="pwd">Request No.</label>
                            <input type="text" class="form-control" id="request_no" name="request_no" value="<?php echo $_smarty_tpl->tpl_vars['request_no']->value;?>
">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label><input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['cos']->value == 'Yes') {?> checked <?php }?>  name="client_on_sites" id="client_on_sites" value="Yes">Client On Site?</label>
                            &nbsp;&nbsp;&nbsp;
                            <label><input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['sos']->value == 'Yes') {?> checked <?php }?> name="sample_on_site" id="sample_on_site" value="Yes">Sample On Site?</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                   <div class="col-sm-3">
                        <label for="actualStart" id="lblAs">Actual Start</label>
                        <input type="time" id="as" name="as" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['actualstart']->value;?>
" onfocusout="checkStartTime();">
                   </div>
                   <div class="col-sm-3">
                        <label for="actualEnd" id="lblAe">Actual End</label>
                        <input type="time" id="ae" name="ae" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['actualend']->value;?>
" onfocusout="checkTimeDuration();">
                   </div>
                   <div class="col-sm-3">
                        <label for="duration" id="lblDuration">Duration</label><p id="diff"></p>
                   </div>
                </div>
                <div class="col-sm-6">
                    &nbsp;
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                       <textarea id="notes" name="notes"  style="width:100%" rows="6"
                                      class="form-control" data-validation-length="min4" data-validation-error-msg="Description is Required"
                                      <?php if ($_smarty_tpl->tpl_vars['DescriptionRequired']->value) {?>required="required"<?php }?>><?php echo $_smarty_tpl->tpl_vars['notes']->value;?>
</textarea>
                    </div>
                </div>
           </div>



            

            <?php if ($_smarty_tpl->tpl_vars['RemindersEnabled']->value) {?>
                <div class="row col-xs-12">
                    <div class="col-xs-12 reservationReminders">
                        <div>
                            <label><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SendReminder'),$_smarty_tpl);?>
</label>
                        </div>
                        <div id="reminderOptionsStart">
                            <div class="checkbox">
                                <input type="checkbox" id="startReminderEnabled"
                                       class="reminderEnabled" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'START_REMINDER_ENABLED'),$_smarty_tpl);?>
/>
                                <label for="startReminderEnabled" style="min-width:0;"></label>
                                <label for="startReminderTime" class="no-show">Start Reminder Time</label>
                                <label for="startReminderInterval" class="no-show">Start Reminder Interval</label>
                                <input type="number" min="0" max="999" size="3" maxlength="3" value="15"
                                       class="reminderTime form-control input-sm inline-block" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'START_REMINDER_TIME'),$_smarty_tpl);?>

                                       id="startReminderTime"/>
                                <select class="reminderInterval form-control input-sm inline-block" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'START_REMINDER_INTERVAL'),$_smarty_tpl);?>

                                        id="startReminderInterval">
                                    <option value="<?php echo ReservationReminderInterval::Minutes;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'minutes'),$_smarty_tpl);?>
</option>
                                    <option value="<?php echo ReservationReminderInterval::Hours;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'hours'),$_smarty_tpl);?>
</option>
                                    <option value="<?php echo ReservationReminderInterval::Days;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'days'),$_smarty_tpl);?>
</option>
                                </select>

                                <span class="reminderLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReminderBeforeStart'),$_smarty_tpl);?>
</span>
                            </div>
                        </div>
                        <div id="reminderOptionsEnd">
                            <div class="checkbox">
                                <input type="checkbox" id="endReminderEnabled"
                                       class="reminderEnabled" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'END_REMINDER_ENABLED'),$_smarty_tpl);?>
/>
                                <label for="endReminderEnabled" style="min-width:0;"></label>
                                <label for="endReminderTime" class="no-show">End Reminder Time</label>
                                <label for="endReminderInterval" class="no-show">End Reminder Interval</label>
                                <input type="number" min="0" max="999" size="3" maxlength="3" value="15"
                                       class="reminderTime form-control input-sm inline-block" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'END_REMINDER_TIME'),$_smarty_tpl);?>

                                       id="endReminderTime"/>
                                <select class="reminderInterval form-control input-sm inline-block" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'END_REMINDER_INTERVAL'),$_smarty_tpl);?>

                                        id="endReminderInterval">
                                    <option value="<?php echo ReservationReminderInterval::Minutes;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'minutes'),$_smarty_tpl);?>
</option>
                                    <option value="<?php echo ReservationReminderInterval::Hours;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'hours'),$_smarty_tpl);?>
</option>
                                    <option value="<?php echo ReservationReminderInterval::Days;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'days'),$_smarty_tpl);?>
</option>
                                </select>
                                <span class="reminderLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReminderBeforeEnd'),$_smarty_tpl);?>
</span>
                            </div>

                        </div>
                        <div class="clear">&nbsp;</div>
                    </div>
                </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['UploadsEnabled']->value) {?>
                <div class="row col-xs-12">
                    <div class="col-xs-12 reservationAttachments">

                        <label><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AttachFile'),$_smarty_tpl);?>
 <span class="note">(<?php echo $_smarty_tpl->tpl_vars['MaxUploadSize']->value;?>

                                MB <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Maximum'),$_smarty_tpl);?>
)</span>
                        </label>

                        <div id="reservationAttachments">
                            <div class="attachment-item">
                                <label for="reservationUploadFile">Reservation Upload File</label>
                                <input type="file" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESERVATION_FILE','multi'=>true),$_smarty_tpl);?>

                                       id="reservationUploadFile"/>
                                <a class="add-attachment" href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Add'),$_smarty_tpl);?>
 <i class="fa fa-plus-square"></i></a>
                                <a class="remove-attachment" href="#"><span
                                            class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</span><i
                                            class="fa fa-minus-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['Terms']->value != null) {?>
                <div class="row col-xs-12" id="termsAndConditions">
                    <div class="col-xs-12">
                        <?php if ($_smarty_tpl->tpl_vars['TermsAccepted']->value) {?>
                            <div class="margin-top-25">
                                <i class="fa fa-check-square-o"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'IAccept'),$_smarty_tpl);?>

                                <a href="<?php echo $_smarty_tpl->tpl_vars['Terms']->value->DisplayUrl();?>
" style="vertical-align: middle" target="_blank"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'TheTermsOfService'),$_smarty_tpl);?>
</a>
                            </div>
                        <?php } else { ?>
                            <div class="checkbox">
                                <input type="checkbox"
                                       id="termsAndConditionsAcknowledgement" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'TOS_ACKNOWLEDGEMENT'),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['TermsAccepted']->value) {?>checked="checked"<?php }?>/>
                                <label for="termsAndConditionsAcknowledgement"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'IAccept'),$_smarty_tpl);?>
</label>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['Terms']->value->DisplayUrl();?>
" style="vertical-align: middle"
                                   target="_blank"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'TheTermsOfService'),$_smarty_tpl);?>
</a>
                            </div>
                        <?php }?>
                    </div>
                </div>
            <?php }?>

            <input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESERVATION_ID'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['ReservationId']->value;?>
"/>
            <input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REFERENCE_NUMBER'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['ReferenceNumber']->value;?>
" id="referenceNumber"/>
            <input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESERVATION_ACTION'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['ReservationAction']->value;?>
"/>
            <input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'DELETE_REASON'),$_smarty_tpl);?>
 value="" id="hdnDeleteReason"/>

            <input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SERIES_UPDATE_SCOPE'),$_smarty_tpl);?>
 id="hdnSeriesUpdateScope"
                   value="<?php echo SeriesUpdateScope::FullSeries;?>
"/>

            <div class="row">
                <div class="reservationButtons col-md-6 col-md-offset-6 col-xs-12">
                    <div class="pull-right-sm">
                        <button type="button" class="btn btn-default" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['ReturnUrl']->value;?>
'">
                            <span class="hidden-xs"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Cancel'),$_smarty_tpl);?>
</span>
                            <span class="visible-xs"><i class="fa fa-arrow-circle-left"></i></span>
                        </button>
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1066640335f3e560141a9b8_99761358', "submitButtons");
?>

                    </div>
                </div>
            </div>

            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>


            <?php if ($_smarty_tpl->tpl_vars['UploadsEnabled']->value) {?>
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14496868185f3e560141c4c4_79409619', 'attachments');
?>

            <?php }?>

            <div id="retrySubmitParams" class="no-show"></div>
        </form>
    </div>

    <div class="modal fade " id="dialogResourceGroups" tabindex="-1" role="dialog" aria-labelledby="resourcesModalLabel"
         aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title" id="resourcesModalLabel">Physical Resource</h4>

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, json_decode($_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value), 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?>
                        
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, array_reverse($_smarty_tpl->tpl_vars['result']->value->children), 'results');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['results']->value) {
?>
                            <?php $_smarty_tpl->_assignInScope('rsr', ((string)$_smarty_tpl->tpl_vars['results']->value->resource_id));
?>
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


                </div>
                <div class="modal-body scrollable-modal-content">

                    <select id="physical_list" class="form-control">
                        <option>Select a resource</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, json_decode($_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value), 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value->children, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1 == '') {?>
                                    
                                        <option     resource-id-pull="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" class="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['row']->value->resource_name;?>

                                        </option>
                                    
                                <?php }?>
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

                    </select><br>
                    <ul class="jqtree_common jqtree-tree">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, json_decode($_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value), 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value->children, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>


                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable2=ob_get_clean();
if ($_prefixVariable2 == '') {?>
                                    <li class="jqtree_common">
                                        <?php } else { ?>
                                    <li class="jqtree_common" style="display: none">
                                <?php }?>
                                
                                        <div class="jqtree-element jqtree_common">
                                <span class="jqtree-title jqtree_common">
                                    <label id="demos">
                                        <?php ob_start();
echo $_GET['rid'];
$_prefixVariable3=ob_get_clean();
if (empty($_prefixVariable3)) {?>
                                            <input <?php if (in_array($_smarty_tpl->tpl_vars['row']->value->resource_id,$_smarty_tpl->tpl_vars['resource_id']->value)) {?> checked <?php }?> type="checkbox" value=<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
 resource-id="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" id="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" name="nomail" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="PrResources additionalResourceCheckbox <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable4=ob_get_clean();
if (empty($_prefixVariable4)) {?>pr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
 pr <?php } else { ?>hr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
 hr <?php }?>"" name="pr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value->resource_name;?>

                                        
                                        <?php } else { ?>
                                         
                                            <input <?php ob_start();
echo $_smarty_tpl->tpl_vars['ResourceId']->value;
$_prefixVariable5=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->resource_id;
$_prefixVariable6=ob_get_clean();
if ($_prefixVariable5 == $_prefixVariable6) {?> checked <?php }?> type="checkbox" value=<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
 resource-id="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" id="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
"  group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="PrResources additionalResourceCheckbox <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable7=ob_get_clean();
if (empty($_prefixVariable7)) {?>pr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
 pr <?php } else { ?>hr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
 hr <?php }?>" name="pr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
 physical_resource">
                                            <?php echo $_smarty_tpl->tpl_vars['row']->value->resource_name;?>

                                        <?php }?>
                                    </label>
                                </span>
                                        </div>
                                    </li>



                                
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

                    </ul>

                    <input type="hidden" name="human" id="human" value="physical">
                </div>
                <div class="modal-footer">
                    <div id="checking-availability" class="pull-left"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CheckingAvailability'),$_smarty_tpl);?>
 <i
                                class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>
                    <button type="button" class="btn btn-default btnClearAddResources"
                            data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btnConfirmAddResources"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Done'),$_smarty_tpl);?>
</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="dialogResourceGroupsHuman" tabindex="-1" role="dialog" aria-labelledby="resourcesModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="resourcesModalLabel">Human Resource</h4>
                </div>
                <div class="modal-body scrollable-modal-content">
                    
                    <div class="participationText">
                        <span class="hidden-xs"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Add'),$_smarty_tpl);?>
</span>
                        
                        <?php if ($_smarty_tpl->tpl_vars['CanViewAdmin']->value) {?>
                            <input type="text" id="inviteeAutocompleteHuman" class="form-control inline-block user-search" placeholder="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NameOrEmail'),$_smarty_tpl);?>
"/>
                        <?php } else { ?>
                            
                            <select id="group_user_list_human" class="form-control">
                                <option value="" selected>Select User</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, json_decode($_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value), 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value->children, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable8=ob_get_clean();
if ($_prefixVariable8 != '') {?>
                                            <?php if ($_smarty_tpl->tpl_vars['row']->value->resource_id != $_GET['rid']) {?>
                                                <?php if ($_smarty_tpl->tpl_vars['row']->value->userid != $_smarty_tpl->tpl_vars['owner_id']->value) {?>
                                                <option resource-id-human="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" class="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value->lastname;?>
(<?php echo $_smarty_tpl->tpl_vars['row']->value->email;?>
) = <?php echo $_smarty_tpl->tpl_vars['row']->value->userid;?>
">
                                                    <?php echo $_smarty_tpl->tpl_vars['row']->value->resource_name;?>

                                                </option>
                                                    <?php }?>
                                            <?php }?>
                                        <?php }?>
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

                                
                            </select>
                        <?php }?>
                        
                    </div>
                    <ul class="jqtree_common jqtree-tree" style="padding-top: 20px;">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, json_decode($_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value), 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value->children, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable9=ob_get_clean();
if ($_prefixVariable9 != '') {?>
                                    <li class="jqtree_common">
                                        <?php } else { ?>
                                    <li class="jqtree_common" style="display: none">
                                <?php }?>
                                    
                                        <div class="jqtree-element jqtree_common">
                                <span class="jqtree-title jqtree_common">
                                   

                                    <label id="demos">
                                        <?php ob_start();
echo $_GET['rid'];
$_prefixVariable10=ob_get_clean();
if (empty($_prefixVariable10)) {?>
                                        <?php if ($_smarty_tpl->tpl_vars['row']->value->userid != $_smarty_tpl->tpl_vars['owner_id']->value) {?>
                                            <input <?php if (in_array($_smarty_tpl->tpl_vars['row']->value->resource_id,$_smarty_tpl->tpl_vars['resource_id']->value)) {?> checked <?php }?> type="checkbox" resource-id-human-checkbox="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" resource-id="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" id="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" name="hr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="additionalResourceCheckbox <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable11=ob_get_clean();
if (empty($_prefixVariable11)) {?>pr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;
} else { ?>hr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;
}?>" <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable12=ob_get_clean();
if ($_prefixVariable12 != '') {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value->lastname;?>
 (<?php echo $_smarty_tpl->tpl_vars['row']->value->email;?>
)=><?php echo $_smarty_tpl->tpl_vars['row']->value->userid;?>
" <?php } else { ?> value="0" <?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value->resource_name;?>

                                        <?php }?>
                                        <?php ob_start();
echo $_GET['rn'];
$_prefixVariable13=ob_get_clean();
if (empty($_prefixVariable13)) {?>
                                            <?php if ($_smarty_tpl->tpl_vars['row']->value->userid != $_smarty_tpl->tpl_vars['owner_id']->value) {?>
                                            <input <?php ob_start();
echo $_smarty_tpl->tpl_vars['ResourceId']->value;
$_prefixVariable14=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->resource_id;
$_prefixVariable15=ob_get_clean();
if ($_prefixVariable14 == $_prefixVariable15) {?> checked <?php }?> type="checkbox" resource-id-human-checkbox="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" resource-id="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" id="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" name="hr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="additionalResourceCheckbox <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable16=ob_get_clean();
if (empty($_prefixVariable16)) {?>pr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;
} else { ?>hr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;
}?>" <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable17=ob_get_clean();
if ($_prefixVariable17 != ' ') {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value->lastname;?>
 (<?php echo $_smarty_tpl->tpl_vars['row']->value->email;?>
)=><?php echo $_smarty_tpl->tpl_vars['row']->value->userid;?>
" <?php } else { ?> value="0" <?php }?>>
                                            <?php }?>
                                        <?php }?>
                                        <?php } else { ?>
                                         
                                        <?php if ($_smarty_tpl->tpl_vars['row']->value->userid != $_smarty_tpl->tpl_vars['owner_id']->value) {?>
                                            <input <?php ob_start();
echo $_smarty_tpl->tpl_vars['ResourceId']->value;
$_prefixVariable18=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->resource_id;
$_prefixVariable19=ob_get_clean();
if ($_prefixVariable18 == $_prefixVariable19) {?> checked <?php }?> type="checkbox" resource-id-human-checkbox="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" resource-id="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" id="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" name="hr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="additionalResourceCheckbox <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable20=ob_get_clean();
if (empty($_prefixVariable20)) {?>pr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;
} else { ?>hr_<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;
}?>" <?php if (empty($_smarty_tpl->tpl_vars['row']->value->email)) {?> value="0" <?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value->lastname;?>
 (<?php echo $_smarty_tpl->tpl_vars['row']->value->email;?>
)=><?php echo $_smarty_tpl->tpl_vars['row']->value->userid;?>
" <?php }?>>
                                            <?php echo $_smarty_tpl->tpl_vars['row']->value->resource_name;?>

                                            <?php }?>
                                        <?php }?>
                                    </label>
                                </span>
                                        </div>
                                    </li>

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

                    </ul>
                    <input type="hidden" name="human" id="human" value="physical2323">
                </div>
                <div class="modal-footer">
                    <div id="checking-availability-human" class="pull-left"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CheckingAvailability'),$_smarty_tpl);?>
 <i
                                class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>
                    
                    
                    
                    
                    <button class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                    <button type="button" class="btn btn-primary btnConfirmAddResourcesHuman">Done</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dialogAddAccessories" tabindex="-1" role="dialog" aria-labelledby="accessoryModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="accessoryModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddAccessories'),$_smarty_tpl);?>
</h4>
                </div>
                <div class="modal-body scrollable-modal-content">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Accessory'),$_smarty_tpl);?>
</th>
                            <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'QuantityRequested'),$_smarty_tpl);?>
</th>
                            <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'QuantityAvailable'),$_smarty_tpl);?>
</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AvailableAccessories']->value, 'accessory');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['accessory']->value) {
?>
                            <tr accessory-id="<?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetId();?>
">
                                <td><?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetName();?>
</td>
                                <td>
                                    <input type="hidden" class="name" value="<?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetName();?>
"/>
                                    <input type="hidden" class="id" value="<?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetId();?>
"/>
                                    <input type="hidden" class="resource-ids"
                                           value="<?php echo implode(',',$_smarty_tpl->tpl_vars['accessory']->value->ResourceIds());?>
"/>
                                    <label for="accessory<?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetId();?>
"
                                           class="no-show"><?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetName();?>
</label>
                                    <?php if ($_smarty_tpl->tpl_vars['accessory']->value->GetQuantityAvailable() == 1) {?>
                                        <input type="checkbox"
                                               name="accessory<?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetId();?>
"
                                               id="accessory<?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetId();?>
"
                                               value="1"
                                               size="3"/>
                                    <?php } else { ?>
                                        <input type="number" min="0" max="999"
                                               class="form-control input-sm accessory-quantity"
                                               name="accessory<?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetId();?>
"
                                               id="accessory<?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetId();?>
"
                                               value="0" size="3"/>
                                    <?php }?>
                                </td>
                                <td accessory-quantity-id="<?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetId();?>
"
                                    accessory-quantity-available="<?php echo $_smarty_tpl->tpl_vars['accessory']->value->GetQuantityAvailable();?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['accessory']->value->GetQuantityAvailable())===null||$tmp==='' ? '&infin;' : $tmp);?>
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
                <div class="modal-footer">
                    <button id="btnCancelAddAccessories" type="button" class="btn btn-default"
                            data-dismiss="modal"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Cancel'),$_smarty_tpl);?>
</button>
                    <button id="btnConfirmAddAccessories" type="button"
                            class="btn btn-primary"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Done'),$_smarty_tpl);?>
</button>
                </div>
            </div>
        </div>
    </div>

    <div id="wait-box" class="wait-box">
        <div id="creatingNotification">
            <h3 id="createUpdateMessage" class="no-show">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8580991925f3e5601467ec9_41768657', "ajaxMessage");
?>

            </h3>
            <h3 id="checkingInMessage" class="no-show">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CheckingIn'),$_smarty_tpl);?>

            </h3>
            <h3 id="checkingOutMessage" class="no-show">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CheckingOut'),$_smarty_tpl);?>

            </h3>
            <h3 id="joiningWaitingList" class="no-show">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddingToWaitlist'),$_smarty_tpl);?>

            </h3>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"reservation_submitting.gif"),$_smarty_tpl);?>

        </div>
        <div id="result"></div>
    </div>

    <div id="user-availability-box">

    </div>

</div>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3247549245f3e560146a171_44457591', 'extras');
?>


<?php $_smarty_tpl->_subTemplateRender("file:javascript-includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Qtip'=>true,'Owl'=>true), 0, false);
?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"BeginDate",'AltId'=>"formattedBeginDate",'DefaultDate'=>$_smarty_tpl->tpl_vars['StartDate']->value,'MinDate'=>$_smarty_tpl->tpl_vars['AvailabilityStart']->value,'MaxDate'=>$_smarty_tpl->tpl_vars['AvailabilityEnd']->value,'FirstDay'=>$_smarty_tpl->tpl_vars['FirstWeekday']->value),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"EndDate",'AltId'=>"formattedEndDate",'DefaultDate'=>$_smarty_tpl->tpl_vars['EndDate']->value,'MinDate'=>$_smarty_tpl->tpl_vars['AvailabilityStart']->value,'MaxDate'=>$_smarty_tpl->tpl_vars['AvailabilityEnd']->value,'FirstDay'=>$_smarty_tpl->tpl_vars['FirstWeekday']->value),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"EndRepeat",'AltId'=>"formattedEndRepeat",'DefaultDate'=>$_smarty_tpl->tpl_vars['RepeatTerminationDate']->value,'MinDate'=>$_smarty_tpl->tpl_vars['AvailabilityStart']->value,'MaxDate'=>$_smarty_tpl->tpl_vars['AvailabilityEnd']->value,'FirstDay'=>$_smarty_tpl->tpl_vars['FirstWeekday']->value),$_smarty_tpl);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery.autogrow.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/moment.min.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"resourcePopup.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"userPopup.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"date-helper.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"recurrence.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reservation.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"autocomplete.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"force-numeric.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reservation-reminder.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/tree.jquery.js"),$_smarty_tpl);?>


<?php echo '<script'; ?>
 type="text/javascript">

    $(function () {
    	$('#BeginPeriod').on('change', function() {
    	    //alert( $(this).find(":selected").val() );
    	    //test();
    	});

    	function test()
    	{
    		//alert($('#EndPeriod option:selected').val());
    	}
		
    	$('#users').on('change', function() {
    		var items = this.value.split('=');
    		
    		$('input[id=userId]').val(items[1]);
    		
    		$("#userName").text(items[0]);
    		$("#userName").attr("data-userid",items[1]);
    	});

        var scopeOptions = {
            instance: '<?php echo SeriesUpdateScope::ThisInstance;?>
',
            full: '<?php echo SeriesUpdateScope::FullSeries;?>
',
            future: '<?php echo SeriesUpdateScope::FutureInstances;?>
'
        };

        var reservationOpts = {
            additionalResourceElementId: '<?php echo FormKeys::ADDITIONAL_RESOURCES;?>
',
            accessoryListInputId: '<?php echo FormKeys::ACCESSORY_LIST;?>
[]',
            returnUrl: '<?php echo $_smarty_tpl->tpl_vars['ReturnUrl']->value;?>
',
            scopeOpts: scopeOptions,
            createUrl: 'ajax/reservation_save.php',
            updateUrl: 'ajax/reservation_update.php',
            deleteUrl: 'ajax/reservation_delete.php',
            checkinUrl: 'ajax/reservation_checkin.php?action=<?php echo ReservationAction::Checkin;?>
',
            checkoutUrl: 'ajax/reservation_checkin.php?action=<?php echo ReservationAction::Checkout;?>
',
            waitlistUrl: 'ajax/reservation_waitlist.php',
            userAutocompleteUrl: "ajax/autocomplete.php?type=<?php echo AutoCompleteType::User;?>
",
            groupAutocompleteUrl: "ajax/autocomplete.php?type=<?php echo AutoCompleteType::Group;?>
",
            changeUserAutocompleteUrl: "ajax/autocomplete.php?type=<?php echo AutoCompleteType::MyUsers;?>
",
            maxConcurrentUploads: '<?php echo $_smarty_tpl->tpl_vars['MaxUploadCount']->value;?>
',
            guestLabel: '(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Guest'),$_smarty_tpl);?>
)',
            accessoriesUrl: 'ajax/available_accessories.php?<?php echo QueryStringKeys::START_DATE;?>
=[sd]&<?php echo QueryStringKeys::END_DATE;?>
=[ed]&<?php echo QueryStringKeys::START_TIME;?>
=[st]&<?php echo QueryStringKeys::END_TIME;?>
=[et]&<?php echo QueryStringKeys::REFERENCE_NUMBER;?>
=[rn]',
            resourcesUrl: 'ajax/unavailable_resources.php?<?php echo QueryStringKeys::START_DATE;?>
=[sd]&<?php echo QueryStringKeys::END_DATE;?>
=[ed]&<?php echo QueryStringKeys::START_TIME;?>
=[st]&<?php echo QueryStringKeys::END_TIME;?>
=[et]&<?php echo QueryStringKeys::REFERENCE_NUMBER;?>
=12[rn]&hr=0',
            resourcesUrlhr: 'ajax/unavailable_resources.php?<?php echo QueryStringKeys::START_DATE;?>
=[sd]&<?php echo QueryStringKeys::END_DATE;?>
=[ed]&<?php echo QueryStringKeys::START_TIME;?>
=[st]&<?php echo QueryStringKeys::END_TIME;?>
=[et]&<?php echo QueryStringKeys::REFERENCE_NUMBER;?>
=12[rn]&hr=1',
            resourcesUrlhr3: 'ajax/unavailable_resources.php?<?php echo QueryStringKeys::START_DATE;?>
=[sd]&<?php echo QueryStringKeys::END_DATE;?>
=[ed]&<?php echo QueryStringKeys::START_TIME;?>
=[st]&<?php echo QueryStringKeys::END_TIME;?>
=[et]&<?php echo QueryStringKeys::REFERENCE_NUMBER;?>
=12[rn]&hr=3',
            creditsUrl: 'ajax/reservation_credits.php',
            creditsEnabled: '<?php echo $_smarty_tpl->tpl_vars['CreditsEnabled']->value;?>
',
            emailUrl: 'ajax/reservation_email.php?<?php echo QueryStringKeys::REFERENCE_NUMBER;?>
=<?php echo $_smarty_tpl->tpl_vars['ReferenceNumber']->value;?>
',
            availabilityUrl: 'ajax/availability.php?<?php echo QueryStringKeys::SCHEDULE_ID;?>
=<?php echo $_smarty_tpl->tpl_vars['ScheduleId']->value;?>
'
        };

        var reminderOpts = {
            reminderTimeStart: '<?php echo $_smarty_tpl->tpl_vars['ReminderTimeStart']->value;?>
',
            reminderTimeEnd: '<?php echo $_smarty_tpl->tpl_vars['ReminderTimeEnd']->value;?>
',
            reminderIntervalStart: '<?php echo $_smarty_tpl->tpl_vars['ReminderIntervalStart']->value;?>
',
            reminderIntervalEnd: '<?php echo $_smarty_tpl->tpl_vars['ReminderIntervalEnd']->value;?>
'
        };

        var reservation = new Reservation(reservationOpts);
        reservation.init('<?php echo $_smarty_tpl->tpl_vars['UserId']->value;?>
', '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['StartDate']->value,'key'=>'system_datetime','timezone'=>$_smarty_tpl->tpl_vars['Timezone']->value),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['EndDate']->value,'key'=>'system_datetime','timezone'=>$_smarty_tpl->tpl_vars['Timezone']->value),$_smarty_tpl);?>
');

        var reminders = new Reminder(reminderOpts);
        reminders.init();

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Participants']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
        reservation.addParticipant("<?php echo strtr($_smarty_tpl->tpl_vars['user']->value->FullName, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
", "<?php echo strtr($_smarty_tpl->tpl_vars['user']->value->UserId, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
");
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Invitees']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
        reservation.addInvitee("<?php echo strtr($_smarty_tpl->tpl_vars['user']->value->FullName, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
", '<?php echo $_smarty_tpl->tpl_vars['user']->value->UserId;?>
');
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ParticipatingGuests']->value, 'guest');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['guest']->value) {
?>
        reservation.addParticipatingGuest('<?php echo $_smarty_tpl->tpl_vars['guest']->value;?>
');
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['InvitedGuests']->value, 'guest');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['guest']->value) {
?>
        reservation.addInvitedGuest('<?php echo $_smarty_tpl->tpl_vars['guest']->value;?>
');
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Accessories']->value, 'accessory');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['accessory']->value) {
?>
        reservation.addAccessory(<?php echo $_smarty_tpl->tpl_vars['accessory']->value->AccessoryId;?>
, <?php echo $_smarty_tpl->tpl_vars['accessory']->value->QuantityReserved;?>
, "<?php echo strtr($_smarty_tpl->tpl_vars['accessory']->value->Name, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
");
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        reservation.addResourceGroups(<?php echo $_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value;?>
);

        var recurOpts = {
            repeatType: '<?php echo $_smarty_tpl->tpl_vars['RepeatType']->value;?>
',
            repeatInterval: '<?php echo $_smarty_tpl->tpl_vars['RepeatInterval']->value;?>
',
            repeatMonthlyType: '<?php echo $_smarty_tpl->tpl_vars['RepeatMonthlyType']->value;?>
',
            repeatWeekdays: [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RepeatWeekdays']->value, 'day');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
echo $_smarty_tpl->tpl_vars['day']->value;?>
, <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
],
            autoSetTerminationDate: $('#referenceNumber').val() != ''
        };

        var recurrence = new Recurrence(recurOpts);
        recurrence.init();

        recurrence.onChange(reservation.repeatOptionsChanged);

        var ajaxOptions = {
            target: '#result', // target element(s) to be updated with server response
            beforeSubmit: reservation.preSubmit, // pre-submit callback
            success: reservation.showResponse,  // post-submit callback
            async: true
        };

        $('#form-reservation').submit(function () {
            $(this).ajaxSubmit(ajaxOptions);
            return false;
        });

        $('#description').autogrow();
        $('#userName').bindUserDetails();

        $.blockUI.defaults.css.width = '60%';
        $.blockUI.defaults.css.left = '20%';

        var resources = $('#reservation-resources');
        resources.tooltip({
            selector: '[data-tooltip]', title: function () {
                var tooltipType = $(this).data('tooltip');
                if (tooltipType === 'approval') {
                    return "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RequiresApproval'),$_smarty_tpl);?>
";
                }
                if (tooltipType === 'checkin') {
                    return "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RequiresCheckInNotification'),$_smarty_tpl);?>
";
                }
                if (tooltipType === 'autorelease') {
                    var text = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AutoReleaseNotification','args'=>'%s'),$_smarty_tpl);?>
";
                    return text.replace('%s', $(this).data('autorelease'));
                }
            }
        });
    });

    $('.modal').on('shown.bs.modal', function () {
        $(this).find('[autofocus]').focus();
    });
    
    function checkStartTime() {
        
        var bp = document.getElementById("BeginPeriod").value;
        var start = document.getElementById("as").value;
  	    var ep = document.getElementById("EndPeriod").value;
  	    
	    start = start.split(":");
	    bp = bp.split(":");
	    ep = ep.split(":");
	    
	    var actualStart = new Date(0, 0, 0, start[0], start[1], 0);
	    var beginPeriod = new Date(0, 0, 0, bp[0], bp[1], 0);
	    
	    var endPeriod = new Date(0, 0, 0, ep[0], ep[1], 0);
	    
	     
	    if(actualStart.getTime() < beginPeriod.getTime()){
	         document.getElementById("as").value = "";
	    }  
 	    
	    if(actualStart.getTime() > endPeriod.getTime()) {
             document.getElementById("as").value = "";
	    }
    }
    function checkTimeDuration() {
        
        var bp = document.getElementById("BeginPeriod").value;
        var ep = document.getElementById("EndPeriod").value;
        
        var start = document.getElementById("as").value;
	    var end = document.getElementById("ae").value;
  	    
	    start = start.split(":");
	    end = end.split(":");
	    
	    bp = bp.split(":");
	    ep = ep.split(":");
	    
	    var actualStart = new Date(0, 0, 0, start[0], start[1], 0);
	    var actualEnd = new Date(0, 0, 0, end[0], end[1], 0);
	    
	    var beginPeriod = new Date(0, 0, 0, bp[0], bp[1], 0);
	    var endPeriod = new Date(0, 0, 0, ep[0], ep[1], 0);
	    
	    var diff = actualEnd.getTime() - actualStart.getTime();
	    var hours = Math.floor(diff / 1000 / 60 / 60);
	    
	    var diff2 = actualStart.getTime() - beginPeriod.getTime();
	    var hours2 = Math.floor(diff2 / 1000 / 60 / 60);
	    
	    diff -= hours * 1000 * 60 * 60;
	    diff2 -= hours2 * 1000 * 60 * 60;

	    var minutes = Math.floor(diff / 1000 / 60);
   		var minutes2 = Math.floor(diff2 / 1000 / 60);
   
        if(actualEnd.getTime() <= actualStart.getTime()){
	         document.getElementById("ae").value = "";
	    }
	    
	    if(actualEnd.getTime() > endPeriod.getTime()){
	         document.getElementById("ae").value = "";
	    } 
	    
	    if(document.getElementById("ae").value == "") {
	         document.getElementById("diff").value = ""; 
	    }
	    else {
	         document.getElementById("diff").innerHTML = "0 days " + (hours < 9 ? "0" : "") + hours + " Hours " + (minutes < 9 ? "0" : "") + minutes +" minutes";
	    }
   }
   
   var myFunc = function() {
        
        var start = document.getElementById("as").value;
	    var end = document.getElementById("ae").value;
        var stat = document.getElementById("status").value;
        var check = document.getElementById("status").checked;
        var beginDate = document.getElementById("BeginDate").value;
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var bp = document.getElementById("BeginPeriod").value;
        
		today = mm + '/' + dd + '/' + yyyy;
        
        
        document.getElementById("as").style.visibility = "initial";
	    document.getElementById("ae").style.visibility = "initial";
	    document.getElementById("diff").style.visibility = "initial";
	    document.getElementById("lblAs").style.visibility = "initial";
	    document.getElementById("lblAe").style.visibility = "initial";
	    document.getElementById("lblDuration").style.visibility = "initial";
        document.getElementById("notes").style.visibility = "initial";
        
	      
	    start = start.split(":");
	    end = end.split(":");
	    bp = bp.split(":");
	    
	    
	    var actualStart = new Date(0, 0, 0, start[0], start[1], 0);
	    var actualEnd = new Date(0, 0, 0, end[0], end[1], 0);
	    var beginPeriod = new Date(0, 0, 0, bp[0], bp[1], 0);
	    
	    
	    var diff = actualEnd.getTime() - actualStart.getTime();
	    var hours = Math.floor(diff / 1000 / 60 / 60);
	    
	    diff -= hours * 1000 * 60 * 60;
	    var minutes = Math.floor(diff / 1000 / 60);
	    
	    if(start == "" && end == "") {
	          hours = "";
	          minutes = "";
	    }
        
        document.getElementById("diff").innerHTML = "0 days " + (hours < 9 ? "0" : "") + hours + " Hours " + (minutes < 9 ? "0" : "") + minutes +" minutes";
        
        if(today != beginDate){
        
         document.getElementById("as").disabled = "true";
	     document.getElementById("ae").disabled = "true";
	     document.getElementById("diff").disabled = "true";
	     document.getElementById("lblAs").disabled = "true";
	     document.getElementById("lblAe").disabled = "true";
	     document.getElementById("lblDuration").disabled = "true";
         document.getElementById("notes").disabled = "true";
        
        }     
      
        if(stat == 1 && check){
      
         document.getElementById("as").disabled = "true";
	     document.getElementById("ae").disabled = "true";
	     document.getElementById("diff").disabled = "true";
	     document.getElementById("lblAs").disabled = "true";
	     document.getElementById("lblAe").disabled = "true";
	     document.getElementById("lblDuration").disabled = "true";
         document.getElementById("notes").disabled = "true";
      
        }
      
   } ();
    
    
   var myFunc2 = function() {
        
        var x = document.querySelector('#btnCreate').textContent;
        if(x != '') {
	        document.getElementById("as").disabled = "true";
	        document.getElementById("ae").disabled = "true";
	        document.getElementById("diff").disabled = "true";
	        document.getElementById("lblAs").disabled = "true";
	        document.getElementById("lblAe").disabled = "true";
	        document.getElementById("lblDuration").disabled = "true";
            document.getElementById("notes").disabled = "true";
        
        }  
         
   }();
   
   $('document').ready(function()
{
$('textarea').each(function(){
$(this).val($(this).val().trim());
}
);
});
       
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $.validate({
        lang: 'en'
    });
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
/* {block "header"} */
class Block_10195096665f3e56013b4273_68026188 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Qtip'=>true,'Owl'=>true,'printCssFiles'=>'css/reservation.print.css'), 0, false);
?>

<?php
}
}
/* {/block "header"} */
/* smarty_template_function_displayResource_10879576635f3e5601389403_32815504 */
if (!function_exists('smarty_template_function_displayResource_10879576635f3e5601389403_32815504')) {
function smarty_template_function_displayResource_10879576635f3e5601389403_32815504($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <div class="resourceName" id="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetId();?>
" style="background-color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetColor();?>
;color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
">
        <span class="resourceDetails" data-resourceId="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetId();?>
"><?php echo $_smarty_tpl->tpl_vars['resource']->value->Name;?>
</span>
        <?php if ($_smarty_tpl->tpl_vars['resource']->value->GetRequiresApproval()) {?><span class="fa fa-lock" data-tooltip="approval"></span><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['resource']->value->IsCheckInEnabled()) {?><i class="fa fa-sign-in" data-tooltip="checkin"></i><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['resource']->value->IsAutoReleased()) {?><i class="fa fa-clock-o" data-tooltip="autorelease"
                                           data-autorelease="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetAutoReleaseMinutes();?>
"></i><?php }?>
    </div>
<?php
}}
/*/ smarty_template_function_displayResource_10879576635f3e5601389403_32815504 */
/* {block 'reservationHeader'} */
class Block_12179531385f3e56013c50f7_98496626 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"CreateReservationHeading"),$_smarty_tpl);
}
}
/* {/block 'reservationHeader'} */
/* {block "submitButtons"} */
class Block_20566797255f3e56013ca082_22367758 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                            <button type="button" class="btn btn-success save create" id="btnCreate">
                                <span class="glyphicon glyphicon-ok-circle"></span>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Create'),$_smarty_tpl);?>

                            </button>
                        <?php
}
}
/* {/block "submitButtons"} */
/* {block "submitButtons"} */
class Block_1066640335f3e560141a9b8_99761358 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                            <button type="button" <?php if ($_smarty_tpl->tpl_vars['resource']->value['email'] == $_smarty_tpl->tpl_vars['email']->value) {?> disabled <?php }?> class="btn btn-success save create">
                                <span class="glyphicon glyphicon-ok-circle"></span>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Create'),$_smarty_tpl);?>

                            </button>
                        <?php
}
}
/* {/block "submitButtons"} */
/* {block 'attachments'} */
class Block_14496868185f3e560141c4c4_79409619 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php
}
}
/* {/block 'attachments'} */
/* {block "ajaxMessage"} */
class Block_8580991925f3e5601467ec9_41768657 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CreatingReservation'),$_smarty_tpl);?>

                <?php
}
}
/* {/block "ajaxMessage"} */
/* {block 'extras'} */
class Block_3247549245f3e560146a171_44457591 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'extras'} */
}
