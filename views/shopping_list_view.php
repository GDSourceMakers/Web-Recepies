<?php //wrote about it in the inStocl_view.php, same goes for almost everything

?>

<link rel="stylesheet" media="print" href="static/css/print_shoppinList.css" />
<link rel="stylesheet" type="text/css" href="static/css/shopping_list.css">

<!--coped the content of "shopping-list.html" here-->
<div class="card content">
    <div class="page_title">Shopping list</div>

    <div class="contents_table">
        <form  method="POST">
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
                            <input id="data_name" type="text">
                        </td>

                        <td headers="c">
                            <input id="data_quantity" type="text">
                        </td>

                        <td headers="d">
                            <input class="card list_button" id="submit_button" type="submit" value="Add new item">
                        </td>
                    </tr>

                    <?php
                        foreach ($data as $i) {
                            $template = <<<EOT
                            <tr>
                                <td headers="a" class="table_image"> <img src=$i->picture alt="food item picture"></td>
                                <td headers="b">$i->name</td>
                                <td headers="c">$i->amount</td>
                                <td headers="d">
                                    <div class="card list_button list_edit_button"><i class="fas fa-pen"></i></div>
                                    <div class="card list_button list_delete_button"><i class="fas fa-minus"></i></div>
                                    <div class="card list_button list_inStock_button"><i class="fas fa-cart-arrow-down"></i></div>
                                </td>
                            </tr>
                            EOT;
                            echo $template;
                        }
                    ?>

                </tbody>

            </table>
        </form>
    </div>
</div>