/**
 * Created by Jonas on 2014-12-28.
 */

function operateFormatter() {
    return [
        '<a class="buy" href="javascript:void(0)" title="Buy">',
        '<i class="glyphicon glyphicon-shopping-cart"></i>',
        '</a>',
        '<a class="preview ml10" href="javascript:void(0)" title="Preview">',
        '<i class="glyphicon glyphicon-eye-open"></i>',
        '</a>'
    ].join('');
}

window.operateEvents = {
    'click .buy': function (e, value, row) {
        window.location = "http://www.adlibris.com/se/sok?q="+JSON.stringify(parseInt(row.isbn));
    },
    'click .preview': function (e, value, row, index) {
        console.log("nu klickade du på förhandsvisning");

        var isbn = JSON.stringify(parseInt(row.isbn));
        getISBN(isbn);
    }
};