<?php if($contact->name) : ?>
	<div>
		<strong>Имя:</strong>
		<span><?php echo $contact->name; ?></span>
	</div>
<?php endif; ?>

<?php if($contact->phone) : ?>
	<div>
		<strong>Телефон:</strong>
		<span><?php echo $contact->phone; ?></span>
	</div>
<?php endif; ?>

<?php if($contact->email) : ?>
	<div>
		<strong>Email:</strong>
		<span><?php echo $contact->email; ?></span>
	</div>
<?php endif; ?>

<?php if($contact->message) : ?>
	<div>
		<strong>Сообщение:</strong>
		<span><?php echo $contact->message; ?></span>
	</div>
<?php endif; ?>
