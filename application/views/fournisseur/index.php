<thead>
    <tr>
        <th><?php echo lang('NO'); ?></th>
        <th><?php echo lang('SUPPLIER'); ?></th>
        <th><?php echo lang('PHONE'); ?></th>
        <th><?php echo lang('ADDRESS'); ?></th>
        <th><?php echo lang('OPTIONS'); ?></th>
    </tr>
</thead>
<tbody>
    <?php $no = 1; ?>
    <?php foreach ($suppliers as $supplier): ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $supplier['nom']; ?></td>
            <td><?php echo $supplier['telephone']; ?></td>
            <td><?php echo $supplier['adresse']; ?></td>
            <td></td>
        </tr>
    <?php endforeach; ?>
</tbody>