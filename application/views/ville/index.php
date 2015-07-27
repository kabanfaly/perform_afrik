<thead>
    <tr>
        <th class="number"><?php echo lang('NO'); ?></th>
        <th><?php echo lang('CITY'); ?></th>
        <th><?php echo lang('OPTIONS'); ?></th>
    </tr>
</thead>
<tbody>
    <?php $no = 1; ?>
    <?php foreach ($cities as $city): ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $city['nom']; ?></td>
            <td></td>
        </tr>
    <?php endforeach; ?>
</tbody>