<div class="main_menu">
    <div class="main_menu_one_col">
        <span class="main_link <? if($_SERVER['REQUEST_URI']=='/en/'): ?>active<? endif; ?>"><a href="/en/">Home</a></span><br>
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "about")==1): ?>active<? endif; ?>"><a href="/en/about/">About</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "about/first-person")==1): ?>active<? endif; ?>"><a href="/en/about/first-person/">First-person</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "about/board-directors")==1): ?>active<? endif; ?>"><a href="/en/about/board-directors/">Board of directors</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "about/management")==1): ?>active<? endif; ?>"><a href="/en/about/management/">Management</a></span><br>
    </div>
    <div class="main_menu_one_col">
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "products")==1): ?>active<? endif; ?>"><a href="/en/products/">Products</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "products")==1 && strpos($_SERVER['REQUEST_URI'], "products/civil")!=1): ?>active<? endif; ?>"><a href="/en/products/">Warships</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "products/civil")==1): ?>active<? endif; ?>"><a href="/en/products/civil/">Civil court</a></span><br>
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "enterprises")==1): ?>active<? endif; ?>"><a href="/en/enterprises/">Holding companies</a></span><br>
    </div>
    <div class="main_menu_one_col">
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "innovation")==1): ?>active<? endif; ?>"><a href="/en/innovation/">Innovation</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "innovation")==1 && strpos($_SERVER['REQUEST_URI'], "innovation/technology-platforms")!=1): ?>active<? endif; ?>"><a href="/en/innovation/">Innovative development</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "innovation/technology-platforms")==1): ?>active<? endif; ?>"><a href="/en/innovation/technology-platforms/">Technology platforms</a></span><br>
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "contacts")==1): ?>active<? endif; ?>"><a href="/en/contacts/">Contact information</a></span><br>
    </div>
    <div class="clear"></div>
</div>