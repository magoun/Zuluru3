<?php
use Cake\Core\Configure;

$this->Html->addCrumb(__('Settings'));
$this->Html->addCrumb(__('Registration'));
?>

<div class="settings form">
<?php
echo $this->Form->create(false, ['align' => 'horizontal']);

echo $this->element('Settings/banner');
?>
	<fieldset>
		<legend><?= __('Registration Configuration') ?></legend>
<?php
if (!$affiliate) {
	echo $this->element('Settings/input', [
		'category' => 'registration',
		'name' => 'order_id_format',
		'options' => [
			'label' => __('Order ID format string'),
			'help' => __('sprintf format string for the unique order ID.'),
		],
	]);
}

echo $this->element('Settings/input', [
	'category' => 'registration',
	'name' => 'allow_tentative',
	'options' => [
		'label' => __('Allow tentative members to register?'),
		'type' => 'radio',
		'options' => Configure::read('options.enable'),
		'help' => __('Tentative members include those whose accounts have not yet been approved but don\'t appear to be duplicates of existing accounts, and those who have registered for membership and called to arrange an offline payment which has not yet been received.'),
	],
]);
echo $this->element('Settings/input', [
	'category' => 'registration',
	'name' => 'register_now',
	'options' => [
		'label' => __('Include "register now" link?'),
		'type' => 'radio',
		'options' => Configure::read('options.enable'),
		'help' => __('By enabling this, you will allow users to register for events directly from the wizard or event list, without going through the "view details" page. If you have various similar events, you should disable this so that people must see the description instead of just the name, decreasing confusion and incorrect registrations.'),
	],
]);

if (!$affiliate) {
	echo $this->element('Settings/input', [
		'category' => 'registration',
		'name' => 'online_payments',
		'options' => [
			'label' => __('Online payments'),
			'type' => 'radio',
			'options' => Configure::read('options.enable'),
			'help' => __('Do we handle online payments?'),
		],
	]);
}

echo $this->element('Settings/input', [
	'category' => 'registration',
	'name' => 'refund_policy_text',
	'options' => [
		'label' => __('Text of refund policy'),
		'type' => 'textarea',
		'help' => __('Customize the text of your refund policy, to be shown on registration pages and invoices.'),
		'class' => 'wysiwyg_simple',
	],
]);
echo $this->element('Settings/input', [
	'category' => 'payment',
	'name' => 'offline_options',
	'options' => [
		'label' => __('Offline options'),
		'type' => 'text',
		'help' => __('List the offline payment options you offer, or provide generic text. This will go in the sentence "If you prefer to pay offline (via ____), the ...". If you leave this blank but provide directions below, this default wording will be skipped entirely and only your directions will be provided.'),
	],
]);
echo $this->element('Settings/input', [
	'category' => 'registration',
	'name' => 'offline_payment_text',
	'options' => [
		'label' => __('Text of offline payment directions'),
		'type' => 'textarea',
		'help' => __('Customize the text of your offline payment policy. If this is blank, offline payment options will not be offered.'),
		'class' => 'wysiwyg_simple',
	],
]);
?>
	</fieldset>
	<fieldset>
		<legend><?= __('Waiting List') ?></legend>
<?php
echo $this->element('Settings/input', [
	'category' => 'feature',
	'name' => 'waiting_list',
	'options' => [
		'label' => __('Allow people to put themselves on a waiting list when events fill up?'),
		'type' => 'radio',
		'options' => Configure::read('options.enable'),
	],
]);

echo $this->element('Settings/input', [
	'category' => 'registration',
	'name' => 'delete_unpaid',
	'options' => [
		'label' => __('Delete unpaid'),
		'type' => 'radio',
		'options' => Configure::read('options.enable'),
		'help' => __('If this is enabled, any registrations which are still unpaid when the final spot is taken will be deleted; the argument for this is that, if someone hasn\'t paid yet, they have probably changed their mind, and leaving them at the front of the waiting list will only delay acceptance of others who are interested. If this is disabled, unpaid registrations will be moved to the front of the waiting list; the argument for this is that they did register first, so sending them to the back of the line may not be fair. Either way, you may want to publish a policy clearly stating your choice and reasons.'),
	],
]);

echo $this->element('Settings/input', [
	'category' => 'registration',
	'name' => 'reservation_time',
	'options' => [
		'label' => __('Reservation time'),
		'help' => __('When a spot opens up, the next person on the waiting list is moved to "Reserved" status and notified via email. This setting determines how long (in hours) we will give them to pay before dropping them and moving to the next person. Keep in mind that emails may be sent at any time, so this should be set no lower than 12, and preferably 24 or higher. If a negative response is received at any time in this window, the process will continue immediately; this is a "worst-case" setting. A value of 0 will disable this and require manual expiry of reservations by an admin.'),
		'size' => 6,
	],
]);

echo $this->Form->button(__('Submit'), ['class' => 'btn-success']);
echo $this->Form->end();
?>
</div>
