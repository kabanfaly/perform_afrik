<?php
if (isset($_SESSION['user']))
{
    ?>
    </table>
    </div>
    <!-- /.content clearfix-->
    </div>
<?php } ?>
<!-- ./row -->
</div>
<!-- /.container-fluid-->
</div>
<!-- /#page-wrapper -->
</div>
<?php
    if (isset($_SESSION['user']))
    {
    ?>
    <footer>
        <div id="footer" class="panel-footer">
            <div class="row">
                <div class="col-lg-12">
                    <h5><?php echo lang('CONTACT_NAME'); ?></h5>
                    <small>
                        <p>
                            <i class="glyphicon glyphicon-home"></i>
                            <?php echo lang('CONTACT_ADDRESS'); ?> 
                            <br>
                            <i class="glyphicon glyphicon-envelope"></i>
                            <?php echo lang('CONTACT_EMAIL'); ?> 
                            <br>
                            <i class="glyphicon glyphicon-phone"></i>
                            <?php echo lang('CONTACT_TEL'); ?> 

                        </p> 
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        <small><?php echo lang('COPYRIGHT'); ?> </small>
                    </p>
                </div>
            </div>
        </div>
    </footer>
<?php } ?>
<!-- /#wrapper -->
</div>
<?php
$url = base_url();
echo <<<EOF
            <script type="text/javascript">
                var baseUrl = "{$url}";
            </script>
EOF;
?>
</body>
<script type="text/javascript" data-main="<?php echo base_url(); ?>js/main?<?php echo time(); ?>" src="<?php echo base_url(); ?>assets/requirejs/require.js"></script>
</html>
