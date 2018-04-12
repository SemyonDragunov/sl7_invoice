<style>
    table.invoice_bank_rekv > tbody > tr > td, table.invoice_bank_rekv > tr > td { border: 1px solid; }
    table.invoice_items { border: 1px solid; border-collapse: collapse;}
    table.invoice_items td, table.invoice_items th { border: 1px solid;}
</style>

<table width="100%">
    <tr>
        <td align="center" style="font-size: smaller;">
            <div><?php print $variables['invoice_info']; ?></div>
        </td>
    </tr>
</table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border: 1px solid #000000;">
    <tr>
        <td colspan="2" rowspan="2" style="min-height:13mm; width: 105mm; border-right: 1px solid #000000;">

            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td valign="top" style="height: 10mm;">
                        <div><?php print $variables['bank_name']; ?></div>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" style="height: 3mm;">
                        <div style="font-size:10pt;">Банк получателя</div>
                    </td>
                </tr>
            </table>

        </td>
        <td style="height: 3mm; border-right: 1px solid #000000;">
            <div>БИК</div>
        </td>
        <td style="height: 3mm;">
            <div><?php print $variables['bank_bik']; ?></div>
        </td>
    <tr>
        <td valign="top" style="width: 25mm; border-top: 1px solid #000000; border-right: 1px solid #000000;">
            Сч. №
        </td>
        <td valign="top" style="borde-top: 1px solid #000000;">
            <div><?php print $variables['bank_ks']; ?></div>
        </td>
    </tr>
    <tr>
        <td style="min-height:6mm; height:auto; width: 50mm; border-right: 1px solid #000000; border-top: 1px solid #000000;">
            <div>ИНН <?php print $variables['company_inn']; ?></div>
        </td>
        <td style="min-height:6mm; height:auto; width: 55mm; border-right: 1px solid #000000; border-top: 1px solid #000000;">
            <div>КПП <?php print $variables['company_kpp']; ?></div>
        </td>
        <td rowspan="2" style="min-height:19mm; height:auto; vertical-align: top; width: 25mm; border-right: 1px solid #000000; border-top: 1px solid #000000;">
            <div>Сч. №</div>
        </td>
        <td rowspan="2" style="min-height:19mm; height:auto; vertical-align: top; width: 60mm; border-top: 1px solid #000000;">
            <div><?php print $variables['bank_rs']; ?></div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="min-height:13mm; height:auto; border-top: 1px solid #000000; border-right: 1px solid #000000;">

            <table border="0" cellpadding="0" cellspacing="0" style="width: 105mm;">
                <tr>
                    <td valign="top" style="height: 10mm;">
                        <div><?php print $variables['company_name']; ?></div>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" style="height: 3mm;">
                        <div style="font-size: 10pt;">Получатель</div>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
<br/>

<div style="font-weight: bold; font-size: 16pt; padding-left:5px;">
    Счет № <?php print $variables['order']->oid; ?> от <?php print date(SL7_DATE_FORMAT_NO_HOUR, $variables['order']->created); ?></div>
<br/>

<div style="background-color:#000000; width:100%; font-size:1px; height:2px;">&nbsp;</div>

<table width="100%">
    <tr>
        <td style="width: 30mm;">
            <div style=" padding-left:2px;">Поставщик:</div>
        </td>
        <td>
            <div style="font-weight:bold;  padding-left:2px;">
            <?php print
                $variables['company_name'] . ', '.
                'ИНН ' . $variables['company_inn'] . ', '.
                'КПП ' . $variables['company_kpp'] . ' ' . $variables['company_tel'];
            ?>
            </div>
        </td>
    </tr>
    <tr>
        <td style="width: 30mm;">
            <div style=" padding-left:2px;">Покупатель:</div>
        </td>
        <td>
            <div style="font-weight:bold;  padding-left:2px;"><?php print
                $variables['customer']['field_name'] . ', ' .
                'ИНН ' . $variables['customer']['field_inn'] . ', ' .
                'КПП ' . $variables['customer']['field_kpp'];
            ?></div>
        </td>
    </tr>
</table>


<table class="invoice_items" width="100%" cellpadding="2" cellspacing="2">
    <thead>
    <tr>
        <th style="width:13mm;">№</th>
        <th>Товар</th>
        <th style="width:20mm;">Кол-во</th>
        <th style="width:17mm;">Ед.</th>
        <th style="width:27mm;">Цена</th>
        <th style="width:27mm;">Сумма</th>
    </tr>
    </thead>
    <tbody>
        <?php $number = 0; ?>
        <?php foreach ($variables['items'] as $item): ?>
            <?php $number++; ?>
            <tr>
                <td align="center"><?php print $number; ?></td>
                <td align="left"><?php print $item['label']; ?></td>
                <td align="right"><?php print $item['quantity']; ?></td>
                <td align="left"><?php print $item['unit']; ?></td>
                <td align="right"><?php print number_format($item['amount'], 2); ?></td>
                <td align="right"><?php print number_format($item['amount']*$item['quantity'], 2); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<table border="0" width="100%" cellpadding="1" cellspacing="1">
    <tr>
        <td></td>
        <td style="width:27mm; font-weight:bold;  text-align:right;">Итого:</td>
        <td style="width:27mm; font-weight:bold;  text-align:right;"><?php print number_format($variables['nds']['price'], 2); ?></td>
    </tr>
    <tr>
        <td></td>
        <td style="width:50mm; font-weight:bold;  text-align:right;"><?php print $variables['nds']['title']; ?></td>
        <td style="width:27mm; font-weight:bold;  text-align:right;"><?php $variables['nds']['nds'] > 0 ? print number_format($variables['nds']['nds'], 2) : print '-'; ?></td>
    </tr>
    <tr>
        <td></td>
        <td style="width:35mm; font-weight:bold;  text-align:right;">Всего к оплате:</td>
        <td style="width:27mm; font-weight:bold;  text-align:right;"><?php print number_format($variables['sum'], 2); ?></td>
    </tr>
</table>

<br />
<div>Всего наименований <?php print $number; ?> на сумму <?php print number_format($variables['sum'], 2); ?> рублей.<br />
<?php print $variables['sum_str']; ?>.</div>
<br /><br />
<div style="background-color:#000000; width:100%; font-size:1px; height:2px;">&nbsp;</div>
<br/>

<table width="100%">
    <tr style="position: relative;">
        <?php if ($variables['gm_sign']): ?>
            <div style="position: absolute; left: 270px"><img src="<?php print $variables['gm_sign']; ?>" /></div>
        <?php endif; ?>
        <td><?php print $variables['gm_post']; ?> ___________________________________ / <?php print $variables['gm_fio']; ?></td>
    </tr>
    <?php if ($variables['company_seal']): ?>
        <tr>
            <td align="right" style="position: relative">
                <div style="position: absolute; right: 100px;"><img src="<?php if ($variables['company_seal']) print $variables['company_seal']; ?>" /></div>
                <br />
            </td>
        </tr>
    <?php endif; ?>
    <tr style="position: relative;">
        <?php if ($variables['ca_sign'] || $variables['gm_sign']): ?>
            <div style="position: absolute; left: 220px; margin-top: 40px;"><img src="<?php $variables['gm_to_ca'] == FALSE ? print $variables['ca_sign'] : print $variables['gm_sign']; ?>" /></div>
        <?php endif; ?>
        <td>
            <?php print $variables['ca_post']; ?> _______________________________________ / <?php $variables['gm_to_ca'] == FALSE ? print $variables['ca_fio'] : print $variables['gm_fio']; ?>
        </td>
    </tr>
</table>