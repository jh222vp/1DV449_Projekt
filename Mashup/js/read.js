/**
 * Created by Jonas on 2014-12-28.
 */

function operateFormatter() {
    return [
        '<a class="like" href="javascript:void(0)" title="Like">',
        '<i class="glyphicon glyphicon-shopping-cart"></i>',
        '</a>',
        '<a class="edit ml10" href="javascript:void(0)" title="Edit">',
        '<i class="glyphicon glyphicon-eye-open"></i>',
        '</a>',
        '<a class="remove ml10" href="javascript:void(0)" title="Remove">',
        '<i class="glyphicon glyphicon-remove"></i>',
        '</a>'
    ].join('');
}

window.operateEvents = {
    'click .like': function (e, value, row) {
        window.location = "http://www.adlibris.com/se/sok?q="+JSON.stringify(parseInt(row.isbn));
    },
    'click .edit': function (e, value, row, index) {
        console.log("nu klickade du på förhandsvisning");

        var isbn = JSON.stringify(parseInt(row.isbn));
        getISBN(isbn);
    },
    'click .remove': function (e, value, row, index) {
        alert('You click remove icon, row: ' + JSON.stringify(row));
        console.log(value, row, index);
    }
};