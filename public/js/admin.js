$(document).ready(() => {
    //that create function to use containsi
    $.extend($.expr[':'], {
        'containsi': function(elem, i, match, array)
        {
            return (elem.textContent || elem.innerText || '').toLowerCase()
                .indexOf((match[3] || "").toLowerCase()) >= 0;
        }
    });

    function gridManaging(searchText){
        $('table > tbody  > tr').each((index, tr) => {
            $(tr).hide();
            $(tr).find(`td:containsi(${searchText})`).each((x,y) => {
                $(tr).show();
            })
        });
    }

    $('#searchButton').on('submit', (e) =>{
        e.preventDefault();
        gridManaging($('#searchBox').val());
    })
});