<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<section id="tutorat">
<div class="relative bg-white overflow-hidden">
  <div class="max-w-7xl mx-auto">
    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
      <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
        <polygon points="50,0 100,0 50,100 0,100" />
      </svg>

      <div>
        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
        </div>

        <!--
          Mobile menu, show/hide based on menu open state.

          Entering: "duration-150 ease-out"
            From: "opacity-0 scale-95"
            To: "opacity-100 scale-100"
          Leaving: "duration-100 ease-in"
            From: "opacity-100 scale-100"
            To: "opacity-0 scale-95"
        -->
        <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
          <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
            <div class="px-5 pt-4 flex items-center justify-between">
              <div>
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
              </div>
              <div class="-mr-2">
                <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                  <span class="sr-only">Close main menu</span>
                  <!-- Heroicon name: outline/x -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left">
          <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Le service de tutorat par les pairs</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
          Le Tutorat par les pairs est un service où des étudiants tuteurs, choisis parmi les meilleurs de leur programme, aident des étudiants en difficulté dans un cours visé de 1re année à raison d’une heure par semaine pendant au moins 10 semaines. Les rencontres d’aide sont personnalisées et consistent principalement à de l’aide aux devoirs. Les méthodes de travail efficaces sont également abordées pour permettre à l’étudiant aidé d’acquérir de bonnes habitudes dans ses études, et ainsi, développer une plus grande autonomie. 
          <br>
          <br>
          Ce service est gratuit pour la communauté étudiante du cégep. 
          Bref, c’est une chance extraordinaire de favoriser ta réussite ou de partager tes connaissances! 
          </p>
          <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <div class="rounded-md shadow">
              <a id = "inscription" href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                S'inscrire maintenant
              </a>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/phooto-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80" alt="">
  </div>
</div>

<form class="flex h-screen bg-gray-200 items-center justify-center  mt-16 mb-36" style="height:fit-content;" id = "formulaireinscription" action="<?= $this->router->generate('tutoratCreate') ?>" method="POST" enctype="multipart/form-data">
  <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">

  <div id = "msgerreur" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative ml-16 mr-16 mt-10" role="alert">
  <span class="block sm:inline" id = "message">L'inscription n'a pas été complété en raison d'une erreur dans l'un des champs.</span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg id = "errorclose" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
  </div>
    <div class="flex justify-center">
      <div class="flex">
        <h1 class="text-gray-600 font-bold md:text-2xl text-xl pt-12">Inscription au service de tutorat par les pairs</h1>
      </div>
    </div>

    <div class="grid grid-cols-1 mt-5 mx-7">
      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold" for="matricule">Matricule</label>
      <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Matricule" id="matricule" name="matricule"/>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
      <div class="grid grid-cols-1">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold" for="prenom">Prénom</label>
        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Prénom" id="prenom" name="prenom"/>
      </div>
      <div class="grid grid-cols-1">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold" for="nom">Nom</label>
        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Nom" id="nom" name="nom"/>
      </div>
    </div>

    <div class="grid grid-cols-1 mt-5 mx-7">
      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold" for="courriel">Courriel</label>
      <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="email" placeholder="Courriel" id="email" name="courriel"/>
    </div>

    <div class="grid grid-cols-1 mt-5 mx-7">
      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold" for="statut">Type d'inscription</label>
      <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" id="typeinscription" name="statut">
        <option value="0">Etudiant demandant de l'aide</option>
        <option value="1">Tuteur</option>
      </select>
    </div>

    <div class="grid grid-cols-1 mt-5 mx-7">
      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold" for="cours">Cours</label>
      <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" id="cours" name="cours">
        <option value="420-116-RI - Introduction à la programmation">420-116-RI - Introduction à la programmation</option>
        <option value="420-124-RI - Développement WEB I">420-124-RI - Développement WEB I</option>
        <option value="420-215-RI - Programmation orientée objet">420-215-RI - Programmation orientée objet</option>
      </select>
    </div>

    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
      <button id = "cancel" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Annuler</button>
      <button id = "confirm" type = "submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Confirmer mon inscription</button>
    </div>

  </div>
</form>
</div>
</section>

<section id = "job" class = "p-5">
	<!-- component -->

	<div class = "grid grid-cols-1 lg:grid-cols-2 gap-2">

		<div class = "bg-white h-full text-left px-4 py-4  justify-end border-t-2 border-gray-900">
			<a class = "flex items-center flex-wrap">
				<img
						class = "inline-block object-cover object-center w-24 h-24 mb-4 bg-gray-100 rounded"
						src = "https://dummyimage.com/302x302/94a3b8/ffffff"/>
				<span class = "flex flex-col flex-grow pl-4">
                    <span class = "font-bold text-lg text-gray-700 -mt-4">Software developer </span>
                    <span class = "text-md text-gray-600 uppercase font-bold">Employeur</span>
						<span class = "text-sm text-gray-500 uppercase font-bold">819-813-1234 teste2@asdlgksalk.com</span>
						<span class = "text-sm text-gray-400 uppercase font-bold">Salaire : 22$/h</span>
                  </span>
			</a>
			<div class = "flex items-center flex-wrap ">
				<a href = "#" onclick = "openModal('modal_job')"
						class = "block tracking-widest uppercase text-center shadow bg-indigo-600 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">
					consulter
				</a>
				<span class = " font-bold text-gray-600 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 px-2">
          6 jours
        </span>


			</div>
		</div>

	</div>
	<dialog id = "modal_job" class = "bg-transparent z-0 relative w-screen h-screen">
		<div class = "p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">

				<div class = "flex flex-col items-start w-1/2">
					<div class = "px-7 overflow-x-hidden overflow-y-auto">
						<!-- This example requires Tailwind CSS v2.0+ -->
						<div class = "bg-white shadow overflow-hidden sm:rounded-lg">

								<div class="p-7 flex items-center w-full">
									<div class="text-gray-900 font-bold text-lg">Nom du poste</div>
									<svg onclick="modalClose('modal_job')" class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
										<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
									</svg>
								</div>


							<div class = "border-t border-gray-200">
								<dl>
									<div class = "bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
										<dt class = "text-sm font-medium text-gray-500">
											Employeur
										</dt>
										<dd class = "mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											Exemple
										</dd>
									</div>
									<div class = "bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
										<dt class = "text-sm font-medium text-gray-500">
											Type
										</dt>
										<dd class = "mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											Stage
										</dd>
									</div>
									<div class = "bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
										<dt class = "text-sm font-medium text-gray-500">
											Contact
										</dt>
										<dd class = "mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											8190010123 test@test.caom
										</dd>
									</div>

									<div class = "bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
										<dt class = "text-sm font-medium text-gray-500">
											Salaire
										</dt>
										<dd class = "mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											À discuter
										</dd>
									</div>
									<div class = "bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
										<dt class = "text-sm font-medium text-gray-500">
											Durée
										</dt>
										<dd class = "mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											...
										</dd>
									</div>
									<div class = "bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
										<dt class = "text-sm font-medium text-gray-500">
											Description
										</dt>
										<dd class = "mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt
											cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id
											mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur
											mollit ad adipisicing reprehenderit deserunt qui eu.
										</dd>
									</div>
								</dl>
							</div>
						</div>

					</div>
				</div>

		</div>
	</dialog>

</section>
<script>

$(document).ready(function(e)
{
$("#formulaireinscription").hide();
$("#msgerreur").hide();
})
$("#inscription").click(function(e)
{
  $("#formulaireinscription").show();
})

$("#cancel").click(function(e)
{
  $("#formulaireinscription").hide();
})


$("#errorclose").click(function(e)
{
  $("#msgerreur").hide();
})

$("#confirm").click(function(e)
{
  let matricule, nom, prenom, courriel, type, cours;

  matricule = $("#matricule").val().trim();
  nom = $("#nom").val().trim();
  prenom = $("#prenom").val().trim();
  courriel = $("#email").val().trim();
  type = $("#typeinscription").val().trim();
  cours = $("#cours").val().trim();


  if (matricule.length != 7) 
  { 
    $("#message").replaceWith( '<span class="block sm:inline" id = "message">Le champs matricule doit contenir 7 chiffres.</span>');
    $("#msgerreur").show();
  }
  else if (prenom.length == 0)
  {
    $("#message").replaceWith( '<span class="block sm:inline" id = "message">Le champs prénom ne peut pas être vide.</span>');
    $("#msgerreur").show();
  }
  else if (nom.length == 0)
  {
    $("#message").replaceWith( '<span class="block sm:inline" id = "message">Le champs nom ne peut pas être vide.</span>');
    $("#msgerreur").show();
  }
  else if (courriel.length == 0)
  {
    $("#message").replaceWith( '<span class="block sm:inline" id = "message">Le champs courriel ne peut pas être vide.</span>');
    $("#msgerreur").show();
  }
  else if (nom.length > 250)
  {
    $("#message").replaceWith( '<span class="block sm:inline" id = "message">Le champs nom ne peut pas être excéder plus de 250 caractères.</span>');
    $("#msgerreur").show();
  }

  else if (prenom.length > 250)
  {
    $("#message").replaceWith( '<span class="block sm:inline" id = "message">Le champs prénom ne peut pas être excéder plus de 250 caractères.</span>');
    $("#msgerreur").show();
  }

  else if (courriel.length > 250)
  {
    $("#message").replaceWith( '<span class="block sm:inline" id = "message">Le champs courriel ne peut pas être excéder plus de 250 caractères.</span>');
    $("#msgerreur").show();
  }

  else
  {
    type = $('#typeinscription').find(":selected").val();
    cours = $('#cours').find(":selected").val();
  }

  
})

    function openModal(key) {
        document.getElementById(key).showModal();
        document.body.setAttribute('style', 'overflow: hidden;');
        document.getElementById(key).children[0].scrollTop = 0;
        document.getElementById(key).children[0].classList.remove('opacity-0');
        document.getElementById(key).children[0].classList.add('opacity-100')
    }

    function modalClose(key) {
        document.getElementById(key).children[0].classList.remove('opacity-100');
        document.getElementById(key).children[0].classList.add('opacity-0');
        setTimeout(function () {
            document.getElementById(key).close();
            document.body.removeAttribute('style');
        }, 100);
    }
</script>