<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


<?php $session = session() ?>

<?php if($session->getFlashdata('success') != null): ?>
<script type='text/javascript'>
toastr.success('<?= $session->getFlashdata('success') ?>');
</script>
<?php elseif($session->getFlashdata('error') != null): ?>
<script type='text/javascript'>
toastr.error('<?= $session->getFlashdata('error') ?>');
</script>
<?php elseif($session->getFlashdata('info') != null): ?>
<script type='text/javascript'>
toastr.info('<?= $session->getFlashdata('info') ?>');
</script>
<?php elseif($session->getFlashdata('warning') != null): ?>
<script type='text/javascript'>
toastr.warning('<?= $session->getFlashdata('warning') ?>');
</script>
<?php endif ?>

</body>

</html>