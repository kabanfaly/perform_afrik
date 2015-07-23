</div>
</div>
</div>
<footer id="footer">
    <center><small>&copy; Perform Afrik</small></center>
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
