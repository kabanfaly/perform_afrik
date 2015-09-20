<?php
if (isset($_SESSION['admin']))
{
    ?>
    </table>
    </div>
    </div>
<?php } ?>
</div>
</div>
<footer>
    <div id="footer" class="panel-footer">
        <div class="row">
            <div class="col-lg-10 col-md-10">
                <h4><?php echo lang('CONTACT_NAME'); ?></h4>
                <small>
                    <br><br>
                    <p>
                        <i class="glyphicon glyphicon-home"></i>
                        <?php echo lang('CONTACT_ADDRESS'); ?> 
                        <br>
                    </p> 
                    <p>
                        <i class="glyphicon glyphicon-envelope"></i>
                        <?php echo lang('CONTACT_EMAIL'); ?> 
                        <br>
                    </p> 
                    <p>
                        <i class="glyphicon glyphicon-phone"></i>
                        <?php echo lang('CONTACT_TEL'); ?> 
                        <br>
                    </p> 
                </small>
            </div>
            <div class="col-lg-2 col-md-2 pull-right">

            </div>
        </div>
        <div class="row">
            <center><small>&copy; Perform Afrik 2015</small></center>
        </div>
    </div>
</footer>
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
