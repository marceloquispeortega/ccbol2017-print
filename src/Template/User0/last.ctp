<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $user
  */

header('Refresh: 3; URL=' . $this->Url->build([
    'controller' => 'User',
    'action' => 'last'
]));
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="user index large-9 medium-8 columns content">
    <h3><?= __('User') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('document') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('print') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; foreach ($lastUsers as $user): $i++; ?>
            <tr>
                <td><?= $this->Number->format($i) ?></td>
                <td><?= h($user->document) ?></td>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->print) ?></td>
                <td><?= h($user->created) ?></td>
            </tr>
            <?php endforeach; ?>
            <?php //if ($lastUsers->count() == 10) { ?>
                <iframe src="<?php echo $this->Url->build(['controller' => 'User', 'action' => 'printLast']); ?>" width="100%" height="300"></iframe>
            <?php //} ?>
        </tbody>
    </table>
</div>
