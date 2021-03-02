function setCategorySelectBox() {
    return {
        event: 'Évènementielle',
        school: 'Para-Scolaire',
        info: 'Information',
        tech: 'Technologique',
    }
}

function getKey(value){
    for (let key in setCategorySelectBox()){
        if (setCategorySelectBox()[key] === value){
            return key;
        }
    }
}