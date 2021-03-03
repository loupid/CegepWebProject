function setNewsCategorySelectBox() {
    return {
        event: 'Évènementielle',
        school: 'Para-Scolaire',
        info: 'Information',
        tech: 'Technologique',
    }
}

function getNewsKey(value){
    for (let key in setNewsCategorySelectBox()){
        if (setNewsCategorySelectBox()[key] === value){
            return key;
        }
    }
}

function setEventCategorySelectBox() {
    return {
        event: 'Évènementielle',
        school: 'Para-Scolaire',
        info: 'Information',
        tech: 'Technologique',
    }
}

function getEventKey(value){
    for (let key in setEventCategorySelectBox()){
        if (setEventCategorySelectBox()[key] === value){
            return key;
        }
    }
}