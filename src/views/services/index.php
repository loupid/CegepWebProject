<section id="job" class="p-5">
    <!-- component -->

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <?php
        if (!empty($jobs)) {
            foreach ($jobs as $job) { ?>
                <div class="bg-white h-full text-left px-4 py-4  justify-end border-t-2 border-gray-900">
                    <a class="flex items-center flex-wrap">
                        <div class="w-20 h-20">
                            <?php if ($job->category == 'Stage') { ?>
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="briefcase"
                                     class=" svg-inline--fa fa-briefcase fa-w-16" role="img"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                          d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path>
                                </svg>
                            <?php } else { ?>
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="school"
                                     class="svg-inline--fa fa-school fa-w-20" role="img"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 640 512">
                                    <path fill="currentColor"
                                          d="M0 224v272c0 8.84 7.16 16 16 16h80V192H32c-17.67 0-32 14.33-32 32zm360-48h-24v-40c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v64c0 4.42 3.58 8 8 8h48c4.42 0 8-3.58 8-8v-16c0-4.42-3.58-8-8-8zm137.75-63.96l-160-106.67a32.02 32.02 0 0 0-35.5 0l-160 106.67A32.002 32.002 0 0 0 128 138.66V512h128V368c0-8.84 7.16-16 16-16h96c8.84 0 16 7.16 16 16v144h128V138.67c0-10.7-5.35-20.7-14.25-26.63zM320 256c-44.18 0-80-35.82-80-80s35.82-80 80-80 80 35.82 80 80-35.82 80-80 80zm288-64h-64v320h80c8.84 0 16-7.16 16-16V224c0-17.67-14.33-32-32-32z"></path>
                                </svg>
                            <?php } ?>
                        </div>

                        <span class="flex flex-col flex-grow pl-4">
                    <span class="font-bold text-lg text-gray-700 -mt-4"><?= $job->title ?></span>
                    <span class="text-md text-gray-600 uppercase font-bold"><?= $job->employer ?></span>
						<span class="text-sm text-gray-500 uppercase font-bold"><?= $job->phone ?></span>
							<span class="text-sm text-gray-500 uppercase font-bold"><?= $job->email ?></span>

                  </span>
                    </a>
                    <div class="flex items-center flex-wrap ">
                        <a href="#" onclick="openModal('modal_job',<?= $job->id ?>)"
                           class="block tracking-widest uppercase text-center shadow bg-indigo-600 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">
                            consulter
                        </a>
                        <span class=" font-bold text-gray-600 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 px-2">
         publié depuis <?= round((time() - strtotime($job->publicationDate)) / (60 * 60 * 24)) ?> jours
        </span>


                    </div>
                </div>
            <?php }
        } else { ?>
            <img class="mb-8 rounded-md shadow-md" src="/images/miscs/jobmeme.jpg" alt="meme">
        <?php } ?>
    </div>
    <dialog id="modal_job" class="bg-transparent z-0 relative w-screen h-screen">
        <div class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">

            <div class="flex flex-col items-start w-1/2">
                <div class="px-7 overflow-x-hidden overflow-y-auto">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">

                        <div class="p-7 flex items-center w-full">
                            <div id="title" class="text-gray-900 font-bold text-lg">Nom du poste</div>
                            <svg onclick="modalClose('modal_job')"
                                 class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                            </svg>
                        </div>


                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Employeur
                                    </dt>
                                    <dd id="employer" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        Exemple
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Type
                                    </dt>
                                    <dd id="category" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        Stage
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Téléphone
                                    </dt>
                                    <dd id="phone" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Courriel
                                    </dt>
                                    <dd id="email" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Salaire
                                    </dt>
                                    <dd id="salairy" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        À discuter
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Durée
                                    </dt>
                                    <dd id="duration" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        ...
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Description
                                    </dt>
                                    <dd id="description" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
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

</script>