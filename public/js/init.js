function setCategorySelectBox() {
    return {
        event: 'Évènementielle',
        school: 'Para-Scolaire',
        info: 'Information',
        tech: 'Technologique',
    }
}

function getKey(value){
    let key;
    for (key in setCategorySelectBox()){
        if (setCategorySelectBox()[key] === value){
            return key;
        }
    }
}

function setChecked(){
    debugger;
    this.$refs.checkedBox
}