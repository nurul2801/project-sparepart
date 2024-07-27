 
              <br><br>
               <br><br>
               <br><br>
             <center><form style="border-radius:50px 50px; border:1px solid black;">
            <br><br>
            
            <div class="output">
                <section class="output">
                    <h2>Print This Barcode</h2><br>
                    <?php
                        $finalRequest = '';
                        foreach (getImageKeys() as $key => $value) {
                            $finalRequest .= '&' . $key . '=' . urlencode($value);
                        }
                        if (strlen($finalRequest) > 0) {
                            $finalRequest[0] = '?';
                        }
                    ?>
                    <div id="imageOutput">
                        <?php if ($imageKeys['text'] !== '') { ?><img src="image.php<?php echo $finalRequest; ?>" alt="Barcode Image" /><?php }
                        else { ?>Fill the form to generate a barcode.<?php } ?>
                    </div>
                </section>
            </div>

        <button style="width:100px; height:40px; background:#0a0; color:white; border-radius:50px 50px;">Print Barcode</button>
<br><br>
        </form></center>


        <!-- <div class="footer">
            <footer>
            All Rights Reserved &copy; <?php date_default_timezone_set('UTC'); echo date('Y'); ?> <a href="http://www.barcodephp.com" target="_blank">Barcode Generator</a>
            <br /><?php echo $code; ?> PHP5-v<?php echo $codeVersion; ?>
            </footer>
        </div> -->
    </body>
</html>