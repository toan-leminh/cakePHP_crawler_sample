/**
 * Created by leminhtoan on 7/15/17.
 */
//Change default language DataTable to Japanese
if($.fn.dataTable.defaults){
    $.extend( $.fn.dataTable.defaults, {
        //"searching": true,
        //"bSort": false,
        //"aaSorting": [[]],
        "aoColumnDefs":[
            { targets: 'no-sort', orderable: false },       //No sort column which has class 'no-sort'],
        ],
        "aLengthMenu": [10, 50, 100],
        "iDisplayLength": 10,
        "bStateSave": true,           // Save dataTable setting in cookies
        // "fnStateSaveParams": function (oSettings, oData) {
        //     oData.oSearch.sSearch = ""; // Remove a saved filter
        // },
        "oLanguage": {
            "sProcessing":   "処理中...",
            "sLengthMenu":   "_MENU_ 件表示",
            "sZeroRecords":  "データはありません。",
            "sInfo":         " _TOTAL_ 件中 _START_ から _END_ まで表示",
            "sInfoThousands": ",",
            "sInfoEmpty":    " 0 件中 0 から 0 まで表示",
            "sInfoFiltered": "（全 _MAX_ 件より抽出）",
            "sInfoPostFix":  "",
            "sSearch":       "検索:",
            "sUrl":          "",
            "oAria": {
                "sSortAscending": ": activate to sort column ascending",
                "sSortDescending": ": activate to sort column descending"
            },
            "oPaginate": {
                "sFirst":    "先頭",
                "sPrevious": "前",
                "sNext":     "次",
                "sLast":     "最終"
            }
        }
    } );
}

$(document).ready(function() {
    //Initial Datatable
    $('.dataTable').DataTable();
});