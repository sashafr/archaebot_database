<?php
echo head(array('bodyid' => 'home'));

ini_set('display_errors',1);
error_reporting(E_ALL);
?>

<?php echo $this->partial('items/search-form.php',
    array('formAttributes' =>
        array('id'=>'advanced-search-form'))); ?>

<div id="primary">
    <?php if (get_theme_option('Homepage Text')): ?>
   <!-- <p><?php echo get_theme_option('Homepage Text'); ?><p>
    <?php endif; ?>
    
<?php
    $collectionTitle = '';
    $collectionIDs = collection_order_array();
    $num_of_collections = count($collectionIDs);
    $div_counter = 1;
    
   // $num_of_collection_items = count($collection_items);

    foreach ($collectionIDs as $collectionID) {



    
        $collection = get_record_by_id('collection', $collectionID);
        $collectionName = metadata($collection, array('Dublin Core', 'Title'));
        $collection_link = link_to_collection('browse all', array(), 'show', $collection);
        $collection_items = get_records('Item',
            array(
                'collection' => $collection['id'],
                'sort_field' => 'Dublin Core,Audience',
                'sort_dir' => 'a',
            ),
            999);

        $num_of_collection_items = count($collection_items);
        
if(count($collection_items) != 0){
    
        set_loop_records('items', $collection_items);
        $collection_item_list = array();
        foreach (loop('items') as $item) {
            set_current_record('item', $item);
            array_push($collection_item_list,
                array(
                    'thumb' => item_image('square_thumbnail', array('alt' => metadata($item, array('Dublin Core', 'Title')))),
                    'link' => record_url($item),
                    'name' => metadata($item, array('Dublin Core', 'Title')),
             ));
        }
    // IF
        echo '<h1 style="display: inline; ">' .$collectionName. '</h1> (' . $collection_link . ')';
        echo '<hr style="visibility: hidden; margin-top: 1px; margin-bottom: 1px;" />';
        echo '<ul id="collection'.$div_counter.'" class="slider">';

        for ($i=0; $i < $num_of_collection_items; $i++) {
            echo '<li>';
            echo '<a href="'.$collection_item_list[$i]['link'].'" rel="tooltip" title="'.$collection_item_list[$i]['name'].'">'.$collection_item_list[$i]['thumb'].'</a>';
            echo '</li>';
            
            
            echo '<a href="">'.'</a>'; //this makes the arrows work for collections following the first one
            
        }

        echo '</ul>';
        echo '<hr style="visibility: hidden; margin-top: 3px; margin-bottom: 3px;" />';
        $div_counter++;
        
    

    echo "<script> " . PHP_EOL;
    echo "!function( $ ){ " . PHP_EOL;
    echo "$(function () { " . PHP_EOL;

    for ($k=1; $k <= $num_of_collections; $k++) {
        echo "$('#collection".$k."').bxSlider({ " . PHP_EOL;
        echo "displaySlideQty: 7, " . PHP_EOL;
        echo "moveSlideQty: 11, " . PHP_EOL; //was 7
        echo " }); " . PHP_EOL;
    }
 
    echo "$('a[rel=tooltip]').tooltip(); " . PHP_EOL;
    echo "}); " . PHP_EOL;
    echo "}( window.jQuery ) " . PHP_EOL;
    echo "</script> " . PHP_EOL;
    

    

    fire_plugin_hook('public_home', array('view' => $this));
}
    } //bad
    echo foot();
 ?>