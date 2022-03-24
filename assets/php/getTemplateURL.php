
<?php
    function getTplPageURL($TEMPLATE_NAME){
        $url = null;
        $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => $TEMPLATE_NAME
        ));
        if(isset($pages[0])) {
            echo 'ran';
            $url = get_page_link($pages[0]->ID);
        }
        echo $url;
        return $url;
    }