<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->load->view('partial/header') ?>
</head>

<body class="app">
    <?= $this->load->view('partial/sidebar') ?>
    <div class="flex">
        <?= $this->load->view('partial/sidemenu'); ?>
        <div class="content">
            <?= $this->load->view('partial/topbar'); ?>


            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Add New Post
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <div class="dropdown relative mr-2">
                        <button class="dropdown-toggle button box text-gray-700 dark:text-gray-300 flex items-center"> English <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </button>
                        <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">English</span> </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">Indonesian</span> </a>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="button box text-gray-700 dark:text-gray-300 mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-feather="eye"></i> Preview </button>
                    <div class="dropdown relative">
                        <button class="dropdown-toggle button text-white bg-theme-1 shadow-md flex items-center"> Save <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </button>
                        <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> As New Post </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> As Draft </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Word </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                <!-- BEGIN: Post Content -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13" placeholder="Title">
                    <div class="post intro-y overflow-hidden box mt-5">

                        <div class="post__content tab-content">
                            <div class="tab-content__pane p-5 active" id="content">
                                <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                    <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Text Content </div>
                                    <div class="mt-5">
                                        <div class="editor" name="editor">
                                            <p>Content of the editor.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                    <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Caption & Images </div>
                                    <div class="mt-5">
                                        <div>
                                            <label>Caption</label>
                                            <input type="text" class="input w-full border mt-2" placeholder="Write caption">
                                        </div>
                                        <div class="mt-3">
                                            <label>Upload Image</label>
                                            <div class="border-2 border-dashed dark:border-dark-5 rounded-md mt-3 pt-4">
                                                <div class="flex flex-wrap px-4" id="image_preview">

                                                </div>
                                                <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                                    <i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 dark:text-theme-10 mr-1 custom-file-label">Upload a file</span> or drag and drop
                                                    <input type="file" name="image[]" id="upload_file" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="preview_image();" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Post Content -->
                <!-- BEGIN: Post Info -->
                <div class="col-span-12 lg:col-span-4">
                    <div class="intro-y box p-5">
                        <div>
                            <label>Written By</label>
                            <div class="dropdown relative mt-2">
                                <button class="dropdown-toggle button w-full border dark:bg-dark-2 dark:border-dark-4 flex items-center">
                                    <div class="w-6 h-6 absolute image-fit mr-3">
                                        <img class="rounded" alt="Midone Tailwind HTML Admin Template" src="<?= BASE_URL . 'bestui-lite/' ?>images/profile-2.jpg">
                                    </div>
                                    <div class="ml-8 pl-1 truncate">Tom Cruise</div>
                                    <i class="w-4 h-4 ml-auto" data-feather="chevron-down"></i>
                                </button>
                                <div class="dropdown-box mt-10 absolute w-full top-0 right-0 z-30">
                                    <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <div class="w-6 h-6 absolute image-fit mr-3">
                                                <img class="rounded" alt="Midone Tailwind HTML Admin Template" src="<?= BASE_URL . 'bestui-lite/' ?>images/profile-2.jpg">
                                            </div>
                                            <div class="ml-8 pl-1">Tom Cruise</div>
                                        </a>
                                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <div class="w-6 h-6 absolute image-fit mr-3">
                                                <img class="rounded" alt="Midone Tailwind HTML Admin Template" src="<?= BASE_URL . 'bestui-lite/' ?>images/profile-7.jpg">
                                            </div>
                                            <div class="ml-8 pl-1">Robert De Niro</div>
                                        </a>
                                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <div class="w-6 h-6 absolute image-fit mr-3">
                                                <img class="rounded" alt="Midone Tailwind HTML Admin Template" src="<?= BASE_URL . 'bestui-lite/' ?>images/profile-2.jpg">
                                            </div>
                                            <div class="ml-8 pl-1">Johnny Depp</div>
                                        </a>
                                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <div class="w-6 h-6 absolute image-fit mr-3">
                                                <img class="rounded" alt="Midone Tailwind HTML Admin Template" src="<?= BASE_URL . 'bestui-lite/' ?>images/profile-8.jpg">
                                            </div>
                                            <div class="ml-8 pl-1">Brad Pitt</div>
                                        </a>
                                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <div class="w-6 h-6 absolute image-fit mr-3">
                                                <img class="rounded" alt="Midone Tailwind HTML Admin Template" src="<?= BASE_URL . 'bestui-lite/' ?>images/profile-15.jpg">
                                            </div>
                                            <div class="ml-8 pl-1">Johnny Depp</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Post Date</label>
                            <input class="datepicker input w-full border mt-2" data-single-mode="true">
                        </div>
                        <div class="mt-3">
                            <label>Categories</label>
                            <div class="mt-2">
                                <select data-placeholder="Select categories" class="tail-select w-full" multiple>
                                    <option value="1" selected>Horror</option>
                                    <option value="2">Sci-fi</option>
                                    <option value="3" selected>Action</option>
                                    <option value="4">Drama</option>
                                    <option value="5">Comedy</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Tags</label>
                            <div class="mt-2">
                                <select data-placeholder="Select your favorite actors" class="tail-select w-full" multiple>
                                    <option value="1" selected>Leonardo DiCaprio</option>
                                    <option value="2">Johnny Deep</option>
                                    <option value="3" selected>Robert Downey, Jr</option>
                                    <option value="4">Samuel L. Jackson</option>
                                    <option value="5">Morgan Freeman</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Published</label>
                            <div class="mt-2">
                                <input class="input input--switch border" type="checkbox">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Show Author Name</label>
                            <div class="mt-2">
                                <input class="input input--switch border" type="checkbox">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?= $this->load->view('partial/script') ?>
        <script>
            $(document).ready(function() {
                $('form').ajaxForm(function() {
                    alert("Uploaded SuccessFully");
                });
            });

            function preview_image() {
                var total_file = document.getElementById("upload_file").files.length;

                for (var i = 0; i < total_file; i++) {
                    var name = event.target.files[i].name;
                    var newName = name.split(' ').join('');
                    console.log(newName);
                    $('#image_preview').append(`
                                    <div id="` + newName + `" class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                        <img class="rounded-md" alt="Midone Tailwind HTML Admin Template" src="` + URL.createObjectURL(event.target.files[i]) + `">   
                                        <a href="#" id="removeImage` + newName + `" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </a>
                                        </div>
                                    `);

                }

                document.getElementById("removeImage" + newName).addEventListener("click", function() {
                    var element = document.getElementById(newName);
                    var imagePreview = document.getElementById(newName);
                    imagePreview.scrollIntoView();
                    element.parentNode.removeChild(element);

                });
            }
        </script>
</body>

</html>