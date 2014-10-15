                    </div><!--/page-->

                    <div class="clear"></div>

                    

                </div><!--/wrapper-->

                <!-- <div id="layout_footer"></div> -->
            
            </div><!--/content-->
                    
            <div id="footer" <?if($_SERVER['PHP_SELF'] != '/en/index.php'){?>class="footer_small"<?}?>>
                <div id="footer-content <?if($_SERVER['PHP_SELF'] != '/en/index.php'){?>footer_height<?}?>">
                    <div id="footer-text">
                        <div class="footer-nav">
                            <? if(!empty($_ENV['NEXT_ELEMENT'])){?>
                                <div class="row next">
                                    <a href="<?= $_ENV['NEXT_ELEMENT']['DETAIL_PAGE_URL'] ?>"><?= $_ENV['NEXT_ELEMENT']['NAME'] ?></a>
                                </div>
                            <?}else{?>
                            <div class="row next">
                                <a href="/en/about/" class="underline">About</a>
                            </div>
                            <?}?>
                        </div>
                        <div class="company-name">
                            ©&nbsp;2014 JSC "United Shipbuilding Corporation"
                        </div>
                        <?if($_SERVER['PHP_SELF'] == '/en/index.php'){?>
                            <div class="made-in">
                                Made in&nbsp;<a href="http://artlebedev.com/" class="underline"><span class="icon icons-als"></span>Art. Lebedev Studio</a></div>
                            <!-- <div class="info">
                                <a class="info underline" href="http://artlebedev.com/everything/">
                                    About this site
                                </a>
                            </div> -->
                        <?}?>
                    </div>
                </div>
            </div>
            <?if($_SERVER['PHP_SELF'] == '/index.php'): ?>
                <?$APPLICATION->IncludeComponent("osk:rs.state_organizations_list", "main", false, false);?>
            <? endif; ?>

        </div><!--/layout-->
        
    </body>

</html>