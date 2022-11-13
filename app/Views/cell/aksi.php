<td class="align-middle">
    <div class="btn-group" role="group" aria-label="Basic example">
        <?php if (isset($detail)) : ?>
            <a href="/<?= $url; ?>/detail/<?= $id ?>" class="btn btn-sm btn-info"><i class="bi bi-card-text"></i></a>
        <?php endif;  ?>

        <a href="/<?= $url; ?>/edit/<?= $id ?>" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
        <button onclick="confirmDelete('/<?= $url; ?>/delete/<?= $id; ?>')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
    </div>
</td>