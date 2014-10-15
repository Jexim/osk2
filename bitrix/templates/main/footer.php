                    </div><!--/page-->

                    <div class="clear"></div>

                    

                </div><!--/wrapper-->

                <!-- <div id="layout_footer"></div> -->
            
            </div><!--/content-->
                    
            <div id="footer" <?if($_SERVER['PHP_SELF'] != '/index.php'){?>class="footer_small"<?}?>>
                <div id="footer-content">
                    <div id="footer-text">
                        <div class="footer-nav">
                            <? if(!empty($_ENV['NEXT_ELEMENT'])){?>
                                <div class="row next">
                                    <a href="<?= $_ENV['NEXT_ELEMENT']['DETAIL_PAGE_URL'] ?>"><?= $_ENV['NEXT_ELEMENT']['NAME'] ?></a>
                                </div>
                            <?}else{?>
                            <div class="row next">
                                <a href="/about/" class="underline">О корпорации</a>
                            </div>
                            <?}?>
                        </div>
                        <div class="company-name">
                            ©&nbsp;2014 ОАО «Объединенная судостроительная
                            корпорация»
                        </div>
                        <?if($_SERVER['PHP_SELF'] == '/index.php'){?>
                            <div class="made-in">
                                Сделано в&nbsp;<a href="http://artlebedev.ru/" class="underline"><span class="icon icons-als"></span>Студии Артемия Лебедева</a></div>
                            <!-- <div class="info">
                                <a class="info underline" href="http://artlebedev.ru/everything/">
                                    Информация о сайте
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