/**
 * Created by Jonas on 2015-02-02.
 */


function init()
{
    setupTable();

    $("#myBtn").click(function(e)
    {
        var searchQuery = $('#searchQuery').val();
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: './API_Request.php',
            dataType: 'json',
            data: {"Add": searchQuery},

            success: function (data) {
                window.localStorage.removeItem('Books');
                window.localStorage.setItem('Books', JSON.stringify(data));
                var localData = JSON.parse(window.localStorage.getItem('Books'));
                $('#table').bootstrapTable("load", localData);
            },
            error: function () {
                var localData = window.localStorage.getItem('Books');
                $('#table').bootstrapTable("load", JSON.parse(localData));
            }
        });
    });
}

function setupTable()
{
    $('#table').bootstrapTable({
        height: 400,
        search: true,
        pageSize: 10,
        pageList: [10, 25, 50, 100, 200],
        pagination: true,
        columns: [{
            field: 'title',
            title: 'Titel',
            sortable: true
        }, {
            field: 'creator',
            title: 'Författare',
            sortable: true
        }, {
            field: 'isbn',
            title: 'ISBN',
            sortable: true
        }, {
            field: 'operate',
            title: 'Ikoner',
            align: 'center',
            valign: 'middle',
            clickToSelect: false,
            formatter: operateFormatter,
            events: operateEvents
        } ]
    });
}
window.addEventListener("load", init());