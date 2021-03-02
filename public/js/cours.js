const modal = document.querySelector('.modal');

/*    const showModal = document.querySelector('.show-modal');*/
const closeModal = document.querySelectorAll('.close-modal');

// Session 1
$("#601101MQ").on('click', function (event){
    $("#description-cours").html("L’objectif général du cours est d’amener l’étudiant à lire et à étudier des textes jugés remarquables par l'histoire de la littérature française, à travers une sélection d’œuvres du Moyen Âge à aujourd’hui. <br>À la fin du cours, l’étudiant sera capable de rédiger et réviser une analyse littéraire de 700 mots pour rendre compte de cette étude.");
    $("#titre-cours").text("Écriture et littérature");
    event.preventDefault()
    toggleModal()
});

$("#604RR401").on('click', function (){
    $("#description-cours").text("À venir");
    $("#titre-cours").text("Anglais 1 R4");
    event.preventDefault()
    toggleModal()
});

$("#340101MQ").on('click', function (){
    $("#description-cours").html("Ce cours vise à ce que l’élève puisse traiter une question philosophique en élaborant une argumentation rigoureuse. Il s’initie à la philosophie en prenant connaissance des principaux moments de son évolution et de ses distinctions par rapport à la science et à la religion. Dans la culture gréco-latine, la rationalité philosophique s’est développée à travers la pratique du questionnement et de l’argumentation. L’étude de cette pensée est mise au service des objectifs d’acquisition personnelle d’une habileté à questionner et à argumenter.");
    $("#titre-cours").text("Philosophie et rationalité");
    event.preventDefault()
    toggleModal()
});

$("#109101MQ").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Activité physique et santé");
    event.preventDefault()
    toggleModal()
});

$("#2011Y3RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Logique et arithmétique de l'ordinateur");
    event.preventDefault()
    toggleModal()
});

$("#420116RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Introduction à la programmation");
    event.preventDefault()
    toggleModal()
});

$("#420124RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Développement Web I");
    event.preventDefault()
    toggleModal()
});

$("#420134RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Métiers-Technologies-Applications");
    event.preventDefault()
    toggleModal()
});

// Session 2

$("#601102MQ").on('click', function (){
    $("#description-cours").html("L’objectif général du cours est d’amener l’étudiant à lire et à étudier des textes marquants de l’histoire de la littérature française à travers une sélection d’œuvres du dix-neuvième siècle à aujourd’hui. <br>À la fin du cours, l’étudiant sera capable de rédiger et réviser une dissertation explicative rendant compte de ses analyses et réflexions.");
    $("#titre-cours").text("Littérature et imaginaire");
    event.preventDefault()
    toggleModal()
});

$("#604RR42T").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Anglais 2 R4 Technique");
    event.preventDefault()
    toggleModal()
});

$("#340102MQ").on('click', function (event){
    $("#description-cours").html("À partir des acquis de la démarche philosophique, ce cours vise à ce que l’élève puisse caractériser, comparer et discuter des conceptions philosophiques de l’être humain. Il prend connaissance des concepts clés et des principes qui permettent de caractériser et de comparer entre elles différentes conceptions modernes et contemporaines de l’être humain. Il en reconnaît l’importance au sein de la culture occidentale. Il les analyse, les compare et les commente à partir de thèmes ou de problèmes actuels afin d’en discuter les enjeux pour la pensée et l’action.");
    $("#titre-cours").text("L'être humain");
    event.preventDefault()
    toggleModal()
});

$("#109102MQ").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Activité physique et efficacité");
    event.preventDefault()
    toggleModal()
});

$("#420214RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Principes liés aux bases de données");
    event.preventDefault()
    toggleModal()
});

$("#420215RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Programmation orientée objet");
    event.preventDefault()
    toggleModal()
});

$("#420224RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Développement Web II");
    event.preventDefault()
    toggleModal()
});

$("#420236RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Système d'exploitation et composantes matérielles");
    event.preventDefault()
    toggleModal()
});

// Session 3

$("#601103MQ").on('click', function (){
    $("#description-cours").html("Par le biais de nombreux extraits d’œuvres et de lectures d’œuvres complètes, les caractéristiques de la littérature québécoise, ses principales tendances (courants) ainsi que les différents contextes sociohistoriques des œuvres seront étudiés dans ce cours. <br>À la fin du cours, l’étudiant sera capable de rédiger et réviser une dissertation critique pour rendre compte de ses analyses et réflexions.");
    $("#titre-cours").text("Littérature québécoise");
    event.preventDefault()
    toggleModal()
});

$("#2013X4RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Algèbre linéaire et statistiques appliquées à l'informatique");
    event.preventDefault()
    toggleModal()
});

$("#420316RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Système d'exploitation et composantes matérielles");
    event.preventDefault()
    toggleModal()
});

$("#420236RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Cybersécurité");
    event.preventDefault()
    toggleModal()
});

$("#420325RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Programmation d'interface graphique");
    event.preventDefault()
    toggleModal()
});

$("#420326RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Base de données I");
    event.preventDefault()
    toggleModal()
});

$("#420336RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Développement Web III");
    event.preventDefault()
    toggleModal()
});

// Session 4

$("#COM00103").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Cours complémentaire 1");
    event.preventDefault()
    toggleModal()
});

$("#3504W3RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Communication en informatique");
    event.preventDefault()
    toggleModal()
});

$("#420416RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Base de données II");
    event.preventDefault()
    toggleModal()
});

$("#420417RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Génie logiciel");
    event.preventDefault()
    toggleModal()
});

$("#420425RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Programmation réalité virtuelle - Jeux - Simulations");
    event.preventDefault()
    toggleModal()
});

$("#420444RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Assurance qualité logicielle");
    event.preventDefault()
    toggleModal()
});

// Session 5

$("#601HJCRI").on('click', function (){
    $("#description-cours").html("L’objectif général du cours est d’utiliser les principes et les procédés de communication pour la compréhension et la production de différents types de discours oraux et écrits, en particulier l’exposé oral à caractère argumentatif appuyé sur une préparation écrite. <br>À la fin du cours, l’étudiant sera capable de préparer et présenter des discours oraux du type informatif, critique ou expressif, liés notamment à son champ d’études.");
    $("#titre-cours").text("Pratique de la communication");
    event.preventDefault()
    toggleModal()
});

$("#340HJDRI").on('click', function (){
    $("#description-cours").html("Ce troisième cours vise à ce que l’élève puisse porter un jugement sur des problèmes éthiques et politiques de la société contemporaine. Il lui faut se situer de façon critique et autonome par rapport aux enjeux et aux débats éthiques et politiques de la société actuelle. Il prend connaissance de différentes théories philosophiques éthiques et politiques, et les applique à des situations diverses choisies, notamment, dans son champ d’études. La dissertation philosophique est un moyen privilégié pour lui permettre d’acquérir et de développer la compétence.");
    $("#titre-cours").text("Éthique");
    event.preventDefault()
    toggleModal()
});

$("#109103MQ").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Activité physique et autonomie");
    event.preventDefault()
    toggleModal()
});

$("#420236RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Système d'exploitation et composantes matérielles");
    event.preventDefault()
    toggleModal()
});

$("#COM00203").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Cours complémentaire 2");
    event.preventDefault()
    toggleModal()
});

$("#3105Z3RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Aspect légaux de la profession");
    event.preventDefault()
    toggleModal()
});

$("#420517RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Projet d'intégration-Phase I");
    event.preventDefault()
    toggleModal()
});

$("#420526RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Domaines d'exploration technologique I");
    event.preventDefault()
    toggleModal()
});

// Session 6

$("#420614RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Domaines d'exploration technologique II");
    event.preventDefault()
    toggleModal()
});

$("#420616RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Projet d'intégration - Phase II");
    event.preventDefault()
    toggleModal()
});

$("#420636RI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Programmation d'applications mobiles");
    event.preventDefault()
    toggleModal()
});

$("#42061VRI").on('click', function (){
    $("#description-cours").html("À venir");
    $("#titre-cours").text("Stage en entreprise");
    event.preventDefault()
    toggleModal()
});

var openmodal = document.querySelectorAll('.modal-open')
for (var i = 0; i < openmodal.length; i++) {
    openmodal[i].addEventListener('click', function(event){
        event.preventDefault()
        toggleModal()
    })
}

const overlay = document.querySelector('.modal-overlay')
overlay.addEventListener('click', toggleModal)

var closemodal = document.querySelectorAll('.modal-close')
for (let i = 0; i < closemodal.length; i++) {
    closemodal[i].addEventListener('click', toggleModal)
}

document.onkeydown = function(evt) {
    evt = evt || window.event
    var isEscape = false
    if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc")
    } else {
        isEscape = (evt.keyCode === 27)
    }
    if (isEscape && document.body.classList.contains('modal-active')) {
        toggleModal()
    }
};


function toggleModal () {
    const body = document.querySelector('body')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle('modal-active')
}