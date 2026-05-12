/**
* Theme: Adminto Admin Template
* Author: Coderthemes
* Component: Datatable
*
* Optimasi SIA MOM LOGISTIC:
* - Untuk tabel besar Entry Job / Entry Invoice, DataTables memakai server-side processing.
* - Halaman lain tetap memakai setting lama.
*/

var handleDataTableButtons = function() {
    "use strict";



    if (0 !== $("#datatable-entry-job").length) {
        var $entryJobTable = $("#datatable-entry-job");
        var entryJobAjaxUrl = $entryJobTable.data("ajax-url");

        $entryJobTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: entryJobAjaxUrl,
            pageLength: 10,
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            order: [[0, "desc"]],
            responsive: false,
            scrollX: true,
            autoWidth: false,
            deferRender: true,
            dom: "Bfrtip",
            buttons: [{
                extend: "copy",
                className: "btn-sm"
            }, {
                extend: "csv",
                className: "btn-sm"
            }, {
                extend: "excel",
                className: "btn-sm"
            }, {
                extend: "pdf",
                className: "btn-sm"
            }, {
                extend: "print",
                className: "btn-sm"
            }],
            columnDefs: [{
                targets: -1,
                orderable: false,
                searchable: false,
                className: "entry-job-action-col"
            }]
        });
    }

    if (0 !== $("#datatable-buttons").length) {
        var $table = $("#datatable-buttons");
        var isServerSide = $table.data("server-side") == 1 || $table.data("server-side") === true;
        var ajaxUrl = $table.data("ajax-url");

        if (isServerSide && ajaxUrl) {
            $table.DataTable({
                processing: true,
                serverSide: true,
                ajax: ajaxUrl,
                pageLength: 10,
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                order: [[0, "desc"]],
                responsive: true,
                deferRender: true,
                dom: "Bfrtip",
                buttons: [{
                    extend: "copy",
                    className: "btn-sm"
                }, {
                    extend: "csv",
                    className: "btn-sm"
                }, {
                    extend: "excel",
                    className: "btn-sm"
                }, {
                    extend: "pdf",
                    className: "btn-sm"
                }, {
                    extend: "print",
                    className: "btn-sm"
                }],
                columnDefs: [{
                    targets: -1,
                    orderable: false,
                    searchable: false
                }]
            });
        } else {
            $table.DataTable({
                dom: "Bfrtip",
                buttons: [{
                    extend: "copy",
                    className: "btn-sm"
                }, {
                    extend: "csv",
                    className: "btn-sm"
                }, {
                    extend: "excel",
                    className: "btn-sm"
                }, {
                    extend: "pdf",
                    className: "btn-sm"
                }, {
                    extend: "print",
                    className: "btn-sm"
                }],
                responsive: true
            });
        }
    }
},
TableManageButtons = function() {
    "use strict";
    return {
        init: function() {
            handleDataTableButtons()
        }
    }
}();
