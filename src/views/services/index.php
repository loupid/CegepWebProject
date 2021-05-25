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