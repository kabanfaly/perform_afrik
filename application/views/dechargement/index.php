<?php
$authorized_columns = array();

if (!empty($_SESSION['user']['authorized_columns']))
{
    $authorized_columns = json_decode($_SESSION['user']['authorized_columns'], true);
}
?>
<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <?php if (isset($authorized_columns['date']) && $authorized_columns['date']) : ?>
                <th><?php echo lang('DATE'); ?></th>
            <?php endif ?>
                
            <?php if (isset($authorized_columns['id_magasin']) && $authorized_columns['id_magasin']) : ?>
                <th><?php echo lang('SHOP'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['id_fournisseur']) && $authorized_columns['id_fournisseur']) : ?>
                <th><?php echo lang('SUPPLIER'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['id_ville']) && $authorized_columns['id_ville']) : ?>
                <th><?php echo lang('CITY_FROM'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['id_camion']) && $authorized_columns['id_camion']) : ?>
                <th><?php echo lang('TRUCK'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['bon_sac']) && $authorized_columns['bon_sac']) : ?>
                <th><?php echo lang('GOOD_BAGS'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['sac_dechire']) && $authorized_columns['sac_dechire']) : ?>
                <th><?php echo lang('TORN_BAGS'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['sac_total']) && $authorized_columns['sac_total']) : ?>
                <th><?php echo lang('TOTAL_BAGS'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['poids_brut']) && $authorized_columns['poids_brut']) : ?>
                <th><?php echo lang('GROSS_WEIGHT'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['poids_net']) && $authorized_columns['poids_net']) : ?>
                <th><?php echo lang('NET_WEIGHT'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['poids_refracte']) && $authorized_columns['poids_refracte']) : ?>
                <th><?php echo lang('REFRACTED_WEIGHT'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['humidite']) && $authorized_columns['humidite']) : ?>
                <th><?php echo lang('HUMIDITY'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['qualite']) && $authorized_columns['qualite']) : ?>
                <th><?php echo lang('QUALITY'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['prix']) && $authorized_columns['prix']) : ?>
                <th><?php echo lang('PRICE'); ?></th>
            <?php endif ?>

            <?php if (isset($authorized_columns['total']) && $authorized_columns['total']) : ?>
                <th><?php echo lang('TOTAL'); ?></th>
            <?php endif ?>

            <th class="option"><?php echo lang('OPTIONS'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($unloadings as $unloading): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <?php if (isset($authorized_columns['date']) && $authorized_columns['date']) : ?>
                    <td><?php echo $unloading['date']; ?></td>
                <?php endif ?>
                <?php if (isset($authorized_columns['id_magasin']) && $authorized_columns['id_magasin']) : ?>
                    <td><?php echo $unloading['magasin']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['id_fournisseur']) && $authorized_columns['id_fournisseur']) : ?>
                    <td><?php echo $unloading['fournisseur']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['id_ville']) && $authorized_columns['id_ville']) : ?>
                    <td><?php echo $unloading['ville']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['id_camion']) && $authorized_columns['id_camion']) : ?>
                    <td><?php echo $unloading['camion']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['bon_sac']) && $authorized_columns['bon_sac']) : ?>
                    <td><?php echo $unloading['bon_sac']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['sac_dechire']) && $authorized_columns['sac_dechire']) : ?>
                    <td><?php echo $unloading['sac_dechire']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['sac_total']) && $authorized_columns['sac_total']) : ?>
                    <td><?php echo $unloading['sac_total']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['poids_brut']) && $authorized_columns['poids_brut']) : ?>
                    <td><?php echo $unloading['poids_brut']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['poids_net']) && $authorized_columns['poids_net']) : ?>
                    <td><?php echo $unloading['poids_net']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['poids_refracte']) && $authorized_columns['poids_refracte']) : ?>
                    <td><?php echo $unloading['poids_refracte']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['humidite']) && $authorized_columns['humidite']) : ?>
                    <td><?php echo $unloading['humidite']; ?> %</td>
                <?php endif ?>

                <?php if (isset($authorized_columns['qualite']) && $authorized_columns['qualite']) : ?>
                    <td><?php echo $unloading['qualite']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['prix']) && $authorized_columns['prix']) : ?>
                    <td><?php echo $unloading['prix']; ?></td>
                <?php endif ?>

                <?php if (isset($authorized_columns['total']) && $authorized_columns['total']) : ?>
                    <td><?php echo $unloading['total']; ?></td>
                <?php endif ?>

                <td align="center">
                    <a href="#" title="<?php echo lang('EDIT');  ?>" onclick="loadForm('<?php echo $form_link . '/' . $unloading['id_dechargement']; ?>')" data-toggle="modal" data-target="#form-content">
                        <span class="fa fa-fw fa-pencil"></span>
                    </a>
                    <a href="#" title="<?php echo lang('REMOVE');  ?>" onclick="if (confirmDeletion()) {
                                    doAjax('<?php echo site_url('dechargement/delete/' . $unloading['id_dechargement']); ?>', 'body');
                                }
                                ;">
                        <span class="fa fa-fw fa-remove"></span> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>