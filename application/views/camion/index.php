<thead>
    <tr>
        <th class="number"><?php echo lang('NO'); ?></th>
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
<div id="form-content" class="modal hide fade in" style="display: none;">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Send me a message</h3>
    </div>
    <div class="modal-body">
        <form class="contact" name="contact">
            <label class="label" for="name">Your Name</label><br>
            <input type="text" name="name" class="input-xlarge"><br>
            <label class="label" for="email">Your E-mail</label><br>
            <input type="email" name="email" class="input-xlarge"><br>
            <label class="label" for="message">Enter a Message</label><br>
            <textarea name="message" class="input-xlarge"></textarea>
        </form>
    </div>
    <div class="modal-footer">
        <input class="btn btn-success" type="submit" value="Send!" id="submit">
        <a href="#" class="btn" data-dismiss="modal">Nah.</a>
    </div>
</div>

