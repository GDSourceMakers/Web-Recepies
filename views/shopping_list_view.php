<?php //wrote about it in the inStocl_view.php, same goes for almost everything

?>

<link rel="stylesheet" media="print" href="static/css/print_shoppinList.css" />
<link rel="stylesheet" type="text/css" href="static/css/shopping_list.css">

<!--coped the content of "shopping-list.html" here-->
<div class="card content">
    <div class="page_title">Shopping list</div>

    <div class="contents_table">
        <form action="shopping_list.php"  method="POST" enctype="multipart/form-data">
            <table>
                <colgroup>
                    <col> <!-- pic -->
                    <col> <!-- name -->
                    <col> <!-- quantity-->
                    <col> <!-- buttons-->
                </colgroup>
                <thead>
                    <tr>
                        <th id="a"></th>
                        <th id="b">Product</th>
                        <th id="c">Amount</th>
                        <th id="d"></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td headers="a">
                            <input id="img_browse" name="img_browse" type="file">
                            <label for="img_browse" class="card list_button browse_img_button"><i class="far fa-folder-open"></i></label>
                        </td>

                        <td headers="b">
                            <input name="name" id="data_name" type="text">
                        </td>

                        <td headers="c">
                            <input name="qty" id="data_quantity" type="text">
                        </td>

                        <td headers="d">
                            <input class="card list_button" id="submit_button" type="submit" name="add" value="Add new item">
                        </td>
                    </tr>

                    <?php
                        for ($i = 0; $i < count($data); $i++) {
                            $item = $data[$i];

                            //the html code in the EOT variable gonna appear, when it's echo-ed
                            $template = <<<EOT
                                <tr>
                                    <td headers="a" class="table_image"> <img src="$item->picture" alt="food item"></td>
                                    <td headers="b">$item->name</td>
                                    <td headers="c">$item->amount</td>
                                    <td headers="d">
                                    <!--<div class="card list_button list_edit_button"><i class="fas fa-pen"></i></div> !!debating about if i can make it work in time-->
                                        <!--<div class="card list_button list_delete_button"><i class="fas fa-minus"></i></div>-->
                                        <button type="submit" class="card list_button list_delete_button button_noStyle" name="delete" value="$i" title="Delete"><i class="fas fa-minus"></i></button> 
                                        <!--<div class="card list_button list_inStock_button"><i class="fas fa-cart-arrow-down"></i></div>   -->
                                        <button type="submit" class="card list_button list_inStock_button button_noStyle" name="toStock" value="$i" title="Add to my stock"><i class="fas fa-cart-arrow-down"></i></button>                  
                                    </td>
                                </tr>
                                EOT;
                            echo $template; //echo here
                            //every data that gets generated or repeated can be deleted, only one edited version is needed
                        }
                    ?>

                </tbody>


            </table>
        </form>
    </div>
</div>