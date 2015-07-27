<thead>
    <tr>
        <th><?php echo lang('NO'); ?></th>
        <th><?php echo lang('NUMBER'); ?></th>
        <th><?php echo lang('OPTIONS'); ?></th>
    </tr>
</thead>
<tbody>
    <?php $no = 1; ?>
    <?php foreach ($trucks as $truck): ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $truck['numero']; ?></td>
            <td></td>
        </tr>
    <?php endforeach; ?>
</tbody>