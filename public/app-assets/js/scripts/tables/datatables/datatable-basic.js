/*=========================================================================================
    File Name: datatables-basic.js
    Description: Basic Datatable
    ----------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Template
    Version: 2.1
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function() {

/****************************************
*       js of zero configuration        *
****************************************/
var lang = $('#lang').attr('data-lang');
if(lang == 'ar'){
    $('.zero-configuration').DataTable({
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 'pdf', 'print'
        ],
        "language": {
            "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
            "sLoadingRecords": "جارٍ التحميل...",
            "sProcessing":   "جارٍ التحميل...",
            "sLengthMenu":   "أظهر _MENU_ مدخلات",
            "sZeroRecords":  "لم يعثر على أية سجلات",
            "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
            "sInfoPostFix":  "",
            "sSearch":       "ابحث:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "الأول",
                "sPrevious": "السابق",
                "sNext":     "التالي",
                "sLast":     "الأخير"
            },
            "oAria": {
                "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
            }
    
        }
        
    });
    $(' .buttons-csv').addClass('btn btn-green mr-1');
    $(' .buttons-print').addClass('btn btn-blue mr-1');
    $(' .buttons-pdf ').addClass('btn btn-red mr-1');
    $(' .buttons-excel').addClass('btn btn-green mr-1');
}else{
    $('.zero-configuration').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });
    $(' .buttons-csv').addClass('btn btn-green mr-1');
    $(' .buttons-print').addClass('btn btn-blue mr-1');
    $(' .buttons-pdf ').addClass('btn btn-red mr-1');
    $(' .buttons-excel').addClass('btn btn-green mr-1');
}
/**************************************
*       js of default ordering        *
**************************************/

$('.default-ordering').DataTable( {
    "order": [[ 3, "desc" ]]
} );

/************************************
*       js of multi ordering        *
************************************/

$('.multi-ordering').DataTable( {
    columnDefs: [ {
        targets: [ 0 ],
        orderData: [ 0, 1 ]
    }, {
        targets: [ 1 ],
        orderData: [ 1, 0 ]
    }, {
        targets: [ 4 ],
        orderData: [ 4, 0 ]
    } ]
} );

/*************************************
*       js of complex headers        *
*************************************/

$('.complex-headers').DataTable();

/*************************************
*       js of dom positioning        *
*************************************/

$('.dom-positioning').DataTable( {
    "dom": '<"top"i>rt<"bottom"flp><"clear">'
} );

/************************************
*       js of alt pagination        *
************************************/

$('.alt-pagination').DataTable( {
    "pagingType": "full_numbers"
} );

/*************************************
*       js of scroll vertical        *
*************************************/

$('.scroll-vertical').DataTable( {
    "scrollY":        "200px",
    "scrollCollapse": true,
    "paging":         false
} );

/************************************
*       js of dynamic height        *
************************************/

$('.dynamic-height').DataTable( {
    scrollY:        '50vh',
    scrollCollapse: true,
    paging:         false
} );

/***************************************
*       js of scroll horizontal        *
***************************************/

$('.scroll-horizontal').DataTable( {
    "scrollX": true
} );

/**************************************************
*       js of scroll horizontal & vertical        *
**************************************************/

$('.scroll-horizontal-vertical').DataTable( {
    "scrollY": 200,
    "scrollX": true
} );

/**********************************************
*       Language - Comma decimal place        *
**********************************************/

$('.comma-decimal-place').DataTable( {
    "language": {
        "decimal": ",",
        "thousands": "."
    }
} );


});