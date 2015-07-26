<div class="content">
    <div class="title"><?php echo $title; ?></div>
    <table id="tableContent" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><?php echo lang('NO'); ?></th>
                <th><?php echo lang('NUMBER'); ?></th>
                <th><?php echo lang('OPTIONS'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            <?php foreach ($trucks as $truck): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $truck['numero']; ?></td>
                <td></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>