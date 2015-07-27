</table>
</div>
</div>
</div>
</div>
<footer id="footer" class="panel-footer">
    <div class="container-fluid" role="contentinfo">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <center><small>&copy; Perform Afrik</small></center>
            </div>
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
<script type="text/javascript" data-main="<?php echo base_url(); ?>js/main" src="<?php echo base_url(); ?>assets/requirejs/require.js"></script>
</body>
</html>
