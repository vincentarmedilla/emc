<?php
/* Smarty version 3.1.30, created on 2020-10-02 06:15:38
  from "C:\xampp6\htdocs\emcscheduler\tpl\Admin\Resources\manage_resources_public.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f76a96a6b6e26_13381214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5596bbd078033b2765e17164b870e2053e6fb97b' => 
    array (
      0 => 'C:\\xampp6\\htdocs\\emcscheduler\\tpl\\Admin\\Resources\\manage_resources_public.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f76a96a6b6e26_13381214 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['resource']->value->GetIsCalendarSubscriptionAllowed()) {?>
    <div><a class="update disableSubscription subscriptionButton"
            href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'TurnOffSubscription'),$_smarty_tpl);?>
</a>
    </div>
    <div>
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"feed.png"),$_smarty_tpl);?>

        <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetSubscriptionUrl()->GetAtomUrl();?>
">Atom</a>
        |
        <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetSubscriptionUrl()->GetWebcalUrl();?>
">iCalendar</a>
    </div>
    <div>
        <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PublicId'),$_smarty_tpl);?>
</span>
        <span class="propertyValue"><?php echo $_smarty_tpl->tpl_vars['resource']->value->GetPublicId();?>
</span>
    </div>
<?php } else { ?>
    <div>
        <a class="update enableSubscription subscriptionButton"
           href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'TurnOnSubscription'),$_smarty_tpl);?>
</a>
    </div>
<?php }
}
}
