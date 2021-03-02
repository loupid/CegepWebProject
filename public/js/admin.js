$(document).ready(() =>{
    let ids = [];

    function setIds(searchText){
        $('table > tbody  > tr').each((index, tr) => {
            $(tr).find(`td:contains(${searchText})`).each((x,y) => {
                ids.push(index);
            })
        });
    }

    function manageGrid(){
        $('table > tbody  > tr').each(function(index, tr) {
            if (ids.includes(index)){
                $(tr).hide();
            }
            else $(tr).show();
        });
    }
});