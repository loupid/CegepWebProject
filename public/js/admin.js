$(document).ready(() =>{
    let ids = [];
    //that create function to use c
    $.extend($.expr[':'], {
        'containsi': function(elem, i, match, array)
        {
            return (elem.textContent || elem.innerText || '').toLowerCase()
                .indexOf((match[3] || "").toLowerCase()) >= 0;
        }
    });

    function setIds(searchText){
        $('table > tbody  > tr').each((index, tr) => {
            $(tr).find(`td:containsi(${searchText})`).each((x,y) => {
                ids.push(index);
            })
        });
    }

    function manageGrid(){
        $('table > tbody  > tr').each(function(index, tr) {
            if (ids.includes(index)){
                $(tr).show();
            } else $(tr).hide();
        });
    }
    $('#searchButton').on('submit', (e) =>{
        e.preventDefault();
        setIds($('#searchBox').val());
        manageGrid();
        ids = [];
    })
});