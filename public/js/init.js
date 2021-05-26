function setNewsCategorySelectBox() {
    return {
        culture: 'Culture',
        sport: 'Sport',
        tech: 'Technologie',
        game: 'Jeux vidéo',
        science: 'Science',
        finance: 'Finance',
        education: 'Éducation',
    }
}

function getNewsKey(value) {
    for (let key in setNewsCategorySelectBox()) {
        if (setNewsCategorySelectBox()[key] === value) {
            return key;
        }
    }
}

function setEventCategorySelectBox() {
    return {
        business: 'Entreprenariat',
        sport: 'Sport',
        tech: 'Technologie',
        game: 'Jeux vidéo',
        science: 'Science',
        webinar: 'Webinaire',
        show: 'Spectacle',
        conference: 'Conférence',
    }
}

function setJobCategorySelectBox() {
    return {
        stage: 'Stage',
        partial: 'Emplois temps partiel',
        full: 'Emplois temps plein',

    }
}

function getEventKey(value) {
    for (let key in setEventCategorySelectBox()) {
        if (setEventCategorySelectBox()[key] === value) {
            return key;
        }
    }
}

function getJobKey(value) {
    for (let key in setJobCategorySelectBox()) {
        if (setJobCategorySelectBox()[key] === value) {
            return key;
        }
    }
}