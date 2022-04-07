<form  role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <div class="header__search--col">
        <div>
            <input class="header__search--input" type="search" value="<?php echo get_search_query(); ?>" name="s" />
        </div>
        <div>
            <button class="header__search--bt" type="submit"><i class="i i--search"></i></button>
        </div>
    </div>
</form>