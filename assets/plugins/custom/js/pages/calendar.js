/**
 * Created by Maxime on 03/03/2016.
 */
(function($){
    //Table calendar
    function fnFormatDetails(oTable, nTr) {
        var aData = oTable.fnGetData(nTr);
        var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
        sOut += '<tr><td style="width: 50%;">Lieu:</td><td style="width: 50%;">' + aData[5] + '</td></tr>';
        sOut += '<tr><td style="width: 50%;">Description:</td><td style="width: 50%;">'+aData[6]+'</td></tr>';
        sOut += '</table>';
        return sOut;
    }
    var nCloneTh = document.createElement('th');
    var nCloneTd = document.createElement('td');
    nCloneTd.innerHTML = '<i class="fa fa-plus-square-o"></i>';
    nCloneTd.className = "center";

    $('#calendar thead tr').each(function () {
        this.insertBefore(nCloneTh, this.childNodes[0]);
    });
    $('#calendar tbody tr').each(function () {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
    });

    var oTable = $('#calendar').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        "aaSorting": [
            [1, 'asc']
        ]
    });
    $(document).on('click', '#calendar tbody td i', function () {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
            /* This row is already open - close it */
            $(this).removeClass().addClass('fa fa-plus-square-o');
            oTable.fnClose(nTr);
        } else {
            /* Open this row */
            $(this).removeClass().addClass('fa fa-minus-square-o');
            oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
    });
})(jQuery);