<?php
$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
$presenter->setLastPage(Input::get('page', 0) + 6);
?>

<?php if ($paginator->getLastPage() > 1): ?>
    <ul class="pagination">
        <?php echo $presenter->render(); ?>
    </ul>
<?php endif; ?>
