<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('content'); ?>
<div id="content">
    <h1>Menus Cadastrados</h1>
    <h2>by Tatiana</h2>
</div>
     <div id="a_messages">
     
     </div>
<a href="/admin/menus/new" class="btn btn-link a_link"><span class="glyphicon glyphicon-plus icon"></span>Criar Menu</a>
<div id="a_category">
    
</div>
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>