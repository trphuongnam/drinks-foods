<?php

/* Function show content email order */
function showContentEmail($detailOrder)
{
    $numOrder = 0;
    $rowTable = "";
    for ($i = 0; $i < count($detailOrder); $i++) { 
        $numOrder++;
        $idProduct = $detailOrder[$i]['id_product'];
        $quantity = $detailOrder[$i]['quantity'];
        $unitPrice = number_format($detailOrder[$i]['unit_price'], 0, ',', '.')." VND";
        $amountProduct = number_format($detailOrder[$i]['unit_price']*$detailOrder[$i]['quantity'], 0, ',', '.')." VND";

        $rowTable .= "<tr class='row_content'><td>".$numOrder."</td><td>".getNameProduct($idProduct)."</td>
            <td>".$quantity."</td><td>".$unitPrice."</td>
            <td>".$amountProduct."</td></tr>";
    }
    return $rowTable;
}
?>