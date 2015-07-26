<div class="content">
    <div class="title"><?php echo $title; ?></div>
    <table id="tableContent" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><?php echo lang('NO'); ?></th>
                <th><?php echo lang('CITY'); ?></th>
                <th><?php echo lang('OPTIONS'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            <?php foreach ($cities as $city): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $city['nom']; ?></td>
                <td></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>