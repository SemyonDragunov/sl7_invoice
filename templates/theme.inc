<?php

/**
 * @author Semyon Dragunov <sam.dragunov@gmail.com>
 * https://github.com/SemyonDragunov
 */

/**
 * Preprocess for sl7-invoice.tpl.php
 */
function template_preprocess_sl7_invoice(&$variables) {
  $variables['invoice_info'] = variable_get('sl7_invoice_info', NULL);
  $variables['company_seal'] = variable_get('sl7_invoice_company_seal_fid') ? file_create_url(file_load(variable_get('sl7_invoice_company_seal_fid'))->uri) : '';
  $variables['gm_sign'] = variable_get('sl7_invoice_gm_sign_fid') ? file_create_url(file_load(variable_get('sl7_invoice_gm_sign_fid'))->uri) : '';
  $variables['ca_sign'] = variable_get('sl7_invoice_ca_sign_fid') ? file_create_url(file_load(variable_get('sl7_invoice_ca_sign_fid'))->uri) : '';
  $variables['gm_to_ca'] = variable_get('sl7_invoice_gm_to_ca', NULL);
  $variables['gm_fio'] = variable_get('sl7_invoice_gm_fio', NULL);
  $variables['ca_fio'] = variable_get('sl7_invoice_ca_fio', NULL);
  $variables['gm_post'] = variable_get('sl7_invoice_gm_post', 'Генеральный директор');
  $variables['ca_post'] = variable_get('sl7_invoice_ca_post', 'Главный бухгалтер');
  $variables['company_name'] = variable_get('sl7_invoice_company_name', NULL);
  $variables['company_tel'] = variable_get('sl7_invoice_company_tel', NULL);
  $variables['company_inn'] = variable_get('sl7_invoice_company_inn', NULL);
  $variables['company_kpp'] = variable_get('sl7_invoice_company_kpp', NULL);
  $variables['bank_name'] = variable_get('sl7_invoice_bank_name', NULL);
  $variables['bank_bik'] = variable_get('sl7_invoice_bank_bik', NULL);
  $variables['bank_rs'] = variable_get('sl7_invoice_bank_rs', NULL);
  $variables['bank_ks'] = variable_get('sl7_invoice_bank_ks', NULL);
  $variables['order'] = is_object($variables['order']) ? $variables['order'] : sl7_order_load($variables['order']);
  $variables['items'] = sl7_order_get_items($variables['order']);
}